<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "title"=>"No matter How far your home, we <span>deliver gas</span> on time!",
                "title_2"=>"home-banner",
                "slug"=>"home-banner",
                "url"=>"/register",
                "button_name"=>"Request Delivery",
                "image"=>"frontend/img/banner/banner.png",
                "details"=>"We exist to eliminate the annoying task of filling up and completing it for you so that you can
                get in your car and go with no worry.",
            ],
            [
                "title"=>"HERE WHAT WE DO",
                "title_2"=>"About Us",
                "slug"=>"about-us",
                "url"=>"/about",
                "button_name"=>"Learn More",
                "image"=>"frontend/img/about/about.png",
                "details"=>"
                <p>
                                Our company aims to provide a convenient service to our users to submit gas requests based
                                on their schedule. We exist to take the hassle
                                out of filling it out and completing it for you so you can get in your car and go without a
                                worry.<br><br>

                                We deliver Gasoline to your home on time as per your requirement. You don't have to worry
                                about going to the fuel station.
                            </p>
                ",
            ],
            [
                "title"=>"MOBILE REFUELING SERVICE",
                "title_2"=>"Our Delivery Service",
                "slug"=>"mobile refueling service",
                "url"=>null,
                "button_name"=>null,
                "image"=>null,
                "details"=>"
                <p>
                                Mobile refueling means the fuel comes to you. Having fuel delivered directly eliminates
                                unnecessary downtime.

                                Businesses can realize significant labor savings by eliminating the time spent by employees
                                refueling vehicles or equipment.

                                Direct refueling minimizes the risks associated with transporting fuel containers, thereby
                                increasing safety for your team and equipment.

                                Reduced trips to and from the fuel station can significantly reduce a company’s carbon
                                footprint, contributing to environmental conservation.
                            </p>
                ",
            ],
            [
                "title"=>"Why EZ Fuel?",
                "title_2"=>"Emergency Refueling",
                "slug"=>"service",
                "url"=>"/service",
                "button_name"=>"Our Service",
                "image"=>"frontend/img/about/about2.jpeg",
                "details"=>"
                <p class='text-end'>
                                Whether it’s in the wee hours of the morning, a quiet weekend, or in the middle of a holiday
                                celebration, our dedicated team is
                                always ready. We prioritize your needs, ensuring prompt delivery so you can have peace of
                                mind, knowing you’ll have the fuel you
                                need when you need it. With Greens Energy, you’re never truly alone during emergencies.
                            </p>
                ",
            ],
            [
                "title"=>"Overall Benefits",
                "title_2"=>"Why Mobile Refueling?",
                "slug"=>"plans",
                "url"=>"/plans",
                "button_name"=>"Membership Plans",
                "image"=>"frontend/img/about/mobile-refule.png",
                "details"=>"
                <p>
                                Mobile refueling means the fuel comes to you. Having fuel delivered directly eliminates
                                unnecessary downtime.

                                Businesses can realize significant labor savings by eliminating the time spent by employees
                                refueling vehicles or equipment.

                                Direct refueling minimizes the risks associated with transporting fuel containers, thereby
                                increasing safety for your team and equipment.

                                Reduced trips to and from the fuel station can significantly reduce a company’s carbon
                                footprint, contributing to environmental conservation.
                            </p>
                ",
            ],
        ];
        foreach($data as $row){
            Page::create($row);
        }
    }
}
