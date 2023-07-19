@extends('layouts.guest')
@section('content')
<style>
    body{
        overflow-x: hidden
    }
</style>


<!-- Slider main container -->
<div class="swiper main-swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide" style="background-image:url('{{ asset('images/slide1.jpg') }}')">
        <div class="swiper-slide-text-container">
            <div class="swiper-slide-text">
                <div class="swiper-slide-text-header"><i class="fa-solid fa-grip-lines"></i><h4>clinical psychology</h4></div>
                <div class="swiper-slide-text-body"><h1>Discover the Power Within, Rewrite Your Story</h1></div>
                <div class="swiper-slide-text-footer"><button onclick="window.location.href ='/appointment_request' ">APPOINTMENT</button><button onclick="window.location.href ='/our-team' ">MEET THE TEAM</button></div>
            </div>
        </div>
    </div>
      <div class="swiper-slide"  style="background-image:url('{{ asset('images/slide2.jpg') }}')">
        <div class="swiper-slide-text-container">
            <div class="swiper-slide-text">
                <div class="swiper-slide-text-header"><i class="fa-solid fa-grip-lines"></i><h4>clinical psychology</h4></div>
                <div class="swiper-slide-text-body"><h1>Embrace Your Inner Strength, Find Peace Within</h1></div>
                <div class="swiper-slide-text-footer"><button onclick="window.location.href ='/appointment_request' ">APPOINTMENT</button><button onclick="window.location.href ='/our-team' ">MEET THE TEAM</button></div>
            </div>
        </div>
    </div>
      <div class="swiper-slide" style="background-image:url('{{ asset('images/slide3.jpg') }}')">
        <div class="swiper-slide-text-container">
            <div class="swiper-slide-text">
                <div class="swiper-slide-text-header"><i class="fa-solid fa-grip-lines"></i><h4>clinical psychology</h4></div>
                <div class="swiper-slide-text-body"><h1>Unleash Your Potential, Rewrite Your Narrative</h1></div>
                <div class="swiper-slide-text-footer"><button onclick="window.location.href ='/appointment_request' ">APPOINTMENT</button><button onclick="window.location.href ='/our-team' ">MEET THE TEAM</button></div>
            </div>
        </div>
    </div>
    </div>
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
<div class="quote-banner">
    <div class="quote-banner-text">
        <div class="quote-text"><i class="fa-solid fa-quote-left"></i>I cannot teach anybody anything. I can only make them think.<i class="fa-solid fa-quote-right"></i></div>
        <div class="quote-author">SOCRATES</div>
    </div>

</div>
<h1 class="section-title">Services</h1>
<div class="services">
    @foreach ($services as $service )

    <div onclick="window.location.href = '/services/{{$service->id }}'" class="service" style="background-image: url({{ asset('storage/'.$service->picture) }})">
        <div class="service-text-container">
            <h1>{{ $service->name }}</h1>
        </div>
    </div>
    @endforeach


</div>
<h1 class="section-title">Contact us</h1>
<div class="contact-section">
    <div class="contact-section-text-container">
        <div class="contact-text-header">
            <i class="fa-solid fa-grip-lines"></i>
            <h4>clinical psychology</h4>
        </div>
        <div class="contact-text-body">
            <h1>Take the First Step, Reach Out Today and Start Your Journey to Healing and Empowerment</h1>
        </div>
    </div>
    <div class="contact-form-container">
        <form action="/send_message" method="post">
            @csrf
            <div class="contact-form-row">
                <div class="contact-form-input-container">
                    <input type="text" name="fname" placeholder="First Name" required/>
                </div>
                <div class="contact-form-input-container">
                    <input type="text" name="lname" placeholder="Last Name" required/>
                </div>
            </div>
            <div class="contact-form-row">
                <div class="contact-form-input-container">
                    <input type="tel" name="mobile" placeholder="Mobile" required/>
                </div>
                <div class="contact-form-input-container">
                    <input type="email" name="email" placeholder="Email" required/>
                </div>
            </div>
            <div class="contact-form-input-container">
                <input type="text" name="subject" placeholder="Subject" required/>
            </div>

            <textarea class="contact-form-textarea" name="message" id="" cols="30" rows="10"placeholder="Message..." required></textarea>
            <div class="form-footer">
                <button type="submit">Send<i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </form>
    </div>
</div>
<h1 class="section-title">Therapies</h1>
<div class="therapies-section">
    <x-slider></x-slider>
    <div class="contact-section-text-container" >
        <div class="contact-text-header">
            <i class="fa-solid fa-grip-lines"></i>
            <h4>clinical psychology</h4>
        </div>
        <div class="contact-text-body">
            <h1>When we're self-accepting, we're in better spirits, more flexible and more resilient</h1>
        </div>
    </div>
</div>

<h1 class="section-title">Book a session</h1>

<x-call-to-action></x-call-to-action>
</div>









<script>
    let services = document.querySelectorAll('.service')
    services.forEach(el => {

        const height = el.clientHeight
        const width = el.clientWidth

/*
  * Add a listener for mousemove event
  * Which will trigger function 'handleMove'
  * On mousemove
  */
el.addEventListener('mousemove', handleMove)

/* Define function a */
function handleMove(e) {
  /*
    * Get position of mouse cursor
    * With respect to the element
    * On mouseover
    */
  /* Store the x position */
  const xVal = e.layerX
  /* Store the y position */
  const yVal = e.layerY

  /*
    * Calculate rotation valuee along the Y-axis
    * Here the multiplier 20 is to
    * Control the rotation
    * You can change the value and see the results
    */
  const yRotation = 10 * ((xVal - width / 2) / width)

  /* Calculate the rotation along the X-axis */
  const xRotation = -10 * ((yVal - height / 2) / height)

  /* Generate string for CSS transform property */
  const string = 'perspective(500px)  rotateX(' + xRotation + 'deg) rotateY(' + yRotation + 'deg)'

  /* Apply the calculated transformation */
  el.style.transform = string
}

/* Add listener for mouseout event, remove the rotation */
el.addEventListener('mouseout', function() {
  el.style.transform = 'perspective(500px) scale(1) rotateX(0) rotateY(0)'
})


    });
</script>
  <script>
    const swiper1 = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,


  autoplay: {
   delay: 5000,
 },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },


});
  </script>
@endsection
