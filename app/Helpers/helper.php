<?php
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use App\Models\Day;
use App\Models\Service;

function activeShowSub($data=[]) {
    foreach($data as $row){
        if (request()->is($row)) {
            return 'active show-sub';
        }
    }

}
function activeShow($data=null){
    if (request()->is($data)) {
        return 'active';
    }
}

function showImage($url=null,$type=null)
{
    return asset($url);
    return File::exists($url) == true ?  asset($url) :  asset('uploads/images/blank.jpg');
}

function showLogo($url=null)
{
    //return asset($url);
    return File::exists($url) == true ?  asset($url) :  asset('logo.png');
}
function showAvater($url=null)
{
    return asset($url);
    return File::exists($url) == true ?  asset($url) :  asset('uploads/images/avatar.jpg');
}
function showCurrent($url=null)
{
    return asset($url);
    return File::exists($url) == true ?  asset($url) :  asset('web/images/element/bmc.jpg');
}
function logoText($text1 = "EZ",$text2 = "Fuel")
{
    return "
        <span class='logo-text_1' >$text1</span>
                <span class='logo-text_2' >$text2</span>
    ";
}

function setting()
{
    return Setting::first();
}

function planByStripePrice($stripe_price)
{
    return Plan::query()->where("stripe_plan_id",$stripe_price)->first();
}

function daysInWords($days = 0)
{
    return 1 ;

}
function bookAbleDays()
{
    return Day::query()->with([
        "times"=>fn($q)=>$q->whereDoesntHave("orders")->select(["id","time","day_id"])
    ])->where([
        "status"=>1
    ])->select(["id","date"])->take(10)->get();

}
function serviceTypes()
{
    return Service::query()->where([
        "status"=>1
    ])->get();

}
