<?php

namespace App\Http\Requests;

use App\Services\FailedValidationService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|min:5",
            "description" => "required|min:10",
            "photo_url" => "required|min:5",
            "price" => "required|integer|min:1"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        new FailedValidationService($validator);
    }
}
