<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ApiResponseService
{
    /**
     * Base api response
     *
     * @param  mixed $data
     * @param  mixed $message
     * @param  mixed $code
     * @return Response
     */
    public function apiResponse($data, $message = '', $code = JsonResponse::HTTP_OK)
    {
        return response()->json(
            [
                'data' => $data,
                'message' => $message
            ],
            $code
        );
    }
}
