<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "name"=>"EZ Fuel",
            "phone"=>"+91-123-456-7890",
            "email"=>"info@example.com",
            "address"=>"Example address, Road-05, House-81, Floor-02, Example.",
            "logo"=>"frontend/img/logo.png",
            "icon"=>"frontend/img/favicon.png",
            "short_description"=>"The purpose of our company is to offer a convenient service for our users to submit requests for gas based on their schedule and location. We exist to eliminate the annoying task of filling up and completing it for you so that you can get in your car and go with no worry.",
            "header_script"=>"",
            "footer_script"=>"",
        ];

        Setting::create($data);
    }
}
