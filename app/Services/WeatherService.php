<?php

namespace App\Services;


use App\Models\Weather;
use Carbon\Carbon;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Http;

class WeatherService {

    private $apiKey;

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getTemp(string $city){

        $dbconsult = $this->getCityFromDb($city);

        $dbupdatedAt = $dbconsult ? $dbconsult->toArray()['updated_at'] : null;
        $now = Carbon::now();
        $minutesDiff = $now->diffInMinutes($dbupdatedAt);


        if (empty($dbconsult) || $minutesDiff > 20) {

            $temperature = $this->callApi($city);

            $weather = $this->persist($temperature, $dbconsult);

            return $weather;
        };
        
        return $dbconsult->toArray();
    }

    private function getCityFromDb(string $city){
        return Weather::where('city_name', $city)->first();
    }

    private function callApi(string $city){
        return $response = Http::get('http://api.openweathermap.org/data/2.5/weather',[
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => 'metric'               
        ])->json();
    }

    private function persist(array $temperature, ? Weather $dbconsult){
        
        $weather =  empty($dbconsult) ? new Weather() : $dbconsult;

        $weather->city_name = $temperature['name'];
        $weather->temp = $temperature['main']['temp'];
        $weather->feels_like = $temperature['main']['feels_like'];
        $weather->temp_min = $temperature['main']['temp_min'];
        $weather->temp_max = $temperature['main']['temp_max'];

        $weather->save();

        return $weather;
    }
}