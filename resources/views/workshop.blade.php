@extends('layouts.guest')

@section('content')
<div class="workshop-container" style="background-image:url('{{asset('/storage/'.$workshop->picture)  }}')">
    <div class="workshop-wrapper">

        <div class="workshop-content">
            <div class="workshop-content-header">
                <h1>{{ $workshop->name }}</h1>
                <h2>{{ $workshop->period }}</h2>
            </div>
            <h3 class="workshop-content-slogan"><i class="fa-solid fa-quote-left"></i>{{ $workshop->slogan }}<i class="fa-solid fa-quote-right"></i></h3>
            <div class="workshop-content-body">
                <h1><i class="fa-solid fa-circle-info"></i> Description :</h1>
                <p>{{ $workshop->description }}</p>
            </div>
            <div class="workshop-content-footer">
                <h1><i class="fa-solid fa-user-gear"></i> Skills you will conquer :</h1>
                <ul>
                    @foreach (json_decode($workshop->skills) as $skills )
                    <li><i class="fa-solid fa-arrow-right"></i> {{ $skills }}</li>
                    @endforeach
                </ul>
                <h3><i class="fa-solid fa-graduation-cap"></i> Classes are held <span>{{ $workshop->timetable }}</span></h3>

            </div>

        </div>
        <div class="workshop-form-container">
            <form action="/send_message" method="post">
                @csrf


                    <div class="workshop-form-row">
                            <div class="workshop-form-input-container">
                                <input type="text" name="fname" placeholder="First Name" required/>
                            </div>

                            <div class="workshop-form-input-container">
                                <input type="text" name="lname" placeholder="Last Name" required/>
                            </div>
                    </div>
                    <div class="workshop-form-row">
                            <div class="workshop-form-input-container">
                                <input type="text" name="email" placeholder="Email" required/>
                            </div>

                            <div class="workshop-form-input-container">
                                <input type="text" name="mobile" placeholder="Phone Number" required/>
                            </div>
                    </div>
                    <div class="workshop-form-row">
                        <div class="workshop-form-input-container">
                            <input type="text" placeholder="Subject" name="subject" value="About {{ $workshop->name }} Course." required/>
                        </div>
                    </div>
                    <div class="workshop-form-input-container">
                        <textarea  placeholder="Message..." name="message" required></textarea>
                    </div>
                    <div class="workshop-form-footer">
                        <button type="submit">SEND <i class="fa-solid fa-paper-plane"></i></button>
                    </div>
            </form>
        </div>
    </div>

</div>



@endsection
