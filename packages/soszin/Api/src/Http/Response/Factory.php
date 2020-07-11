<?php

namespace Soszin\Api\Http;

use Symfony\Component\HttpKernel\Exception\HttpException;

class Factory
{
    /**
     * @param int $statusCode
     * @param string $message
     * @throws HttpException
     */
    public function error(int $statusCode, string $message)
    {
        throw new HttpException($statusCode, $message);
    }

    /**
     * @param string $message
     * @throws HttpException
     */
    public function errorUnauthorized(string $message = 'Unauthorized')
    {
        $this->error(401, $message);
    }

    public function item($item, string $message = 'Ok', int $code = 400)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $item
        ]);
    }
}