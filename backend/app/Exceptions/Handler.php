<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $throwable)
    {
        if ($request->is('api/*')) {
            return $this->apiRender($request, $throwable);
        } else {
            return parent::render($request, $throwable);
        }
    }
    
    private function apiRender($request, Throwable $throwable)
    {
        $exception = $this->prepareException($throwable);

        return $this->customApiResponse($exception);
    }

    private function customApiResponse($exception)
    {
        $statusCode = 500;
        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        }
        $responses = [
            'code' => $statusCode
        ];
        switch ($statusCode) {
            case 401:
                $responses['message'] = 'Unauthorized';
                $responses['user_message'] = '認証できませんでした。ログインしてください。';
                // $responses['user_message'] = __('exception.E401');
                break;
            case 403:
                $responses['message'] = 'Forbidden';
                $responses['user_message'] = '指定されたリクエストは許可されていません。';
                // $responses['user_message'] = __('exception.E403');
                break;
            case 404:
                $responses['message'] = 'Not Found';
                $responses['user_message'] = '対象のデータは見つかりませんでした。';
                // $responses['user_message'] = __('exception.E404');
                break;
            case 405:
                $responses['message'] = 'Method Not Allowed';
                $responses['user_message'] = '指定されたHTTPメソッドは対応していません。';
                // $responses['user_message'] = __('exception.E405');
                break;
            case 500:
                $responses['message'] = 'Internal Server Error';
                $responses['user_message'] = 'エラーが発生しました。システムお問い合わせフォームからお問い合わせください。';
                // $responses['user_message'] = __('exception.E500');
                break;
            case 503:
                $responses['message'] = 'Service Temporarily Unavailable';
                $responses['user_message'] = 'アクセスが集中しているためエラーが発生しました。';
                // $responses['user_message'] = __('exception.E503');
                break;
            default:
                $responses['message'] = 'Internal Server Error';
                $responses['user_message'] = 'エラーが発生しました。システムお問い合わせフォームからお問い合わせください。';
                // $responses['user_message'] = __('exception.default');
                break;
        }
        return response()->json(['error' => $responses], $statusCode);
    }
}
