<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    protected $signature = 'vira:create-admin
                            {--name= : Admin display name}
                            {--email= : Admin email address}
                            {--password= : Admin password (prefer prompt or env)}';

    protected $description = 'Create or update the Vira admin user from secure CLI/env input (not publicly accessible)';

    public function handle(): int
    {
        $name = $this->option('name') ?: env('ADMIN_NAME') ?: $this->ask('نام مدیر');
        $email = $this->option('email') ?: env('ADMIN_EMAIL') ?: $this->ask('ایمیل مدیر');
        $password = $this->option('password') ?: env('ADMIN_PASSWORD');

        if (! is_string($password) || $password === '') {
            $password = $this->secret('رمز عبور مدیر (حداقل ۸ کاراکتر)');
        }

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::query()->updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => $password,
            ],
        );

        $this->info($user->wasRecentlyCreated
            ? "حساب مدیر برای {$email} ایجاد شد."
            : "حساب مدیر برای {$email} به‌روزرسانی شد.");
        $this->warn('رمز عبور را در کد، Git یا Seeder ذخیره نکنید. در صورت استفاده از ADMIN_PASSWORD در محیط، پس از ایجاد حساب آن را حذف کنید.');

        return self::SUCCESS;
    }
}
