<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
  />
  <script src="https://cdn.jsdelivr.net/npm/ol@v7.3.0/dist/ol.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.3.0/ol.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <title>GoodThinkingPsychology | Login</title>
</head>
<body>
@if(session("error"))
    <x-notification class="rejected" text="{{ session()->get('error') }}" delay=5000/>
@endif
@if ($errors->any())
<x-notificationsContainer>
    @foreach ($errors->all() as $error )
        <x-notification class="rejected" :text="$error" delay=5000/>
    @endforeach
    </x-notificationsContainer>
@endif
    <div class="login-container">
        <form class="login-card" method="post" action="/__security_firewall_1/reset">
            @csrf
            <div class="login-card-header">
                <h1>RESET</h1>
            </div>
            <div class="login-card-body">
                <div class="input-container"><i class="fa-solid fa-lock"></i>  <input type="password" placeholder="New Password" name="password"/></div>
                <div class="input-container"><i class="fa-solid fa-lock"></i> <input type="password" placeholder="Confirm Password" name="c_password"/></div>
            </div>
            <div class="login-card-footer">
                <button type="submit">Reset password </button>
            </div>
        </form>


    </div>
</body>
</html>
