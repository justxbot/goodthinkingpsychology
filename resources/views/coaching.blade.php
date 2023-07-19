@extends('layouts.guest')
@section('content')

<div class="coaching-container">

    <div class="coaching-infos">
        <h1 class="coaching-title">{{ $coaching->name }}</h1>
        <div class="coaching-questions">

            <ul>
                @foreach (json_decode($coaching->questions) as $question )
                    @if($question != "")
                        <li><i class="fa-solid fa-arrow-right"></i> {{ $question }}</li><br>
                    @endif
                 @endforeach
            </ul>
        </div>
        <div class="coaching-description">
            {{ $coaching->description }}
            <div class="coaching-footer">
                <h4></h4>
                <button onclick="window.location.href ='/contact-us' ">Contact us<i class="fa-solid fa-share"></i></button>
            </div>
        </div>
    </div>

    <div class="coaching-member-container" style="background-image: url({{ asset('/storage/'.$coaching->picture) }})">
        <div class="coaching-member-container-filter">
            @if($coaching->team_member)

            <h1>The Coach</h1>
            <div class = "team-member-card" style="background-image: url({{ asset('/storage/'.$coaching->team_member->picture) }})">
                <div class="team-member-card-content" >
                    <div class="team-member-fullname">
                        <h1>{{ $coaching->team_member->fname }}</h1>
                        <h1>{{ $coaching->team_member->lname }}</h1>
                    </div>
                    <hr>
                    <div class="team-member-role">
                        <h3>{{ $coaching->team_member->role }}</h3>
                    </div>
                    <hr>
                    <div class="team-member-degree">
                        <h3>{{ $coaching->team_member->degree }}</h3>
                    </div>
                    <hr>
                    <div class="team-member-availability">
                        <h3>{{ $coaching->team_member->availability }}</h3>
                    </div>
                    <hr>
                    <div class="team-member-plan-fee">
                        <h3>Fee: <span>${{ $coaching->team_member->plan->fee }}</span></h3>
                    </div>
                    <div class="team-member-plan-returnable">
                        <h3>With Mental Health Care Plan - Receive <span>${{ $coaching->team_member->plan->returnable_fee }}</span> back from Medicare</h3>
                    </div>
                    <div class="team-member-footer">
                        <button class="learnmore-btn" onclick="window.location.href = '/our-team/{{$coaching->team_member->id}}'">MORE DETAILS <i class="fa-solid fa-info"></i></button>
                    </div>
                </div>

              </div>


            @else

              <h1>No one is assigned to this yet</h1>

            @endif

        </div>

    </div>

</div>





@endsection
