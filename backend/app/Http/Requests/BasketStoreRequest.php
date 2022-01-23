<?php

namespace App\Http\Requests;

use App\Services\FailedValidationService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BasketStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "product_id" => "unique|required|integer|min:1",
            "quantity" => "required|integer|min:1"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        new FailedValidationService($validator);
    }
}
