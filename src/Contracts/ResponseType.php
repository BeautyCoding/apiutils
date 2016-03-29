<?php

namespace BeautyCoding\ApiUtils\Contracts;

interface ResponseType
{
    /**
     * Method create proper response
     * @param  array   $data    response data array
     * @param  integer $status  HTTP status code
     * @param  array   $headers additional headers
     * @return Response
     */
    public function response($data, $status, $headers = []);
}
