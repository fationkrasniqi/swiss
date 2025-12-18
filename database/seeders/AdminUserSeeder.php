<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create default admin user if it doesn't exist
        $adminEmail = 'fationkrasniqi777@gmail.com';
        
        if (!User::where('email', $adminEmail)->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => $adminEmail,
                'password' => Hash::make('password'),
                'is_admin' => 1,
                'email_verified_at' => now(),
            ]);

            $this->command->info('Admin user created successfully!');
        } else {
            $this->command->info('Admin user already exists.');
        }
    }
}
