@extends('layouts.guest')
@section('content')


<div class="about-us-container">
    <div class="swiper about-swiper mySwiper swiper-coverflow swiper-3d swiper-initialized swiper-horizontal swiper-watch-progress">
        <div class="swiper-wrapper" id="swiper-wrapper-374e31e98d7b66e8" aria-live="polite" style="cursor: grab; transition-duration: 0ms; transform: translate3d(428.5px, 0px, 0px);">
          @foreach ($clinics as $clinic )
          @if (json_decode($clinic->pictures))


            @foreach (json_decode($clinic->pictures) as $picture)

                <div style="background-image: url({{ asset("/storage/uploads/$picture") }})" class="swiper-slide swiper-slide-visible swiper-slide-active" role="group" aria-label="1 / 9" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) scale(1); z-index: 1;">
                <div class="swiper-slide-shadow-left" style="opacity: 0; transition-duration: 0ms;"></div><div class="swiper-slide-shadow-right" style="opacity: 0; transition-duration: 0ms;"></div>
              </div>
            @endforeach
            @endif
          @endforeach



        </div>
        <div class="swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" aria-current="true"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
      <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

      <script>
        var swiper = new Swiper(".about-swiper", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          loop:true,
          autoplay:{
            delay:2000
        },
          coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
          },
          pagination: {
            el: ".swiper-pagination",
          },
        });
      </script>


    {{-- clinics --}}
    <h1 class="section-title" >Our Clinics</h1>
      <div class="clinics-container">
        @foreach ($clinics as $clinic )
<div class="clinic-content">

    <h1 class="clinic-name"><i class="fa-regular fa-hospital"></i> {{ $clinic->name }} - Good Thinking Psychology</h1>

    <div class="clinic-map" id="map-{{$clinic->id}}">

    </div>

    <div class="clinics-footer">
        <h3><i class="fa-solid fa-location-arrow"></i> {{ $clinic->address }}</h3>
        <h3 onclick="window.open('tel:{{ $clinic->phone }}')" class="clinic-phone"><i class="fa-solid fa-phone"></i> {{ $clinic->phone }} <span>hey! you can just click it to call  &#128515</span></h3>
        <h3 ><i class="fa-solid fa-print"></i> {{ $clinic->fax }}</h3>
        <h3 onclick="window.open('mailto:{{ $clinic->email }}')" class="clinic-email"><i class="fa-solid fa-at"></i> {{ $clinic->email }} <span>hey! you can just click it to email  &#128515</span></h3>
    </div>



</div>














<script>

    function init(){
    // Create a new map instance
    var map{{$clinic->id}} = new ol.Map({
        target:'{{"map-".$clinic->id }}',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM() // Use OpenStreetMap as the base layer
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([ {{$clinic->long}}, {{$clinic->lat}}]), // Set the initial center of the map (longitude, latitude)
            zoom: 15 // Set the initial zoom level
        })
    });

    // Create a new marker feature
    var marker{{$clinic->id}} = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([ {{$clinic->long}}, {{$clinic->lat}}])) // Set the coordinates of the marker (longitude, latitude)
    });

    // Create a style for the marker
    var markerStyle = new ol.style.Style({
        image: new ol.style.Icon({
            src: "{{ asset('images/pin.png') }}"    // URL to the marker icon
        })
    });

    // Apply the marker style to the marker feature
    marker{{$clinic->id }}.setStyle(markerStyle);

    // Create a vector layer to add the marker to
    var vectorLayer = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: [marker{{$clinic->id }}] // Add the marker feature to the source
        })
    });


    // Add the vector layer to the map
    map{{$clinic->id}}.addLayer(vectorLayer);
    }
    init()
    </script>

@endforeach


</div>


  {{-- Rates and debates --}}
<h1 class="section-title" >Rates & Debates</h1>

<div class="rates-debates-container" id="r&d">
    @foreach ($rds as $rd)
    <div class="rd-card">
        <div class="rd-header">
            <h3 class="rd-name"> {{ $rd->name }}</h3>
            <h1 class="rd-fee">${{ $rd->fee }}</h1>
            <p class="rd-step">/ Session</p>
            <a class="rd-button" href="/appointment_request">Book now</a>
        </div>
        <div class="rd-body">
            <ul>
                <li><i class="fa-solid fa-check"></i> Medicare rebate of ${{ $rd->rebate }}.</li>
                @if($rd->gp)
                <li><i class="fa-solid fa-check"></i> Available with GP referral.</li>
                @endif
                <li><i class="fa-solid fa-check"></i> $20 fee applies for afterhours sessions.</li>
                @if ($rd->benifits)
                @foreach ( json_decode($rd->benifits) as $benifit )
                <li><i class="fa-solid fa-check"></i> {{ $benifit }}</li>
                @endforeach
                @endif

            </ul>
        </div>
    </div>

    @endforeach

