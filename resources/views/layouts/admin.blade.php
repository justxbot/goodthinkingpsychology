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
  <link rel="icon" type="image/x-icon" href="{{ asset("images/favicon-16x16.png") }}"/>

  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <title>GoodThinkingPsychology | Home</title>
    @livewireStyles
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

    <div class="layout-container">
        <div class="sidebar-arrow" onclick="sidebarHandler()">
            <span>MENU</span>
            <i class="fa-solid fa-arrow-right"></i>
        </div>
        <script>
            function sidebarHandler(){

                let sidebar = document.querySelector(".layout-left")
                let sidebarArrow = document.querySelector(".layout-container>div:nth-child(1)")
                if(sidebarArrow.className == "sidebar-arrow"){
                    sidebarArrow.className = "sidebar-arrow-active"
                    sidebar.style.left = "0%"
                }
                else{
                    sidebarArrow.className = "sidebar-arrow"
                    sidebar.style.left = "-100%"

                }


            }
        </script>
        <div class="layout-left">
            <x-admin-sidebar></x-admin-sidebar>
        </div>
        <div class="layout-right">
            <x-admin-navbar></x-admin-navbar>
            <div class="layout-content">
                @yield("content")
            </div>

        </div>

    </div>
    @livewireScripts
</body>
</html>
