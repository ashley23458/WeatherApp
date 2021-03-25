<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
	public function getWeather($response)
	{
		return $response = Http::get('api.openweathermap.org/data/2.5/weather', [
            'q' => $response,
            'units' => 'metric',
            'appid' => config('services.openweather.key'),
        ])->json();
	}

	public function index()
	{
		return view('index', ['data' => self::getWeather("london")]);

	}

	public function search(SearchRequest $request)
	{
		return view('index', ['data' => self::getWeather($request->city)]);
	}

	public function filter($city)
	{
		return view('index', ['data' => self::getWeather($city)]);
	}
}
