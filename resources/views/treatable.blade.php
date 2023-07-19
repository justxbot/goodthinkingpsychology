@extends('layouts.guest')
@section('content')

<x-banner title="{{ $treatable->name }}" img="{{asset('/storage/'.$treatable->picture)}}"></x-banner>
<div class="therapy-container">
    <h1 class="section-title">What is {{ $treatable->name }} ?</h1>
    <div class="therapy-description">
        {{ $treatable->description }}
    </div>
    <h1 class="section-title">What causes {{ $treatable->name }}?</h1>
    <div class="therapy-description">
        <ul>
            @foreach (json_decode($treatable->causes) as $cause )
            <li style="list-style-type: none;font-size:20px"><i style="color:var(--secondary)" class="fa-solid fa-arrow-right"></i> {{ $cause }}</li>
            @endforeach
        </ul>
    </div>
    <h1 class="section-title">What is some of {{ $treatable->name }}'s symptoms?</h1>

    <div class="therapy-description">
        <ul>
            @foreach (json_decode($treatable->symptoms) as $symptom )
            <li style="list-style-type: none;font-size:20px"><i style="color:var(--secondary)" class="fa-solid fa-arrow-right"></i> {{ $symptom }}</li>
            @endforeach
        </ul>
    </div>

    </div>
    <x-call-to-action></x-call-to-action>


@endsection
