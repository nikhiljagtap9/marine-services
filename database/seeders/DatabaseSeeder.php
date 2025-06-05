<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::firstOrCreate(
            ['email' => 'admin@persausive.com'],
            [
                'name' => 'Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // change this to a secure password
                'user_type' => 'admin',
            ]
        );

        // User 1
        User::firstOrCreate(
            ['email' => 'operations@speedclaim.net'],
            [
                'name' => 'Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('123456'),
                'user_type' => 'admin',
            ]
        );

        // User 2
        User::firstOrCreate(
            ['email' => 'rohit@persausive.com'],
            [
                'name' => 'Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('123123'),
                'user_type' => 'admin',
            ]
        );

        $this->call([
            CountrySeeder::class,
            PlanSeeder::class,
            PortSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
        ]);
    }
}
