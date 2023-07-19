@extends('layouts.guest')
@section('content')

    <div class="therapies-container">
        @foreach ($therapies as $therapy )
        <div onclick="window.location.href = '/therapies/{{ $therapy->id }}'" class="therapy-card" style="background-image: url('{{asset('storage/'.$therapy->picture)}}')">
            <div class="therapy-card-content">
                <h1>{{ $therapy->name }}</h1>
                <h3>({{ $therapy->abbr }})</h3>
            </div>
        </div>
        @endforeach

    </div>

@endsection
