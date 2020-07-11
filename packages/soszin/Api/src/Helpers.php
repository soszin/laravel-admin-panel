<?php

namespace Soszin\Api;

use Soszin\Api\Http\Factory;

trait Helpers
{
    protected function response(): Factory
    {
        return app(Factory::class);
    }
}