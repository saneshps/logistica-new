<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Helpers\FetchIpHelper;
use Throwable;
use App;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
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
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            $countryCode = FetchIpHelper::fetchIp();
            $loc_val = trim(request()->route('locale')) ? trim(request()->route('locale')) :  app()->getLocale();
            $languages = config('app.available_locales');
            $param = explode('/', request()->path());
            $path = ltrim(request()->path(), $param[0] . '/');
            if ($param[0] == 'en' || $param[0] == 'ar') {
                return redirect()->to($countryCode . '/' . $param[0] . '/' . $path);
            } else {
                return redirect('/');
            }
        }
        if ($exception instanceof HttpException && $exception->getStatusCode() == 500) {
            return redirect('/'); // Redirect to the index route
        }

        return parent::render($request, $exception);
    }

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
