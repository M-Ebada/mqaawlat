<?php

namespace App\Exceptions;

use App\Enums\ResponseEnum;
use App\Helper\Helper;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)

    {

        return $this->shouldReturnJson($request, $exception)
            ? response()->json([
                "success" => false,
                'message' => __("Your session expired please try to login again"),
                "code" => Response::HTTP_UNAUTHORIZED,
                "direct" => 'login',
                "data" => []
            ], Response::HTTP_UNAUTHORIZED)
            : redirect()->guest($exception->redirectTo() ?? route('login'));
    }
     protected function invalidJson($request, ValidationException $exception): JsonResponse
    {
        return response()->json([
            "success" => false,
            "code" => $exception->status,
            'message' => $exception->getMessage(),
            "data" => [],
            'errors' => $exception->errors(),
        ], $exception->status);
    }
}
