<?php

namespace BeautyCoding\ApiUtils\Responses\Types;

use BeautyCoding\ApiUtils\Contracts\ResponseType;
use Symfony\Component\HttpFoundation\Response;

class PlainResponse implements ResponseType
{
    /**
     * Method create json data response
     * @param  array   $data    response data array
     * @param  integer $status  HTTP status code
     * @param  array   $headers additional headers
     * @return Response
     */
    public function response($data, $status, $headers = [])
    {
        return [
            'data'    => $data,
            'status'  => $status,
            'headers' => $headers,
        ];
    }
}
