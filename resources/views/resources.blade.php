@extends('layouts.guest')
@section('content')

<div class="resources-container">

    @foreach ($resources as $resource)
        <div class="resource-card">
            <div class="resource-img" style="background-image: url('{{ asset("/storage/".$resource->logo) }}')">
            </div>
            <div class="resource-body">
                <h1>{{ $resource->name }}</h1>
                <p>{{ $resource->description }}</p>
                <a class="resource-btn" href="{{ $resource->website }}" target="__blank">Visit their website <i class="fa-solid fa-share"></i></a>
            </div>
        </div>
    @endforeach
</div>


@endsection
