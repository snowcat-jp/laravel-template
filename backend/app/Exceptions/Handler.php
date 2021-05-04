<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
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

        if ($exception instanceof AuthenticationException) {
            return $this->authenticationError();
        } elseif ($exception instanceof ValidationException) {
            return $this->validationError($request, $exception);
        }

        return $this->customApiResponse($exception);
    }

    private function authenticationError()
    {
        $responses = [
            'code' => 403,
            'errorType' => 'Unauthorized',
            'message' => '認証が必要です。'
        ];
        return response()->json(['error' => $responses], 403);
    }

    private function validationError($request, ValidationException $exception)
    {
        $messages = [];
        foreach ($exception->errors() as $errors) {
            $messages = array_merge($messages, $errors);
        }

        $responses = [
            'code' => 400,
            'errorType' => 'validationError',
            'message' => implode('\n', $messages)
        ];
        return response()->json(['error' => $responses], 400);
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
                $responses['errorType'] = 'Unauthorized';
                $responses['message'] = '認証できませんでした。ログインしてください。';
                // $responses['message'] = __('exception.E401');
                break;
            case 403:
                $responses['errorType'] = 'Forbidden';
                $responses['message'] = '指定されたリクエストは許可されていません。';
                // $responses['message'] = __('exception.E403');
                break;
            case 404:
                $responses['errorType'] = 'Not Found';
                $responses['message'] = '対象のデータは見つかりませんでした。';
                // $responses['message'] = __('exception.E404');
                break;
            case 405:
                $responses['errorType'] = 'Method Not Allowed';
                $responses['message'] = '指定されたHTTPメソッドは対応していません。';
                // $responses['message'] = __('exception.E405');
                break;
            case 500:
                $responses['errorType'] = 'Internal Server Error';
                $responses['message'] = $exception->getMessage();;
                // $responses['message'] = 'エラーが発生しました。システムお問い合わせフォームからお問い合わせください。';
                // $responses['message'] = __('exception.E500');
                break;
            case 503:
                $responses['errorType'] = 'Service Temporarily Unavailable';
                $responses['message'] = 'アクセスが集中しているためエラーが発生しました。';
                // $responses['message'] = __('exception.E503');
                break;
            default:
                $responses['errorType'] = 'Internal Server Error';
                $responses['message'] = 'エラーが発生しました。システムお問い合わせフォームからお問い合わせください。';
                // $responses['message'] = __('exception.default');
                break;
        }
        return response()->json(['error' => $responses], $statusCode);
    }
}
