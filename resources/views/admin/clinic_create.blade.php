@extends("layouts.admin")
@section('content')

<h1 class="section-title">Create a new Clinic !</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/clinics/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="create-clinic-form-header">

                <label for="file-upload" class="file-upload-box">
                    <input onchange="filesUpload()" id="file-upload" type="file" name="files[]" accept="image/*" multiple/>
                    Upload Pictures
                    <p> </p>
                </label>
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-regular fa-hospital"></i>
                <input type="text" name="name" placeholder="Name"  required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-map-location-dot"></i>
                <input type="text" name="address" placeholder="Address" required />
            </div>
            <div class="input-container">
                <i class="fa-solid fa-phone"></i>
                <input type="text" name="phone" placeholder="Phone number" required />
            </div>
            <div class="input-container">
                <i class="fa-solid fa-print"></i>
                <input type="text" name="fax" placeholder="Fax" required />
            </div>
            <div class="input-container">
                <i class="fa-solid fa-at"></i>
                <input type="email" name="email" placeholder="Email" required />
            </div>
            <div class="row-inputs">
                <div class="input-container">
                    <i class="fa-solid fa-map-pin"></i>
                    <input type="number" name="long" step="any" placeholder="Longtitude"  required/>
                </div>
                <div class="input-container">
                    <i class="fa-solid fa-map-pin"></i>
                    <input type="number" name="lat" step="any" placeholder="Latitude" required />
                </div>

            </div>
        </div>
        <div class="create-clinic-form-footer">
            <button type="reset"  class="secondary-btn">RESET<i class="fa-solid fa-rotate"></i></button>
            <button type="submit" class="primary-btn">CREATE<i class="fa-regular fa-square-plus"></i></button>
        </div>

    </form>

</div>
<script>
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
