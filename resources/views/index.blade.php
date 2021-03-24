@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="card text-center bg-primary text-white">
            @if($data['cod'] == 404)
                <span class="large grey">{{$data['message']}}</span>
            @else
                <div class="card-header ">
                    <div class="row">
                        <form id="form" class="form-inline" action="{{ route('search') }}" method="GET">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search weather by City" aria-label="Search weather by city" name="city">
                                <button name="submit" class="btn btn-primary btn-lg" type="submit" ><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h1>{{$data['name']}}, {{$data['sys']['country']}}</h1>
                             <p> {{ date('j F', $data['dt']) }}</p>
                        </div>
                        <div class="col">
                            <img src="http://openweathermap.org/img/wn/{{ $data['weather'][0]['icon'] }}@2x.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col">
                            <h2 class="mb-0 font-weight-bold" id="heading"> {{ round($data['main']['temp']) }}&#176; C </h2> <span class="small grey"> {{ $data['weather'][0]['main'] }}</span>
                        </div>
                    </div>   
                </div>
                <div class="card-body bg-info">
                	<div class="row">
                		<div class="col">
                            <h2>{{ round($data['main']['temp_max']) }}&#176; C</h2>
                            <span class="small grey">High</span>
                        </div>
                        <div class="col">
                            <h2> {{ round($data['wind']['speed']) }}mph</h2>
                            <span class="small grey">Wind</span>
                        </div>
                        <div class="col">
                            <h2>{{ date('h:i A', $data['sys']['sunrise']) }}</h2>
                            <span class="small grey">sunrise</span>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col">
                            <h2>{{ round($data['main']['temp_min']) }}&#176; C</h2>
                            <span class="small grey">Low</span>
                        </div>
                        <div class="col">
                            <h2>{{ round($data['main']['feels_like']) }}&#176; C</h2>
                            <span class="small grey">Feels like</span>
                        </div>
                        <div class="col">
                            <h2>{{ date('h:i A', $data['sys']['sunset']) }}</h2>
                            <span class="small grey">Sunset</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection