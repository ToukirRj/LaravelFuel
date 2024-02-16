<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
               "name"=>"Basic Plan",
               "slug"=>"",
               "price"=>8,
               "type"=>"Per Month",
               "validity"=>"30",
               "image"=>"",
               "details"=>"
               <p>
                    <ul>
                        <li>Good Quality Support</li>
                        <li>30 Days Access</li>
                        <li>Customer Priority</li>
                    </ul>
                </p>
               ",
               "status"=>1,
               "sort_index"=>null,
               "interval_count"=>1,
            ],
            [
               "name"=>"Standard Plan",
               "slug"=>"",
               "price"=>40,
               "type"=>"Half Yearly",
               "validity"=>"180",
               "image"=>"",
               "details"=>"
               <p>
                    <ul>
                        <li>Best Quality Support</li>
                        <li>180 Days Access</li>
                        <li>Customer Priority</li>
                        </ul>
                </p>
               ",
               "status"=>1,
               "sort_index"=>null,
               "is_popular"=>1,
               "interval_count"=>6,
            ],
            [
               "name"=>"Premium Plan",
               "slug"=>"",
               "price"=>84,
               "type"=>"Per Year",
               "validity"=>"365",
               "image"=>"",
               "details"=>"
               <p>
                    <ul>
                        <li>Premium Quality Support</li>
                        <li>365 Days Access</li>
                        <li>Customer Priority</li>
                        </ul>
                </p>
               ",
               "status"=>1,
               "sort_index"=>null,
               "interval_count"=>12,
            ],
        ];

        foreach($data as $row){
            $plan =  Plan::updateOrCreate([
                "name"=>$row["name"],
                "slug"=>Str::slug($row["name"]),
            ],[

                "price"=>$row["price"],
                "type"=>$row["type"],
                "validity"=>$row["validity"],
                "image"=>$row["image"],
                "details"=>$row["details"],
                "status"=>$row["status"],
                "sort_index"=>$row["sort_index"],
            ]);
            $this->createStripePlan($plan,$row["interval_count"]);
        }
    }

    function createStripePlan($plan ,$interval_count = 1){
        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));


        try {
            $data =  $stripe->plans->create([
                'amount' => $plan->price*100,
                'currency' => 'usd',
                'interval' => 'month',
                'interval_count' => $interval_count,
                'product' => env("STRIPE_PRODUCT_ID"),
            ]);
            $plan->stripe_plan_id = $data->id;
            $plan->save();
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
