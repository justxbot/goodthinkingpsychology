@extends('layouts.guest')
@section('content')


<x-banner title="{{ $therapy->name }}" subtitle="({{ $therapy->abbr }})" img="{{asset('/storage/'.$therapy->picture)}}"></x-banner>
<div class="therapy-container">
    <h1 class="section-title">What is {{ $therapy->name }} ?</h1>
    <div class="therapy-description">
        {{ $therapy->description }}
    </div>
    <h1 class="section-title">What is {{ $therapy->abbr }} used to treat ?</h1>
    <div class="therapy-description">
        <ul>
            @foreach (json_decode($therapy->treatables) as $treatable )
                <li style="list-style-type: none;font-size:20px"><i style="color:var(--secondary)" class="fa-solid fa-arrow-right"></i> {{ $treatable }}</li>
            @endforeach
        </ul>
    </div>
    <h1 class="section-title">Who can i see for {{ $therapy->abbr }} ?</h1>
    <div class="therapy-assigned">

        @forelse ($team_members as $team_member )
        <div class = "team-member-card" style="background-image: url({{ asset('storage/'.$team_member->picture) }})">
            <div class="team-member-card-content" >
                <div class="team-member-fullname">
                    <h1>{{ $team_member->fname }}</h1>
                    <h1>{{ $team_member->lname }}</h1>
                </div>
                <hr>
                <div class="team-member-role">
                    <h3>{{ $team_member->role }}</h3>
                </div>
                <hr>
                <div class="team-member-degree">
                    <h3>{{ $team_member->degree }}</h3>
                </div>
                <hr>
                <div class="team-member-availability">
                    <h3>{{ $team_member->availability }}</h3>
                </div>
                <hr>
                <div class="team-member-plan-fee">
                    <h3>Fee: <span>${{ $team_member->plan->fee }}</span></h3>
                </div>
                <div class="team-member-plan-returnable">
                    <h3>With Mental Health Care Plan - Receive <span>${{ $team_member->plan->returnable_fee }}</span> back from Medicare</h3>
                </div>
                <div class="team-member-footer">
                    <button class="learnmore-btn" onclick="window.location.href = '/our-team/{{$team_member->id}}'">MORE DETAILS <i class="fa-solid fa-info"></i></button>
                </div>
            </div>

          </div>
          @empty
            <h2>No one is assigned yet</h2>
        @endforelse
    </div>
</div>


@endsection
