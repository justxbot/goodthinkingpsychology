<div class="slider  swiper-cube swiper-3d swiper-initialized swiper-horizontal swiper-watch-progress">
    <div class="swiper-wrapper" id="swiper-wrapper-a8c610fcb2afb3e8" aria-live="polite"
        style="cursor: grab; transform-origin: 50% 50% -150px; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(-270deg); --swiper-cube-translate-z: 0px; transition-duration: 0ms;">
        @foreach (App\Models\Therapy::all() as $therapy )
        <div class="swiper-slide"
            style="width: 300px; transform: rotateX(0deg) rotateY(0deg) translate3d(0px, 0px, 0px); transition-duration: 0ms;"
            role="group" >

            <div class="slider-text-container" style="background-image: url({{ asset('storage/'.$therapy->picture) }})">
                <div class="slider-text">
                    <h1 class="slider-title">{{ $therapy->name }}</h1>
                    <h2 class="slider-subtitle">{{ $therapy->abbr }}</h2>
                    <div class="slider-text-footer">
                        <button onclick="window.location.href = '/therapies/{{ $therapy->id }}'" class="learnmore-btn">LEARN MORE<i class="fa-solid fa-graduation-cap"></i></button>
                    </div>
                </div>
            </div>
            <div class="swiper-slide-shadow-left" style="opacity: 0; transition-duration: 0ms;"></div>
            <div class="swiper-slide-shadow-right" style="opacity: 1; transition-duration: 0ms;"></div>
        </div>
        @endforeach

        <div class="swiper-cube-shadow"
            style="height: 300px; transform: translate3d(0px, 170px, -150px) rotateX(90deg) rotateZ(0deg) scale(0.94);">
        </div>
    </div>
    <div class="swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal"><span
            class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span
            class="swiper-pagination-bullet"></span><span
            class="swiper-pagination-bullet swiper-pagination-bullet-active" aria-current="true"></span></div>
    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
</div>

<script>
    var slider = new Swiper(".slider", {
        autoplay: {
            delay: 2000,
        },
        effect: "cube",
        grabCursor: true,
        loop: true,

        cubeEffect: {
            shadow: true,
            slideShadows: true,
            shadowOffset: 20,
            shadowScale: 0.94,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>
