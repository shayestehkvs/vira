<?php

namespace Tests\Feature;

use App\Models\ConsultationRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class ConsultationRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_consultation_form(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('id="consultation"', false)
            ->assertSee('ثبت درخواست مشاوره');
    }

    public function test_guest_can_store_valid_consultation_request(): void
    {
        $token = Str::random(40);

        $response = $this->withSession(['consultation_form_token' => $token])
            ->from(route('home'))
            ->post(route('consultation-requests.store'), [
                'full_name' => 'علی رضایی',
                'phone' => '09123456789',
                'company_name' => 'برند نمونه',
                'service_type' => ConsultationRequest::SERVICE_VAN_DISPLAY,
                'target_area' => 'مرکز تهران',
                'campaign_duration' => 'یک هفته',
                'message' => 'نیاز به مشاوره دارم',
                'form_token' => $token,
            ]);

        $response->assertRedirect(route('home').'#consultation')
            ->assertSessionHas('consultation_success');

        $this->assertDatabaseHas('consultation_requests', [
            'full_name' => 'علی رضایی',
            'phone' => '09123456789',
            'status' => ConsultationRequest::STATUS_NEW,
        ]);
    }

    public function test_invalid_consultation_request_is_rejected_and_input_is_preserved(): void
    {
        $token = Str::random(40);

        $response = $this->withSession(['consultation_form_token' => $token])
            ->from(route('home'))
            ->post(route('consultation-requests.store'), [
                'full_name' => '',
                'phone' => '123',
                'service_type' => '',
                'form_token' => $token,
            ]);

        $response->assertRedirect(route('home').'#consultation')
            ->assertSessionHasErrors(['full_name', 'phone', 'service_type']);

        $this->assertDatabaseCount('consultation_requests', 0);
    }

    public function test_guest_cannot_access_admin_panel(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('admin.login'));
        $this->get(route('admin.consultation-requests.index'))->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_login_logout_and_update_request_status(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@vira.test',
            'password' => 'password123',
        ]);

        $request = ConsultationRequest::query()->create([
            'full_name' => 'سارا محمدی',
            'phone' => '09121112233',
            'company_name' => null,
            'service_type' => ConsultationRequest::SERVICE_OTHER,
            'target_area' => null,
            'campaign_duration' => null,
            'message' => null,
        ]);

        $this->post(route('admin.login.store'), [
            'email' => 'admin@vira.test',
            'password' => 'password123',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticatedAs($admin);

        $this->get(route('admin.dashboard'))->assertOk()->assertSee('داشبورد');

        $this->put(route('admin.consultation-requests.update', $request), [
            'status' => ConsultationRequest::STATUS_IN_PROGRESS,
            'admin_notes' => 'تماس گرفته شد',
        ])->assertRedirect(route('admin.consultation-requests.show', $request));

        $this->assertDatabaseHas('consultation_requests', [
            'id' => $request->id,
            'status' => ConsultationRequest::STATUS_IN_PROGRESS,
            'admin_notes' => 'تماس گرفته شد',
        ]);

        $this->get(route('home'))->assertOk()->assertDontSee('تماس گرفته شد');

        $this->post(route('admin.logout'))->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }

    public function test_admin_can_search_consultation_requests(): void
    {
        $admin = User::factory()->create();

        ConsultationRequest::query()->create([
            'full_name' => 'کاربر هدف',
            'phone' => '09120000000',
            'company_name' => 'شرکت هدف',
            'service_type' => ConsultationRequest::SERVICE_CUSTOM_CAMPAIGN,
        ]);

        ConsultationRequest::query()->create([
            'full_name' => 'کاربر دیگر',
            'phone' => '09121111111',
            'company_name' => 'شرکت دیگر',
            'service_type' => ConsultationRequest::SERVICE_OTHER,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.consultation-requests.index', ['q' => 'هدف']))
            ->assertOk()
            ->assertSee('کاربر هدف')
            ->assertDontSee('کاربر دیگر');
    }
}
