<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));
        // $data = $stripe->products->all(['limit' => 30]);
        $data = $stripe->plans->all(['limit' => 30]);

        // $data = $stripe->products->create(['name' => 'Ezfuel Subscription']);

        dd($data);
    }

}
