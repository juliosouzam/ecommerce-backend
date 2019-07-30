<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

trait ExceptionHandlerTrait
{
    public function getHttpException(HttpException $exception)
    {
        return $this->getBaseResponse($exception, $exception->getStatusCode());
    }

    public function getModelNotFoundException(ModelNotFoundException $exception)
    {
        return $this->getBaseResponse($exception, Response::HTTP_NOT_FOUND);
    }

    public function getAuthorizationException(AuthorizationException $exception)
    {
        return $this->getBaseResponse($exception, Response::HTTP_FORBIDDEN);
    }

    public function getAuthenticationException(AuthenticationException $exception)
    {
        return $this->getBaseResponse($exception, Response::HTTP_UNAUTHORIZED);
    }

    public function getValidationException(ValidationException $exception)
    {
        return response()->json([
            'error' => $exception->validator->errors(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'code' => $exception->getCode()
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function getBaseResponse($exception, int $statusCode)
    {
        return response()->json([
            'error' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'code' => $exception->getCode()
        ], $statusCode);
    }
}
