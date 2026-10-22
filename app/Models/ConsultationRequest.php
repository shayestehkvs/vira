<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'full_name',
    'phone',
    'company_name',
    'service_type',
    'target_area',
    'campaign_duration',
    'message',
])]
class ConsultationRequest extends Model
{
    public const STATUS_NEW = 'new';

    public const STATUS_IN_PROGRESS = 'in_progress';

    public const STATUS_COMPLETED = 'completed';

    public const SERVICE_VAN_DISPLAY = 'van_display';

    public const SERVICE_CUSTOM_CAMPAIGN = 'custom_campaign';

    public const SERVICE_ADVERTISING_CONSULTING = 'advertising_consulting';

    public const SERVICE_OTHER = 'other';

    /**
     * @return array<string, string>
     */
    public static function statuses(): array
    {
        return [
            self::STATUS_NEW => 'جدید',
            self::STATUS_IN_PROGRESS => 'در حال پیگیری',
            self::STATUS_COMPLETED => 'تکمیل‌شده',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function serviceTypes(): array
    {
        return [
            self::SERVICE_VAN_DISPLAY => 'نمایش تبلیغات روی ون',
            self::SERVICE_CUSTOM_CAMPAIGN => 'اجرای کمپین اختصاصی',
            self::SERVICE_ADVERTISING_CONSULTING => 'مشاوره تبلیغاتی',
            self::SERVICE_OTHER => 'سایر موارد',
        ];
    }

    public function statusLabel(): string
    {
        return self::statuses()[$this->status] ?? $this->status;
    }

    public function serviceTypeLabel(): string
    {
        return self::serviceTypes()[$this->service_type] ?? $this->service_type;
    }

    /**
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    /**
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if ($term === null || trim($term) === '') {
            return $query;
        }

        $like = '%'.str_replace(['%', '_'], ['\%', '\_'], trim($term)).'%';

        return $query->where(function (Builder $builder) use ($like): void {
            $builder->where('full_name', 'like', $like)
                ->orWhere('phone', 'like', $like)
                ->orWhere('company_name', 'like', $like);
        });
    }
}
