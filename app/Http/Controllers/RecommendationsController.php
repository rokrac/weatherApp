<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\ResponseResource;
use App\Models\Condition;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Services\Api;
use Facade\FlareClient\Http\Response;
use App\Caches\ApiCache;
use Illuminate\Support\Facades\Validator;

class RecommendationsController extends Controller
{
    public function __construct(ApiCache $apiCache)
    {
        $this->apiCache = $apiCache;
    }

    public function getRecommendations($city)
    {
        $validator = Validator::make(['city' => $city], [
            'city' => 'required|string|max:30'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        return $this->apiCache->responseHandler($city);
    }
}
