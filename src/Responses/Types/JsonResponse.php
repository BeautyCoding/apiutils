<?php

namespace BeautyCoding\ApiUtils\Responses\Types;

use BeautyCoding\ApiUtils\Contracts\ResponseType;
use Symfony\Component\HttpFoundation\Response;

class JsonResponse implements ResponseType
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
        return response()->json($data, $status, $headers);
    }
}
