<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use App\Traits\ExceptionHandlerTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    use ExceptionHandlerTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (!$request->expectsJson() && env('APP_DEBUG', 'false')) {
            return parent::render($request, $exception);
        }

        if ($exception instanceof HttpException) {
            return $this->getHttpException($exception);
        }

        if ($exception instanceof ModelNotFoundException) {
            return $this->getModelNotFoundException($exception);
        }

        if ($exception instanceof AuthorizationException) {
            return $this->getAuthorizationException($exception);
        }

        if ($exception instanceof AuthenticationException) {
            return $this->getAuthenticationException($exception);
        }

        if ($exception instanceof ValidationException) {
            return $this->getValidationException($exception);
        }

        return $this->getBaseResponse($exception, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
