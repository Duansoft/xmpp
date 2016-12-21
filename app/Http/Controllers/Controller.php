<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /* Response Helper Methods */

    protected function responseSuccess($message = '')
    {
        $response = [
            'status_code' => 200
        ];

        if (!empty($message)) {
            $response['data'] = $message;
        }

        return response()->json($response);
    }

    protected function responseError($errorCode = 200, $errorMessage)
    {
        $response = [
            'status_code' => $errorCode,
            'message' => $errorMessage,
            'error' => $errorMessage,
        ];
        return response()->json($response)->setStatusCode($errorCode);
    }

    protected function responseBadRequestError($message)
    {
        $response = [
            'status_code' => '400',
            'message' => $message,
            'error' => 'Bad Request Http Error',
        ];
        return response()->json($response)->setStatusCode('400');
    }

    protected function responseUnauthorizedError($message)
    {
        $response = [
            'status_code' => '401',
            'message' => $message,
            'error' => 'Unauthorized Http Error',
        ];
        return response()->json($response)->setStatusCode('401');
    }

    protected function responseAccessDeniedError($message)
    {
        $response = [
            'status_code' => '403',
            'message' => $message,
            'error' => 'Access Denied Error',
        ];
        return response()->json($response)->setStatusCode('403');
    }

    protected function responseNotFoundError($message)
    {
        $response = [
            'status_code' => '404',
            'message' => $message,
            'error' => 'NotFound Http Error',
        ];
        return response()->json($response)->setStatusCode('404');
    }

    protected function responseMethodNotAllowedError($message)
    {
        $response = [
            'status_code' => '405',
            'message' => $message,
            'error' => 'MethodNotAllowed Http Error',
        ];
        return response()->json($response)->setStatusCode('405');
    }

    protected function responseNotAcceptableError($message)
    {
        $response = [
            'status_code' => '406',
            'message' => $message,
            'error' => 'NotAcceptable Http Error',
        ];
        return response()->json($response)->setStatusCode('406');
    }

    protected function responseConflictError($message)
    {
        $response = [
            'status_code' => '409',
            'message' => $message,
            'error' => 'Conflict Http Error',
        ];
        return response()->json($response)->setStatusCode('409');
    }

    protected function responseGoneError($message)
    {
        $response = [
            'status_code' => '410',
            'message' => $message,
            'error' => 'Gone Http Error',
        ];
        return response()->json($response)->setStatusCode('410');
    }

    protected function responseLengthRequiredError($message)
    {
        $response = [
            'status_code' => '411',
            'message' => $message,
            'error' => 'LengthRequired Http Error',
        ];
        return response()->json($response)->setStatusCode('411');
    }

    protected function responsePreconditionFailedError($message)
    {
        $response = [
            'status_code' => '412',
            'message' => $message,
            'error' => 'PreconditionFailed Http Error',
        ];
        return response()->json($response)->setStatusCode('412');
    }

    protected function responseUnsupportedMediaTypeError($message)
    {
        $response = [
            'status_code' => '415',
            'message' => $message,
            'error' => 'UnsupportedMediaType Http Error',
        ];
        return response()->json($response)->setStatusCode('415');
    }

    protected function responseValidationError($validator)
    {
        $response = [
            'status_code' => '422',
            'message' => 'failed to check validation',
            'error' => $validator->errors()->all(),
        ];
        return response()->json($response)->setStatusCode('422');
    }

    protected function responsePreconditionRequiredError($message)
    {
        $response = [
            'status_code' => '428',
            'message' => $message,
            'error' => 'PreconditionRequired Http Error',
        ];
        return response()->json($response)->setStatusCode('428');
    }

    protected function responseTooManyRequestsError($message)
    {
        $response = [
            'status_code' => '429',
            'message' => $message,
            'error' => 'TooManyRequests Http Error',
        ];
        return response()->json($response)->setStatusCode('429');
    }

    protected function responseInternalServerError($message = 'Internal Server Error')
    {
        $response = [
            'status_code' => '500',
            'message' => $message,
            'error' => 'Internal Server Error',
        ];
        return response()->json($response)->setStatusCode('500');
    }
}
