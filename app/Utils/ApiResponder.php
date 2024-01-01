<?php


namespace App\Utils;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponder
{
    public function successResponse($data, $message = 'OK, i dont know how but its worked', $code = Response::HTTP_OK, $requestBody = null): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'code' => $code,
            'error' => false,
            'requestBody' => $requestBody
        ]);
    }

    public function errorResponse($message, $code, $requestBody = null): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'code' => $code,
            'error' => true,
            'requestBody' => $requestBody
        ]);
    }
}
