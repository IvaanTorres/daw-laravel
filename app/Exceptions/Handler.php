<?php

namespace App\Exceptions;

use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //! ->reportable() : Salta un error sin tratar (HTML).
        //! ->renderable() : Trata el error sin ningún problema.
        $this->renderable(function (Throwable $e) {
            if (request()->is('api*')){
                if ($e instanceof ModelNotFoundException){
                    return response()->json(['error' => 'Recurso no encontrado'], 404);
                } else if ($e instanceof ValidationException){
                    return response()->json(['error' => 'Datos no válidos'], 400);
                } else if (isset($e)){
                    return response()->json(['error' => 'Error: ' . $e->getMessage()], 500);
                }
            }
        });
    }
}
