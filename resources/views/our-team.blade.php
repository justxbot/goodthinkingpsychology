@extends("layouts.guest")
@section('content')

<div class="our-team-container">
    <x-banner title="OUR TEAM" subtitle="Guiding minds, transforming lives, with compassion and expertise!" img="{{ asset('images/our-team-banner.jpg') }}"/>
    <h1 class="section-title">TEAM MEMBERS</h1>
    <div class="our-team-content">
        @foreach ($team_members as $team_member )
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
        @endforeach
    </div>

</div>
<x-call-to-action></x-call-to-action>

@endsection
