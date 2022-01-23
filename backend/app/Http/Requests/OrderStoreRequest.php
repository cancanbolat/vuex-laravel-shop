<?php

namespace App\Http\Requests;

use App\Services\FailedValidationService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class OrderStoreRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "product_id" => "required|integer|min:1",
            "basket_id" => "required|integer|min:1",
            "total" => "required|integer|min:1"
        ];
    }


    /** Custom message for validation
     * @return array
     */
    public function messages(): array
    {
        return [
            "product_id.required" => "product_id alanı zorunludur.",
            "product_id.min" => "product_id sıfır olamaz"
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            'email' => 'trim|lowercase',
            'name' => 'trim|capitalize|escape'
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        new FailedValidationService($validator);
    }
}
