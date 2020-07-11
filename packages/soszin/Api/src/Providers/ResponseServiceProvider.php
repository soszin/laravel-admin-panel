<?php

namespace Soszin\Api\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\ResponseFactory;
use Soszin\Api\Helpers;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ResponseServiceProvider extends ServiceProvider
{
    use Helpers;

    public function boot(ResponseFactory $responseFactory)
    {
        $response = $this->response();

        $responseFactory->macro('errorUnauthorized', function(string $message = 'Unauthorized') use ($response) {
            $response->errorUnauthorized($message);
        });

        $responseFactory->macro('item', function($item, $message = 'Ok', $code = 200) use ($response) {
            return $response->item($item, $message, $code);
        });
    }
}