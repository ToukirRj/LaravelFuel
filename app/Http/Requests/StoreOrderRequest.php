<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "vehicle_name" =>["required","max:225"],
            "vehicle_model" =>["required","max:225"],
            "delivery_date_time" =>["required","date","after:now","before_or_equal:".now()->addDays(30)->toDateString()],
            "address"=>["required","max:225"],
            "image" =>["nullable","mimes:jpeg,jpg,png,gif,webp","required","max:2500","image",],
        ];
    }
}
