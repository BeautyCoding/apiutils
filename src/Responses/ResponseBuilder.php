<?php

namespace BeautyCoding\ApiUtils\Responses;

use BeautyCoding\ApiUtils\Contracts\ResponseType;
use Symfony\Component\HttpFoundation\Response;

class ResponseBuilder
{
    /**
     * @var integer
     */
    private $statusCode = Response::HTTP_OK;

    /**
     * @var array
     */
    private $responseData = [];

    /**
     * Respone type
     * @var BeautyCoding\ApiUtils\Contracts\ResponseType
     */
    private $responseType;

    public function __construct(ResponseType $responseType)
    {
        $this->responseType = $responseType;
    }

    /**
     * Response wrapper. Create error response
     * @param string $message
     */
    public function setErrorMessage($message)
    {

        return $this->responseType->response(
            [
                'error' => [
                    'message' => $message,
                ],
                'data'  => $this->responseData,
            ],
            $this->statusCode
        );
    }

    /**
     * Response wrapper. Create success response
     * @param string $message
     */
    public function setSuccessMessage($message)
    {

        return $this->responseType->response(
            array_merge($message ? ['message' => $message] : [], $this->responseData),
            $this->statusCode
        );
    }

    /**
     * Response data setter
     * @param array $responseData
     */
    public function setResponseData(array $responseData)
    {
        $this->responseData = $responseData;

        return $this;
    }

    /**
     * Response paginated data setter
     * @param array $responseData
     */
    public function setPaginatedResponseData($responseData)
    {
        $this->responseData = $responseData->toArray();

        return $this;
    }

    /**
     * Status code setter
     * @param int $statusCode valid HTTP status code
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Response OK (200 HTTP code)
     * @param  string $message
     * @return Response
     */
    public function respondOK($message = '')
    {
        return $this->setSuccessMessage($message);
    }

    /**
     * Response no content (204 HTTP code)
     * @param  string $message
     * @return Response
     */
    public function respondNoContent($message = '')
    {
        return $this->setStatusCode(Response::HTTP_NO_CONTENT)->setSuccessMessage($message);
    }

    /**
     * Response created (201 HTTP code)
     * @param  string $message
     * @return Response
     */
    public function respondCreated($message = '')
    {
        return $this->setStatusCode(Response::HTTP_CREATED)->setSuccessMessage($message);
    }

    /**
     * Response Not found (404 HTTP code)
     * @param  string $message
     * @return Response
     */
    public function respondNotFound($message = '')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->setErrorMessage($message);
    }

    /**
     * Response Unauthorized (401 HTTP code)
     * @param  string $message
     * @return Response
     */
    public function respondUnauthorized($message = '')
    {
        return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->setErrorMessage($message);
    }

    /**
     * Response Forbidden (403 HTTP code)
     * @param  string $message
     * @return Response
     */
    public function respondForbidden($message = '')
    {
        return $this->setStatusCode(Response::HTTP_FORBIDDEN)->setErrorMessage($message);
    }

    /**
     * Response Unprocessable Entity (422 HTTP code)
     * @param  string $message
     * @return Response
     */
    public function respondUnprocessableEntity($message = '')
    {
        return $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)->setErrorMessage($message);
    }
}
