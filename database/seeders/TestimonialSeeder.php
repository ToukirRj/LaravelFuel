<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name"=>"Christine Eve",
                "image"=>"frontend/img/testimonial/testi_avatar.png",
                "status"=>1,
                "designation"=>"Head Of Idea",
                "message"=>"Mauris non laoreet eros. Fusce sed varius diam. Ut sapien mauris, fermentum vel porta et, convallis a lacus. Nulla facilisi. Ut vehicula dignissim rutrum configurable but are already optimized",
            ],
            [
                "name"=>"Jon Doe",
                "image"=>"frontend/img/testimonial/testi_avatar.png",
                "status"=>1,
                "designation"=>"Head Of Idea",
                "message"=>"Mauris non laoreet eros. Fusce sed varius diam. Ut sapien mauris, fermentum vel porta et, convallis a lacus. Nulla facilisi. Ut vehicula dignissim rutrum configurable but are already optimized",
            ],
            [
                "name"=>"Christine Eve",
                "image"=>"frontend/img/testimonial/testi_avatar.png",
                "status"=>1,
                "designation"=>"Head Of Idea",
                "message"=>"Mauris non laoreet eros. Fusce sed varius diam. Ut sapien mauris, fermentum vel porta et, convallis a lacus. Nulla facilisi. Ut vehicula dignissim rutrum configurable but are already optimized",
            ],
        ];
        foreach($data as $row){
            Testimonial::create($row);
        }
    }
}
