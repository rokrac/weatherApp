<?php

namespace App\Services;

use App\DataFormers\FormApiData;
use Illuminate\Support\Facades\Http;
use \Carbon\Carbon;

class Api extends Http
{

    CONST SOURCE = 'LHMT';

    public function __construct(FormApiData $formApiData)
    {
        $this->formApiData = $formApiData;
        $this->forecastsArray = [];
    }

    public function responseHandler($city)
    {
        try {
            $response = Api::get('https://api.meteo.lt/v1/places/' . $city . '/forecasts/long-term');
            $timestamps = $response->json()['forecastTimestamps'];
            $date = $this->today();
            while ($date <= $this->addDays($this->today(), '2')) {
                $forecasts = [];
                foreach ($timestamps as $key => $timestamp) {
                    if ($this->getDate($timestamp['forecastTimeUtc']) == $date) {
                        array_push($forecasts, $timestamp['conditionCode']);
                        unset($timestamps[$key]);
                    }
                }
                array_push($this->forecastsArray, [$date, $this->getConditionOfDay($forecasts)]);
                $date = $this->addDays($date);
            }
            return response($this->formApiData->formData($city, $this->forecastsArray), 200)->header('Data-Source', self::SOURCE);
        } catch (\Exception $e) {
            return response(['errors' => 'City is not found'], 404);
        } catch (\Throwable $e) {
            return response(['errors' => 'Server error'], 500);
        }
    }

    private function getConditionOfDay($forecasts)
    {
        $count = array_count_values($forecasts);
        return array_search(max($count), $count);
    }

    private function today()
    {
        return Carbon::now()->format('Y-m-d');
    }

    private function addDays($date, $days = '1')
    {
        return Carbon::parse($date)->addDays($days)->format('Y-m-d');
    }

    private function getDate($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}
