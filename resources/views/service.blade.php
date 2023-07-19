@extends('layouts.guest')
@section('content')

<x-banner title="{{ $service->name }}" img="{{asset('/storage/'.$service->picture)}}"></x-banner>
<div class="service-container">

    <div class="therapies-container">
        @foreach ($treatables as $treatable )
        <div onclick="window.location.href = '/treatables/{{ $treatable->id }}'" class="therapy-card" style="background-image: url('{{asset('storage/'.$treatable->picture)}}')">
            <div class="service-card-content">
                <h1>{{ $treatable->name }}</h1>
            </div>
        </div>
        @endforeach

    </div>



</div>
@endsection
