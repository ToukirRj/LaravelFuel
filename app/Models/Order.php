<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function day(){
        return $this->belongsTo(Day::class);
    }
    public function time(){
        return $this->belongsTo(Time::class);
    }
    public function order_status(){
        return  [
            "Pending"=>["name"=>"Pending","class"=>"pending"],
            // "Processing"=>["name"=>"Processing","class"=>"processing"],
            // "On The Way"=>["name"=>"On The Way","class"=>"on-the-Way"],
             "Delivered"=>["name"=>"Delivered","class"=>"delivered"],
            //"Canceled"=>["name"=>"canceled","class"=>"canceled"],
        ];
    }
}
