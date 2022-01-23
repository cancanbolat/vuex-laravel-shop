<?php

namespace App\Services;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class FailedValidationService
{
    protected $validator;
    protected $apiResponseService;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        $this->apiResponseService = new ApiResponseService();

        $errors = (new ValidationException($this->validator->errors()));

        throw new HttpResponseException(
            //response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            $this->apiResponseService->apiResponse(null, $errors, JsonResponse::HTTP_BAD_REQUEST)
        );
    }
}
