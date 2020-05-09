<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        if($this->isHttpException($exception)){
            $code = $exception->getStatusCode();
            if($code==404) return response()->view('error',['error' => $code, 'mensaje' => "No hemos podido encontrar lo que buscabas"]);
            return response()->view('error',['error' => $code, 'mensaje' => "Ha habido un error"]);
        } else {
            return response()->view('error',['error' => 500, 'mensaje' => "Ha habido un error interno en el servidor. Por favor, si este error persiste contacta con un administrador."]);
        }
        //si activamos estos else, cualquier error que haya en la página se notificará
        //como error del servidor de libros por libros.
        //Los usuarios nunca veran que error ha tenido el servidor.
        //Usar esto en presentaciones importantes, ya que es muy radical y priva de hacer testing
        return parent::render($request, $exception);
    }
}
