<?php

namespace App\Http\Requests;

use App\Models\Service;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            "name"=>["required","max:225","min:2",Rule::unique(Service::class)],
            "sort_index"=>["nullable",],
            "status"=>["nullable",],
            "details"=>["required","max:5000"],
            "image" =>["required","mimes:jpeg,jpg,png,gif,webp","required","max:10000","image",],
        ];
    }
}
