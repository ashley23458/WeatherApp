@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="row">
        <div class="card text-center  text-white px-2">
            <div class="card-body card-bg">
                <h1 class="text-center">Weather App</h1>
                <form id="form" class="form-inline" action="{{ route('search') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search weather by City" aria-label="Search weather by city" name="city">
                        <button name="submit" class="btn btn-search btn-lg" type="submit" ><i class="bi bi-search"></i></button>
                    </div>
                </form>
                @if($data['cod'] == 404)
                    <span class="large grey">{{$data['message']}}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card col-lg-6 text-center  text-white px-2">
            @if($data['cod'] == 404)
                <span class="large grey">{{$data['message']}}</span>
            @else
                <div class="card-body card-bg">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="http://openweathermap.org/img/wn/{{ $data['weather'][0]['icon'] }}@2x.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <h2>{{$data['name']}}, {{$data['sys']['country']}}</h2>
                                <p> {{ date('l jS F', $data['dt']) }}</p>
                            </div>
                            <div class="row">
                                <p>{{ $data['weather'][0]['main'] }}</p>
                            </div>
                            <div class="row">
                                <h3>{{ round($data['main']['temp']) }}&#176; C</h3>
                            </div>
                        </div>
                    </div> 
                </div>
            @endif
        </div>
        <div class="card col-lg-6 text-white px-2">
            @if($data['cod'] == 404)
                <span class="large grey">{{$data['message']}}</span>
            @else
                <div class="card-body card-bg">
                    <p class="fs-5">
                        Wind: {{ round($data['wind']['speed']) }}mph<br>
                        Sunrise: {{ date('h:i A', $data['sys']['sunrise']) }}<br>
                        Sunset: {{ date('h:i A', $data['sys']['sunset']) }}<br>
                        Real feel: {{ round($data['main']['feels_like']) }}&#176; C<br>


                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection