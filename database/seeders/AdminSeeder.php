<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Create (or update) the admin account.
     * Set ADMIN_EMAIL and ADMIN_PASSWORD in .env before seeding.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@ananyalilapur.org')],
            [
                'name' => 'Admin',
                'password' => env('ADMIN_PASSWORD', 'Admin@12345'),
            ]
        );
    }
}
