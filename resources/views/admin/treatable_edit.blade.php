@extends('layouts.admin')
@section('content')

<h1 class="section-title">Editing {{ $treatable->name }} Treatable </h1>

<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/treatables/{{ $treatable->id }}/update" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="causes" class="causes"  hidden required/>
        <input type="text" name="symptoms" class="symptoms"  hidden required/>

        <div class="create-clinic-form-header">

            <div class="coaching-edit-picture" style="background-image: url('{{ asset('/storage/'.$treatable->picture) }}')">
                <h1><i onclick="removeImage()" class="fa-solid fa-trash"></i></h1>
                <input type="text" name="picture" accept="image/*" value="{{ $treatable->picture }}" hidden/>
            </div>
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-solid fa-prescription-bottle-medical"></i>
                <input type="text" name="name" placeholder="Name" value="{{ $treatable->name }}" required />
            </div>
            <div class="input-container">

                <i class="fa-solid fa-person-circle-question"></i>
                <input type="text" placeholder="Causes" class="causer questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('causer','causes-container','causes')"></i>

            </div>
            <div class="causes-container questions-container">
                @foreach (json_decode($treatable->causes) as $cause )
                    <h3>{{ $cause }}<i onclick="promptRemove('causes','causes-container')" class='fa-solid fa-trash'></i></h3>
                @endforeach
            </div>
            <div class="input-container">

                <i class="fa-solid fa-person-circle-exclamation"></i>
                <input type="text" placeholder="Symptoms" class="symptomser questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('symptomser','symptoms-container','symptoms')"></i>

            </div>
            <div class="symptoms-container questions-container">
                @foreach (json_decode($treatable->symptoms) as $symptom )
                <h3>{{ $symptom }}<i onclick="promptRemove('symptoms','symptoms-container')" class='fa-solid fa-trash'></i></h3>
            @endforeach
            </div>

            <textarea class="admin-form-textarea" name="description" id="" cols="30" rows="10" maxlength="600" placeholder="Description...">{{ $treatable->description }}</textarea>


        </div>
        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>
        </div>


    </form>

</div>
<script>
    //init prompts
    promptUpdate("causes","causes-container")
    promptUpdate("symptoms","symptoms-container")

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
    function promptUpdate($inputName,$containerClass){
        let input = document.querySelector("input[name='"+$inputName+"']");
        let promptsHolder = document.querySelectorAll("."+$containerClass+">h3")
        let prompts = []
        promptsHolder.forEach(elm=>{

            prompts.push(elm.innerText)
        })
        input.value = prompts

    }
    function promptAdd($inputClass,$containerClass,$inputName){
        let input = document.querySelector("."+$inputClass)
        let container = document.querySelector("."+$containerClass);
        console.log(container);
        let h3 = document.createElement('h3')
        h3.innerHTML = input.value+`<i onclick="promptRemove('`+$inputName+`','`+$containerClass+`')" class='fa-solid fa-trash'></i>`
        container.append(h3)
        promptUpdate($inputName,$containerClass);
        input.value = ''
    }
    function promptRemove($inputName,$containerClass){

        event.target.parentNode.remove();
        promptUpdate($inputName,$containerClass);

    }

</script>



@endsection
