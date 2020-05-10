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
            //Si hay un error interno, este se envia por email a la cuenta oficial de libros por libros.
            //lo dejo comentado, porque lo del mail solo va en mi pc, ya que xampp está configurado para ello, en cambio si se ejecuta en el pc del profesor que lo corrija no le funcionará
            /*$to_email = "librosporlibros2@gmail.com";
            $subject = "Error en la pagina";
            $body = "Se ha generado un error en la pagina. Este es el error:\n\n".parent::render($request, $exception);
            $headers = "From: LibrosPorLibros";
            
            mail($to_email, $subject, $body, $headers);*/
            

            return response()->view('error',['error' => 500, 'mensaje' => "Ha habido un error interno en el servidor. Un administrador ya ha sido notificado de esto. Si el error persiste escribe a librosporlibros@gmail.com"]);
        }
        //si activamos estos else, cualquier error que haya en la página se notificará
        //como error del servidor de libros por libros.
        //Los usuarios nunca veran que error ha tenido el servidor.
        //Usar esto en presentaciones importantes, ya que es muy radical y priva de hacer testing
        return parent::render($request, $exception);
    }
}
