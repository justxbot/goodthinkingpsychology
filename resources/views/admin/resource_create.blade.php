@extends('layouts.admin')
@section('content')

<h1 class="section-title">Create a Resource !</h1>

<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/resources/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="create-clinic-form-header">

                <label for="file-upload" class="file-upload-box">
                    <input onchange="filesUpload()" id="file-upload" type="file" name="picture" accept="image/*" required/>
                    Upload A Logo
                    <p> </p>
                </label>
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-brands fa-sourcetree"></i>
                <input type="text" name="name" placeholder="Name" required />
            </div>
            <div class="input-container">
                <i class="fa-solid fa-link"></i>
                <input type="text" name="website" placeholder="Website" required/>
            </div>


            <textarea class="admin-form-textarea" name="description" id="" cols="30" rows="10" maxlength="600" placeholder="Description..." required></textarea>


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
            paragraph.innerText = "file uploaded successfuly"
        }
        else{
            paragraph.innerText = ""
        }

    }

</script>



@endsection
