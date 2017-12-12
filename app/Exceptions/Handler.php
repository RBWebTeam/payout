<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use DB;
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
        public function render($request, Exception $e){ 
        //print_r($e);exit();.
        
        if($e instanceof NotFoundHttpException){
             return response()->view('layout.missing', [], 404);
        }
        else  if($e instanceof QueryException){
             //return $e;
        }else{
            $log=DB::table('error_log')->insert(['message'=>$e->getMessage(), 'file'=>$e->getFile(), 'line_no'=>$e->getLine(),'code'=>$e->getCode(), 'created_at'=>date("Y-m-d H:i:s")]);
            //return $e;
        }
        return parent::render($request, $e);


// if ($this->isHttpException($e)) {
//              //return $this->renderHttpExceptionView($e);
//            return \Response::view('layout.missing',array(),404);
//         }

        // if (config('app.debug')) {
        //    // return $this->renderExceptionWithWhoops($e);
        //      return \Response::view('went-wrong',array(),500);  
        // }


        }

}
