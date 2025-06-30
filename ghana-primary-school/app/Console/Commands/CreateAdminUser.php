<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create-user
                            {name? : The name of the admin user}
                            {email? : The email of the admin user}
                            {password? : The password for the admin user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user for the school website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Creating a new admin user...');
        $this->newLine();

        // Get user inputs
        $name = $this->argument('name') ?: $this->ask('Name of the admin user');
        $email = $this->argument('email') ?: $this->ask('Email address');
        $password = $this->argument('password') ?: $this->secret('Password (min. 8 characters)');

        // Validate inputs
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            $this->error('Validation failed:');
            foreach ($validator->errors()->all() as $error) {
                $this->error('- ' . $error);
            }
            return Command::FAILURE;
        }

        // Create the user
        try {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
                'is_admin' => true,
            ]);

            $this->newLine();
            $this->info('✅ Admin user created successfully!');
            $this->newLine();
            $this->line('<info>User Details:</info>');
            $this->line('Name: ' . $user->name);
            $this->line('Email: ' . $user->email);
            $this->line('Admin: Yes');
            $this->newLine();
            $this->warn('⚠️  Please ensure the user changes their password after first login!');

            return Command::SUCCESS;

        } catch (\Exception $e) {
            $this->error('Failed to create admin user: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
