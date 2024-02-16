<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            "name"=>["required","min:3","max:225"],
            "phone"=>["required","min:3","max:225"],
            "email"=>["required","min:3","max:225"],
            "address"=>["required","min:3","max:225"],
            "logo" =>["nullable","mimes:jpeg,jpg,png,gif,webp","max:10000","image",],
            "icon" =>["nullable","mimes:jpeg,jpg,png,gif,webp","max:10000","image",],
            "short_description"=>["required","max:500"],
            "header_script"=>["nullable",],
            "footer_script"=>["nullable",],
        ];
    }
}
