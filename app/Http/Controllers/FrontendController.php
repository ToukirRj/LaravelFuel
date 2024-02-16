<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Page;

class FrontendController extends Controller
{
    public function index(Request $request) {
        return view("web.home",[
            'testimonials'=>Testimonial::orderBy('sort_index','desc')->where("status",1)->take("12")->get(),
            'pages'=>Page::get()
        ]);
    }
    public function about(Request $request) {
        return view("web.about",[
            'testimonials'=>Testimonial::orderBy('sort_index','desc')->where("status",1)->take("12")->get(),
            'pages'=>Page::get()
        ]);
    }
    public function service(Request $request) {
        $services = Service::query()->where("status",1)->orderBy("sort_index","desc")->get();
        return view("web.service",compact("services"));
    }

    public function plans(Request $request) {
        $plans = Plan::query()->where("status",1)->orderBy("sort_index","desc")->get();

        return view("web.plans",compact("plans"));
    }
    public function contact(Request $request) {
        return view("web.contact");
    }
    public function profile(Request $request) {
        return view("web.profile");
    }
}
