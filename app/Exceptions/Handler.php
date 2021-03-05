<?php

namespace App\Exceptions;

use Dotenv\Exception\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Routing\Router;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if (method_exists($exception, 'render') && $response = $exception->render($request)) {
            return Router::toResponse($request, $response);
        }
        
        if ($exception instanceof TokenMismatchException) {
            return response()->view('errors.419', ['exception' => $exception],404);
        }
        /**
         * App Exceptions
         */

        if ($exception instanceof Responsable) {
            return $exception->toResponse($request);
        }

        if ($exception instanceof HttpResponseException) {
            return $exception->getResponse();
        }

        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        /**
         * Custom Exceptions
         */

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->view('errors.404', ['exception' => $exception],404);
        }

        if ($exception instanceof TokenMismatchException) {
            return redirect()->back()->withInput($request->except('_token'))->with(['error' => trans('global.csrf_error')]);
        }

        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof ModelNotFoundException) {
            return redirect()->back()->withErrors(['message' => trans('global.record_not_found')]);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', ['exception' => $exception],404);
        }
    }
}
