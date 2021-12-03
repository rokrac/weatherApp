<?php

namespace App\DataFormers;

use App\Http\Resources\ProductsResource;
use App\Models\Condition;

class FormApiData
{
    public function formData($city, $forecastArray)
    {
        $data = [
            'city' => $city,
            'recommendations' => []
        ];
        $recommendations = [];
        foreach ($forecastArray as $weather) {
            $recommendations = [
                'weather_forecast' => $weather[1],
                'date' => $weather[0],
                'products' => (Condition::byName($weather[1])->first()->products->count() > 0) ?
                    ProductsResource::collection(Condition::byName($weather[1])->first()->products()->inRandomOrder()->limit(2)->get()) : []
            ];
            array_push($data["recommendations"], $recommendations);
        }
        return $data;
    }
}
