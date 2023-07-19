@extends('layouts.guest')
@section('content')

<div class="member-profile-container">
    <div class="member-picture-container">
        <img src="{{asset('storage/'.$member->picture) }}" alt="" >
        <div class="member-icons">
            @if ($member->facebook_link)
                <i onclick="window.open('{{ $member->facebook_link }}')" class="fa-brands fa-facebook-f"></i>
            @endif
            @if ($member->instagram_link)
                <i onclick="window.open('{{ $member->instagram_link }}')" class="fa-brands fa-instagram"></i>
            @endif
            @if ($member->email)
                <i onclick="window.open('mailto:{{$member->email }}')" class="fa-brands fa-at"></i>
            @endif
        </div>
    </div>

    <div class="member-content">
        <div class="member-content-header">
            <h1>{{ $member->fname}}</h1>
            <h1>{{ $member->lname}}</h1>
        </div>
        <div class="member-content-body">

            @if ($member->special_interests)
                <div class="member-section">
                    <h3><i class="fa-solid fa-fingerprint"></i> Special Interests</h3>
                    <ol>
                    @forelse (json_decode($member->special_interests) as $interest )
                        <li><i class="fa-solid fa-arrow-right"></i> {{ $interest }}</li>
                    @empty
                        no infos yet
                    @endforelse
                    </ol>
                </div>
            @endif

            @if ($member->qualifications)
            <div class="member-section">
                <h3><i class="fa-solid fa-certificate"></i> Qualifications</h3>
                <ol>
                @forelse (json_decode($member->qualifications) as $qualification )
                    <li><i class="fa-solid fa-arrow-right"></i> {{ $qualification }}</li>
                @empty
                    no infos yet
                @endforelse
                </ol>
            </div>
            @endif

            @if ($member->experiences)
            <div class="member-section">
                <h3><i class="fa-solid fa-ranking-star"> </i>Experiences</h3>
                <ol>
                @forelse (json_decode($member->experiences) as $experience )
                    <li><i class="fa-solid fa-arrow-right"></i> {{ $experience }}</li>
                @empty
                    no infos yet
                @endforelse
                </ol>
            </div>
            @endif
            @if ($member->approachs)
            <div class="member-section">
                <h3><i class="fa-solid fa-user-gear"></i> Approaches</h3>
                <ol>
                @forelse (json_decode($member->approachs) as $approach )
                    <li><i class="fa-solid fa-arrow-right"></i> {{ $approach }}</li>
                @empty
                    no infos yet
                @endforelse
                </ol>
            </div>
            @endif
        </div>
    </div>
</div>
<x-call-to-action></x-call-to-action>


@endsection