</div>


      {{-- How we work --}}

      <h1 class="section-title">
        How we work?
    </h1>
    <div class="hww-container">
        <div class="swiper hww-swiper mySwiper swiper-initialized swiper-horizontal swiper-backface-hidden">
            <div class="swiper-wrapper" id="swiper-wrapper-30e97fe6349e1ad6" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
              <div class="swiper-slide" style="background-image: url('{{ asset('images/sectionbackground1.png') }}');">
                <div class="hww-swiper-text">
                    <h1>Your first session</h1>
                    <p>
                        Your first session is a chance for us to get to know you, and understand what has brought you to us. <br/><br/>
We will ask you questions, and listen as you tell us what is troubling you. Towards the end of the session, we may set some goals for our time together so that we can start creating a plan for positive change. <br/><br/>
Our sessions run for approximately 50 minutes.
                    </p>
                </div>
                <div class="hww-swiper-ill">
                    <img src="{{ asset("images/hww1.svg") }}" alt="">
                </div>
            </div>
            <div class="swiper-slide"  style="background-image: url('{{ asset('images/sectionbackground3.png') }}');">
                <div class="hww-swiper-text">
                    <h1>Confidentiality</h1>
                    <p>
                        Psychologists are legally required to keep everything discussed in therapy completely confidential. <br/><br/>

We will only disclose what you discuss if:</p>
                        <ul>
                            <li><i class="fa-solid fa-check"></i> You give us permission</li>
                            <li><i class="fa-solid fa-check"></i> We suspect you may cause harm to yourself or someone else</li>
                            <li><i class="fa-solid fa-check"></i> There is child abuse</li>
                            <li><i class="fa-solid fa-check"></i> A court subpoenas your file</li>
                            <li><i class="fa-solid fa-check"></i> The psychologist is subpoenaed to give evidence in court</li>
                        </ul>
                        <p>Rest assured that we take your privacy very seriously, and will keep all of your personal information safe.
                    </p>
                </div>
                <div class="hww-swiper-ill">
                    <img src="{{ asset("images/hww2.svg") }}" alt="">
                </div>
            </div>
            <div class="swiper-slide " style="background-image: url('{{ asset('images/sectionbackground1.png') }}');" >
                <div class="hww-swiper-text">
                    <h1>Our goal</h1>
                    <p>
                        Some people enjoy attending therapy on a regular basis, and feel it helps them better approach issues that present in daily life. <br/><br/>

                        Others use therapy as a means to a positive end - working with a professional to set goals, create practical plans, and create lasting change.<br/><br/>

                        We shape our approach to suit you, drawing on a range of proven therapies to find the most appropriate solution.<br/><br/>

                        Keep in mind that a doctor's referral for a psychologist may prescribe the number of recommended sessions. This means that you will only receive Medicare rebates for those sessions.<br/><br/>
                    </p>
                </div>
                <div class="hww-swiper-ill">
                    <img src="{{ asset("images/hww3.svg") }}" alt="">
                </div>
            </div>
            <div class="swiper-slide " style="background-image: url('{{ asset('images/sectionbackground3.png') }}');" >
                <div class="hww-swiper-text">
                    <h1>Your psychologist</h1>
                    <p>
                        You can choose which of our psychologists you want to see, or we will pair you with the practitioner we feel best suits your circumstances.<br/><br/>

                        Please note we do not currently have a psychiatrist at Good Thinking Clinical Psychology, so we cannot prescribe medication for treatment.<br/><br/>

                        Our practice has Clinical Psychologists, General Psychologists and counsellors.
                    </p>
                </div>
                <div class="hww-swiper-ill">
                    <img src="{{ asset("images/hww4.svg") }}" alt="">
                </div>
            </div>
            <div class="swiper-slide " style="background-image: url('{{ asset('images/sectionbackground1.png') }}');">
                <div class="hww-swiper-text">
                    <h1>Referrals</h1>
                    <p>
                        To be eligible for the Medicare rebate, you will need to have a referral from a GP.<br/><br/> Simply visit your GP, tell them how you are feeling, and ask about a Mental Health Care Plan and referral for Good Thinking Clinical Psychology.<br/><br/>

                        You can also see one of our psychologists without a referral, but unfortunately you cannot claim the Medicare rebate. <br/><br/>For more info about our session prices see <a href="/about-us#r&d">Rates and rebates</a>.
                    </p>
                </div>
                <div class="hww-swiper-ill">
                    <img src="{{ asset("images/hww5.svg") }}" alt="">
                </div>
            </div>

            </div>
            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-30e97fe6349e1ad6" aria-disabled="false"></div>
            <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-30e97fe6349e1ad6" aria-disabled="true"></div>
            <div class="swiper-pagination swiper-pagination-progressbar swiper-pagination-horizontal"><span class="swiper-pagination-progressbar-fill" style="transform: translate3d(0px, 0px, 0px) scaleX(0.111111) scaleY(1); transition-duration: 300ms;"></span></div>
          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </div>

    <script>
        var hwwSwiper = new Swiper(".hww-swiper", {
          pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        });
      </script>
</div>


@endsection
