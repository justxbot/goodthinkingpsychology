@extends('layouts.guest')
@section('content')


<div class="therapies-container">
    @forelse ($workshops as $workshop )
    <div onclick="window.location.href = '/workshops/{{ $workshop->id }}'" class="therapy-card" style="background-image: url('{{asset('storage/'.$workshop->picture)}}')">
        <div class="therapy-card-content">
            <h1 style=" color:white;   text-shadow: 4px 3px var(--primary);">{{ $workshop->name }}</h1>
            <h1 style=" color:var(--primary);   text-shadow: 4px 3px var(--secondary);">{{ $workshop->period }}</h1>
        </div>
    </div>
    @empty
    nothing yet
    @endforelse

</div>


@endsection
