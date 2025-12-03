<?php

namespace App\Traits;

use App\Enums\ResponseEnum;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait HandleApiResponseTrait
{

    public function sendSuccessResponse($data = [], ?string $message = null, ?int $code = null, ?string $direct = null): JsonResponse
    {
        if (is_null($message)) {
            $message = __("Success response");
        }
        if (is_null($code)) {
            $code = Response::HTTP_OK;
        }
        return response()->json([
            "success" => true,
            "message" => $message,
            "code" => $code,
            "direct" => $direct,
            "mobile_version" => (string)config("app.mobile_version"),
            "must_update" => (bool)config('app.must_update_mobile'),
            "data" => $data,
        ], $code);
    }

    public function sendSuccessPaginatedResponse($resource, ?string $message = null, ?int $code = null, ?string $direct = null)
    {
        if (is_null($message)) {
            $message = ResponseEnum::SUCCESS_RESPONSE->name;
        }
        if (is_null($code)) {
            $code = Response::HTTP_OK;
        }
        return $resource->additional([
            "success" => true,
            "message" => $message,
            "code" => $code,
            "direct" => $direct,
            "mobile_version" => (string)config("app.mobile_version"),
            "must_update" => (bool)config('app.must_update_mobile'),
        ], $code);
    }

    public function sendFailedResponse(?string $message = null, ?int $code = null, ?string $direct = null): JsonResponse
    {
        if (is_null($message)) {
            $message = ResponseEnum::FAILED_RESPONSE->name;
        }
        if (is_null($code) || $code == 0) {
            $code = Response::HTTP_NOT_FOUND;
        }
        return response()->json([
            "success" => false,
            "message" => $message,
            "code" => $code,
            "direct" => $direct,
            "mobile_version" => (string)config("app.mobile_version"),
            "must_update" => (bool)config('app.must_update_mobile'),
            "data" => [],
        ], $code);
    }

}
