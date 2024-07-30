<?php

namespace App\Traits;

use App\Helpers\ResponseCode;
use App\Jobs\ErrorToTelegram;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Nette\Schema\ValidationException;

use function response;

trait Responsible
{

    /**
     * Response message
     *
     * @var string
     */
    private string $message = '';
    /**
     * Response data
     *
     * @var array|AnonymousResourceCollection
     */
    private $data = [];
    /**
     * Response status code
     *
     * @var int
     */
    private int $statusCode;

    public function noContent(): JsonResponse
    {
        return $this->responseWith(code: ResponseCode::HTTP_NO_CONTENT);
    }

    //Exception
    public function responseException(
        \Exception $e,
        #[\JetBrains\PhpStorm\ExpectedValues(valuesFromClass: ResponseCode::class)]
        ?string $message = null
    ): JsonResponse {
        if ($e instanceof ValidationException) {
            return response()->json(
                [
                    'message' => $e->getMessage(),
                    "errors"  => $e->getMessageObjects(),
                ], 422);
        }

        $code = $e->getCode();

        if (is_string($code) || $code >= 500) {
            dispatch(new ErrorToTelegram($e, $code));
            $code = 500;
        }

        $this->message = $message ?? $e->getMessage();

        if (app()->isLocal()) {
            $this->data = ['trace' => $e->getTrace()];
        }
        $this->statusCode = $code;

        //event(new LoggerEvent(response: $this->data, response_status: $this->statusCode,
        //        response_message:       $this->message));

        return $this->response();
    }

    //Response only message
    public function responseMessage(
        string $message,
        #[\JetBrains\PhpStorm\ExpectedValues(valuesFromClass: ResponseCode::class)]
        int $code = ResponseCode::HTTP_OK
    ): JsonResponse {
        $this->message    = $message;
        $this->statusCode = $code;

        //event(new LoggerEvent(response: $this->data, response_status: $this->statusCode,
        //        response_message:       $this->message));

        return $this->response();
    }

    public function responseWith(
        $data = [],
        #[\JetBrains\PhpStorm\ExpectedValues(valuesFromClass: ResponseCode::class)]
        int $code = ResponseCode::HTTP_OK,
        string $message = '',
    ): JsonResponse {
        $this->message    = empty($message) ? __("http-statuses.$code") : $message;
        $this->data       = $data;
        $this->statusCode = match ($code) {
            ResponseCode::HTTP_OK, 200 => 200,
            ResponseCode::HTTP_NO_CONTENT, 204 => 204,
            ResponseCode::HTTP_CREATED, 201 => 201,
            ResponseCode::HTTP_BAD_REQUEST, 400 => 400,
            ResponseCode::HTTP_UNAUTHORIZED, 401 => 401,
            ResponseCode::HTTP_FORBIDDEN, 403 => 403,
            ResponseCode::HTTP_METHOD_NOT_ALLOWED, 405 => 405,
            ResponseCode::HTTP_NOT_FOUND, 404 => 404,
            ResponseCode::HTTP_UNPROCESSABLE_ENTITY, 422 => 422,
            ResponseCode::HTTP_TOO_MANY_REQUESTS, 429 => 429,
            ResponseCode::HTTP_BAD_GATEWAY, 502 => 502,
            ResponseCode::HTTP_GATEWAY_TIMEOUT, 504 => 504,
            ResponseCode::HTTP_INTERNAL_SERVER_ERROR, 0, 500 => 500,
        };

        return $this->response();
    }

    /**
     * Send response
     */
    private function response(): JsonResponse
    {
        $data = ['code' => $this->statusCode, 'message' => $this->message, 'data' => $this->data];

        return new JsonResponse($data, $this->statusCode);
    }

}
