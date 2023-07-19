@extends('layouts.admin')
@section('content')

<div class="appointments-container">

    <h1 class="section-title">Pending appointments</h1>
    @if (count($pendingAppointments)>0)
    <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-free-mode swiper-backface-hidden">
        <div class="swiper-wrapper" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">

            @foreach ($pendingAppointments as $appointment )
            <div class="appointment-tab swiper-slide">
                <div class="appointment-tab-body">
                    <div class="appointment-tab-name">
                        {{ $appointment->fname." ".$appointment->lname }}
                    </div>
                    <div class="appointment-tab-date">
                        <i class="fa-solid fa-calendar-week"></i> <span>{{ $appointment->date }}</span>
                    </div>
                    <div class="appointment-tab-time">
                        <i class="fa-solid fa-clock"></i> <span>{{ substr($appointment->time,0,5) }}</span>

                    </div>
                    <div class="appointment-tab-client-status">
                        @if ($appointment->hadAppointmentBefore )
                        <i class="fa-solid fa-user-clock"></i> <span>Had an appointment before</span>
                        @else
                            <i class="fa-solid fa-user-plus"></i> <span>NEW CLIENT!</span>
                        @endif
                    </div>
                    <div class="appointment-tab-client-details">
                        <a href="/admin/appointments?id={{ $appointment->id }}">More details <i class="fa-solid fa-circle-info"></i></a>
                    </div>
                </div>
                <div class="appointment-tab-footer">

                    <form action="/admin/appointments/status_update" method="POST" class="appointment-tab-accept">
                        @csrf
                        <input type="text" name="status" value="accepted" hidden>
                        <input type="numer" name="id" value="{{ $appointment->id }}" hidden>
                        <button type="submit"><i class="fa-solid fa-circle-check"></i></button>
                    </form>
                    <form action="/admin/appointments/status_update" method="POST" class="appointment-tab-reject">
                        @csrf
                        <input type="text" name="status" value="rejected" hidden>
                        <input type="numer"name="id" value="{{ $appointment->id }}" hidden>
                        <button type="submit"><i class="fa-solid fa-circle-xmark"></i></button>
                    </form>

                </div>

            </div>
            @endforeach


        </div>
        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 7"></span></div>
      <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

        <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
  @else
  <div class="empty-section">
    <h1 >
        No pending appointments yet
    </h1>
  </div>

    @endif

  <h1 class="section-title">Appointments table</h1>

  @livewire("appointments-filter")

</div>


@endsection
