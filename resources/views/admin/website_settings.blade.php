@extends("layouts.admin")
@section('content')

<h1 class="section-title">Website Configurations</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/website_settings/update/" method="post" enctype="multipart/form-data">
        @csrf
        <div class="create-clinic-form-body">
            <div class="input-container" style="margin-top: 3rem ">
                <i class="fa-solid fa-clock"></i>
                <input type="text" name="w_h" placeholder="Working Hours" value="{{ $config->working_hours }}" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-calendar-day"></i>
                <input type="text" name="w_d" placeholder="Working days" value="{{ $config->working_days }}" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-at"></i>
                <input type="email" name="email" placeholder="Contact email" value="{{ $config->email }}"  required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-phone"></i>
                <input type="tel" name="phone" placeholder="Contact phone" value="{{ $config->phone }}" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text" name="address" placeholder="Address" value="{{ $config->address }}" required/>
            </div>
            <div class="row-inputs">
                <div class="input-container">
                    <i class="fa-brands fa-facebook-f"></i>
                    <input type="text" name="facebook_link" placeholder="Facebook Link" value="{{ $config->facebook_link }}" required/>
                </div>
                <div class="input-container">
                    <i class="fa-brands fa-google-plus-g"></i>
                    <input type="text" name="google_link" placeholder="Google Link" value="{{ $config->google_link }}" required/>
                </div>
                <div class="input-container">
                    <i class="fa-brands fa-twitter"></i>
                    <input type="text" name="twitter_link" placeholder="Twitter Link" value="{{ $config->twitter_link }}" required/>
                </div>
            </div>
        </div>
        <div class="create-clinic-form-footer">
            <button type="reset" class="secondary-btn">RESET<i class="fa-solid fa-rotate"></i></button>
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>
        </div>

    </form>

</div>
@endsection
