@extends('layouts.guest')
@section('content')




<div class="therapies-container">
    @foreach ($services as $service )
    <div onclick="window.location.href = '/services/{{ $service->id }}'" class="therapy-card" style="background-image: url('{{asset('storage/'.$service->picture)}}')">
        <div class="therapy-card-content">
            <h1>{{ $service->name }}</h1>
        </div>
    </div>
    @endforeach
    @foreach ($coachings as $coaching )
    <div onclick="window.location.href = '/coachings/{{ $coaching->id }}'" class="therapy-card" style="background-image: url('{{asset('storage/'.$coaching->picture)}}')">
        <div class="therapy-card-content">
            <h1>{{ $coaching->name }}</h1>
        </div>
    </div>
    @endforeach
</div>





@endsection
