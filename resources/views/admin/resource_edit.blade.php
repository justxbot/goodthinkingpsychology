@extends('layouts.admin')
@section('content')

<h1 class="section-title">Editing {{ $resource->name }}</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/resources/{{ $resource->id }}/update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="create-clinic-form-header">

                <div class="coaching-edit-picture" style="background-image: url('{{ asset('/storage/'.$resource->logo) }}')">
                    <h1><i onclick="removeImage()" class="fa-solid fa-trash"></i></h1>
                    <input type="text" name="picture" accept="image/*" value="{{ $resource->logo }}" hidden/>
                </div>
            </div>


            <div class="create-clinic-form-body">
                <div class="input-container">
                    <i class="fa-brands fa-sourcetree"></i>
                    <input type="text" name="name" placeholder="Name" required value={{ $resource->name }} />
                </div>
                <div class="input-container">
                    <i class="fa-solid fa-link"></i>
                    <input type="text" name="website" placeholder="Website "value={{  $resource->website}} required>
                </div>


                <textarea class="admin-form-textarea" name="description" id="" cols="30" rows="10" maxlength="600" placeholder="Description..." required>{{ $resource->description }}</textarea>


            </div>
        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>

        </div>


    </form>

</div>
<script>
    function removeImage(){
       let header = document.querySelector('.create-clinic-form-header')
        event.target.remove();
        header.innerHTML = `
        <label for="file-upload" class="file-upload-box">
                    <input onchange="filesUpload()" id="file-upload" type="file" name="picture_file" accept="image/*" required/>
                    Upload A Picture
                    <p> </p>
                </label>
        `

    }

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
