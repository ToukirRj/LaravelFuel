<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ServiceSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(PageSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Admin::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            // 'password' => Hash::make("password"),
        ]);
    }
}
