<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Request;

class WeatherServiceTest extends TestCase
{

    public function test_check_api_key_usage(){
        $apiKey='apiID';
        
        $service = new WeatherService($apiKey);

        Http::fake([
            '*' => Http::response('{"coord":{"lon":-49.0606,"lat":-22.3147},"weather":[{"id":800,"main":"Clear","description":"clear sky","icon":"01n"}],"base":"stations","main":{"temp":300.67,"feels_like":300.09,"temp_min":300.67,"temp_max":300.67,"pressure":1016,"humidity":34},"visibility":10000,"wind":{"speed":1.54,"deg":100},"clouds":{"all":0},"dt":1662071798,"sys":{"type":1,"id":8341,"country":"BR","sunrise":1662024390,"sunset":1662066388},"timezone":-10800,"id":3470279,"name":"Bauru","cod":200}', 200)
        ]);

        $service->getTemp('Palmas');
        Http::assertSent(function (Request $request) use($apiKey) {
            return $request->data()['appid'] == $apiKey &&
                   $request->url() == 'http://api.openweathermap.org/data/2.5/weather?q=Palmas&appid=apiID&units=metric' ;
                   
        });
    }
}
