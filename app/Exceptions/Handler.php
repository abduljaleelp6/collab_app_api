<?php

namespace App\Exceptions;
use App\Utils\ApiResponder;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
//use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use PDOException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponder;

    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];


    public function report(Throwable $exception)
    {
        parent::report($exception);
    }


    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return $this->errorResponse(
                strtolower($exception->getModel()) . " not found",
                Response::HTTP_NOT_FOUND,
                [$request->url(), $request]);
        }
        if ($exception instanceof PDOException) {
            return $this->errorResponse(
                strtolower($exception->getMessage()) . " not found",
                $exception->getCode(),
                [$request->url(), $request->all()]);
        }
        if ($exception instanceof \Illuminate\Database\QueryException) {
            return $this->errorResponse(
                'SQL handler'.$exception->getMessage(),
                500
            );
        }
        return parent::render($request, $exception);
    }
}