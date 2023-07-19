<nav>
    <div class="nav-center-mobile" onclick="window.location.href = '/'">
        <img src="{{ asset('images/logo-colored.png') }}" alt="logo">
    </div>
    <div class="nav-right-mobile">
        <div onclick="hamburgerHandler()" class="hamburger-tab not-active">
            <span class="hamburger-tab-bar"></span>
            <span class="hamburger-tab-bar"></span>
            <span class="hamburger-tab-bar"></span>
        </div>
        <script>
            function hamburgerHandler() {
                var hamburger = document.querySelector('.hamburger-tab');
                var hamburger_menu = document.querySelector('.hamburger-menu-tab');
                if(hamburger.className == "hamburger-tab not-active"){
                    hamburger.className="hamburger-tab active"
                    hamburger_menu.style.left = "50%"
                }
                else{
                    hamburger.className = "hamburger-tab not-active"
                    hamburger_menu.style.left = "100%"
                }
            };
        </script>
    </div>

        <div class="hamburger-menu-tab" style="left: 100%;">
            <a class="nav-tab" href="/appointment_request"><i class="fa-solid fa-circle"></i>APPOINTMENT</a>
            <a class="nav-tab " href="/therapies"><i class="fa-solid fa-circle"></i> THERAPIES</a>
            <a class="nav-tab" href="/services"><i class="fa-solid fa-circle"></i>SERVICES</a>
            <a class="nav-tab" href="/our-team"><i class="fa-solid fa-circle"></i>OUR TEAM</a>
            <a class="nav-tab" href="/workshops"><i class="fa-solid fa-circle"></i>ACTIVITIES & WORKSHOPS</a>
            <a class="nav-tab" href="/resources"><i class="fa-solid fa-circle"></i>RESOURCES</a>
            <a class="nav-tab" href="/about-us"><i class="fa-solid fa-circle"></i>ABOUT US</a>
            <a class="nav-tab" href="/contact-us"><i class="fa-solid fa-circle"></i>CONTACT US</a>

        </div>


    <div class="nav-left">
        <a class="nav-tab" href="/appointment_request"><i class="fa-solid fa-circle"></i>APPOINTMENT</a>
        <div class="dropdown-container" >
            <a class="nav-tab " href="/therapies"><i class="fa-solid fa-circle"></i> THERAPIES</a>
            <div class="dropdown-menu"  >
            @foreach ( (App\Models\Therapy::all()) as $therapy )
            <a href="/therapies/{{$therapy->id}}"> {{ $therapy->name }} ({{ $therapy->abbr }}) </a>

            @endforeach

        </div>
    </div>
    <div class="dropdown-container" >
        <a class="nav-tab" href="/services"><i class="fa-solid fa-circle"></i>SERVICES</a>
        <div class="dropdown-menu"  >
        @foreach ( (App\Models\Service::all()) as $service )
            <a href="/services/{{$service->id}}"> {{ $service->name }} </a>
        @endforeach

        <a href="/coachings"> Coachings </a>

    </div>
</div>
        <a class="nav-tab" href="/our-team"><i class="fa-solid fa-circle"></i>OUR TEAM</a>
    </div>
    <div class="nav-center" onclick="window.location.href = '/'">
        <img src="{{ asset('images/logo-colored.png') }}" alt="logo">
    </div>
    <div class="nav-right">
        <a class="nav-tab" href="/workshops"><i class="fa-solid fa-circle"></i>ACTIVITIES & WORKSHOPS</a>
        <a class="nav-tab" href="/resources"><i class="fa-solid fa-circle"></i>RESOURCES</a>
        <a class="nav-tab" href="/about-us"><i class="fa-solid fa-circle"></i>ABOUT US</a>
        <a class="nav-tab" href="/contact-us"><i class="fa-solid fa-circle"></i>CONTACT US</a>
    </div>
</nav>


