<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weather;

    public function __construct(WeatherService $weather)
    {
        $this->weather = $weather;
    }

    public function show(Request $request)
    {
        $city = $request->input('city', 'Riga');
        $weatherData = $this->weather->getWeather($city);

        if (!$weatherData) {
            return response()->json(['error' => 'NO DATA'], 500);
        }

        return response()->json($weatherData);
    }
}
