@extends("layouts.admin")
@section('content')

<h1 class="section-title">Editing {{ $clinic->name }} clinic</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/clinics/update/{{$clinic->id}}" method="post" enctype="multipart/form-data">
        <input class="modified_pictures" type="text" name="modified_pictures" hidden>
        @csrf

        <div class="create-clinic-form-header">
            @if (json_decode($clinic->pictures))
            <div class="swiper pictures-swiper  mySwiper swiper-initialized swiper-horizontal swiper-free-mode swiper-backface-hidden">
                <div class="swiper-wrapper" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                    @foreach ( json_decode($clinic->pictures) as $picture )
                        <div class="swiper-slide" name="{{$picture}}"style="background-image: url('{{ asset("storage/uploads/".$picture) }}')">
                            <h1><i onclick="removeImage()" name="{{ $picture }}" class="fa-solid fa-trash"></i></h1>
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
            @endif

                <label for="file-upload" class="file-upload-box">
                    <input onchange="filesUpload()" id="file-upload" type="file" name="files[]" accept="image/*" multiple/>
                    Upload More Pictures
                    <p> </p>
                </label>
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-regular fa-hospital"></i>
                <input type="text" name="name" placeholder="Name" value="{{ $clinic->name }}" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-map-location-dot"></i>
                <input type="text" name="address" placeholder="Address" value="{{ $clinic->address }}" required />
            </div>
            <div class="input-container">
                <i class="fa-solid fa-phone"></i>
                <input type="text" name="phone" placeholder="Phone number" value="{{ $clinic->phone }}" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-print"></i>
                <input type="text" name="fax" placeholder="Fax" value="{{ $clinic->fax }}"  required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-at"></i>
                <input type="email" name="email" placeholder="Email" value="{{ $clinic->email }}"  required/>
            </div>
            <div class="row-inputs">
                <div class="input-container">
                    <i class="fa-solid fa-map-pin"></i>
                    <input type="number" name="long" placeholder="Longtitude" step="any" value="{{ $clinic->long }}" required/>
                </div>
                <div class="input-container">
                    <i class="fa-solid fa-map-pin"></i>
                    <input type="number" name="lat" placeholder="Latitude" step="any" value="{{ $clinic->lat }}" required/>
                </div>

            </div>
        </div>
        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>
        </div>

    </form>

</div>
<script>
    let picturesSwiper = document.querySelector('.pictures-swiper')
    let editedPicturesInput = document.querySelector(".modified_pictures")
    let tabs = document.querySelectorAll(".swiper-slide")
    let values = []
    if(tabs.length>1){
        tabs.forEach(tab => {
            values.push(tab.getAttribute("name"));
            editedPicturesInput.value = values;
        });
    }
    else{
        editedPicturesInput.value = "empty";
        picturesSwiper.remove();
    }

    function removeImage(){

        let slides = document.querySelectorAll(".swiper-slide")
        slides.forEach(slide => {
            if(slide.getAttribute("name")==event.target.getAttribute("name")){
                slide.remove()
            }
        });
        tabs = document.querySelectorAll(".swiper-slide")
        values = []
        if(tabs.length>0){
            tabs.forEach(tab => {
                values.push(tab.getAttribute("name"));
                editedPicturesInput.value = values;
            });
        }
        else{
            editedPicturesInput.value = "empty"
            picturesSwiper.remove();

        }

    console.log(editedPicturesInput.value);
    console.log(tabs);


    }
    function filesUpload(){
        let input = document.querySelector("#file-upload");
        let paragraph =  document.querySelector(".file-upload-box>p");
        if(input.files.length==1){
            paragraph.innerText = "1 Uploaded file"
        }
        else if (input.files.length>1){

            paragraph.innerText = input.files.length+" Uploaded files"

        }
        else{
            paragraph.innerText = " "
        }

    }
</script>

@endsection
