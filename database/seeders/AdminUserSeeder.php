<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@school.com'],
            [
                'name' => 'School Administrator',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@school.com');
        $this->command->info('Password: password123');
        $this->command->warn('Please change the password after first login!');
    }
}
