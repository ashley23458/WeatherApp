<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
	public function index()
	{
		$response = Http::get('api.openweathermap.org/data/2.5/weather', [
            'q' => "London",
            'units' => 'metric',
            'appid' => config('services.openweather.key'),
        ])->json();
		return view('index', ['data' => $response]);

	}

	public function search(SearchRequest $request)
	{
		$request->validate([
			'city' => 'string, required',
		]);
		$response = Http::get('api.openweathermap.org/data/2.5/weather', [
            'q' => $request->city,
            'units' => 'metric',
            'appid' => config('services.openweather.key'),
        ])->json();
		return view('index', ['data' => $response]);
	}
}
