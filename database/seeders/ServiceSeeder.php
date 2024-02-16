<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name"=>"Gasoline Delivery",
                "slug"=>"gasoline-delivery",
                "image"=>"frontend/img/services/s-1.png",
                "status"=>1,
                "details"=>"<p>
                Having gasoline delivered to your home ensures your family vehicles are always fueled and ready for that weekend getaway or unexpected errand.<br><br>

                Do you need gasoline for your fleet of cars or equipment? EZ Fuel service proudly offers all grades of gasoline — including regular, midgrade,
                premium, andGloved hand holding a gas pump, filling up a large truck. non-ethanol (recreational/marine) — and related service.<br><br>

                Our service team has helped to get the fuel on their home to reduce hastle and don't need to go pamp. Backed by a fleet of trained professionals
                and equipped service vehicles, guaranteed on-site fuel supplies, and supplementary fuel service, we can meet all your gasoline needs. Need dependable
                gasoline delivery service in your home?
             </p>",
            ]
        ];
        foreach($data as $row){
            Service::create($row);
        }

    }
}
