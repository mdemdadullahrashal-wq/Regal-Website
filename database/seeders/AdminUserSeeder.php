<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => config('regal.admin_email')],
            [
                'name' => config('regal.admin_name'),
                'password' => Hash::make((string) config('regal.admin_password')),
            ]
        );
    }
}
