<?php

namespace App\Caches;

use App\Services\Api;
use Carbon\Carbon;

class ApiCache 
{
    CONST CACHE_KEY = 'weatherKey';
 
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function responseHandler($city) {
       $key = "weather.{$city}";
       $cacheKey = $this->getCacheKey($key);
       return cache()->remember($cacheKey,Carbon::now()->addMinutes(5),function() use ($city) {
            return $this->api->responseHandler($city);
       });
    }

    public function getCacheKey($key) {
        return self::CACHE_KEY . ".$key";
    }
}