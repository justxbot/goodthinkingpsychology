<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
  />
  <link rel="icon" type="image/x-icon" href="{{ asset("images/favicon-16x16.png") }}"/>
  <script src="https://cdn.jsdelivr.net/npm/ol@v7.3.0/dist/ol.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.3.0/ol.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <title>GoodThinkingPsychology | Home</title>
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
@elseif(session("success"))
    <x-notification class="granted" text="{{  session()->get('success') }} " delay=5000/>
@endif
    {{-- <x-loader/> --}}
    <x-navbar/>

        @yield('content')

    <x-footer/>
</body>
</html>
