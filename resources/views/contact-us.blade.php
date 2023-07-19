@extends("layouts.guest")
@section('content')

<x-banner title="Contact us" subtitle="We are here to help" img="{{ asset('images/contactus.jpg') }}"/>
<div class="contact-us-container">
<h1 class="section-title">Contact infos</h1>
<div class="infos-section">
    <div class="infos-tab">
        <h1>Contact infos</h1>
        <p class="interactive-text" onclick="window.open('mailto:{{ $configs->email }}')">{{ $configs->email }}</p>
        <p class="interactive-text" onclick="window.open('tel:{{ $configs->phone }}')">{{ $configs->phone }}</p>
    </div>
    <div class="infos-tab">
        <h1>Working Hours</h1>
       <p> {{ $configs->working_hours }}</p>
    </div>
    <div class="infos-tab">
        <h1>Working Days</h1>
        <p>{{ $configs->working_days }}</p>
    </div>
</div>

<div class="contact-form-section">
    <h1>Get in Touch</h1>

    <div class="workshop-form-container">
        <form action="/send_message" method="post">
            @csrf
                <div class="workshop-form-row">
                        <div class="workshop-form-input-container">
                            <input name="fname" type="text" placeholder="First Name" required/>
                        </div>

                        <div class="workshop-form-input-container">
                            <input name="lname" type="text" placeholder="Last Name" required/>
                        </div>
                </div>
                <div class="workshop-form-row">
                        <div class="workshop-form-input-container">
                            <input name="email" type="text" placeholder="Email" required/>
                        </div>

                        <div class="workshop-form-input-container">
                            <input name="mobile" type="text" placeholder="Phone Number" required/>
                        </div>
                </div>
                <div class="workshop-form-row">
                    <div class="workshop-form-input-container">
                        <input name="subject" type="text" placeholder="Subject" required />
                    </div>
                </div>
                <div class="workshop-form-input-container">
                    <textarea name="message"  placeholder="Message..." required></textarea>
                </div>
                <div class="workshop-form-footer">
                    <button type="submit">SEND <i class="fa-solid fa-paper-plane"></i></button>
                </div>
        </form>
    </div>
</div>




</div>
@endsection
