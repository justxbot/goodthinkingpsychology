@extends('layouts.guest')

@section('content')

<x-banner title="Appointment" subtitle="Book a session" img="{{ asset('images/appointment.jpg') }}"></x-banner>

<div class="appointment-container">
    <h1>Kindly select a preferred date and time that is suitable for you to schedule an appointment.</h1>
    <div class="appointment-form-container">

        <form action="/request_appointment" method="post">
            @csrf
            <div class="contact-form-row">
                <div class="contact-form-input-container">
                    <input type="text" name="fname" placeholder="First Name" required>
                </div>
                <div class="contact-form-input-container">
                    <input type="text" name="lname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="contact-form-row">

                <div class="contact-form-input-container">
                    <input type="date" name="date" required >
                </div>
                <div class="contact-form-input-container">
                    <input type="time" name="time" required >
                </div>
            </div>
            <div class="contact-form-input-container">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="contact-form-input-container">
                <input type="tel" name="mobile" placeholder="Telephone" required>
            </div>
            <div class="form-footer">
                <button type="submit">Request <i class="fa-solid fa-calendar-days"></i></button>
            </div>
    </form>
    </div>

</div>
@endsection
