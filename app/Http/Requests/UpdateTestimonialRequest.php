<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
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
            "name"=>["required","max:225","min:2"],
            "sort_index"=>["nullable",],
            "status"=>["nullable",],
            "message"=>["required","max:500"],
            "image" =>["nullable","mimes:jpeg,jpg,png,gif,webp","max:10000","image",],
        ];
    }
}
