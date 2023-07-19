@extends('layouts.admin')
@section('content')

<h1 class="section-title">Editing {{ $workshop->name }}  Workshop </h1>

<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/workshops/{{ $workshop->id }}/update" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="skills" class="skills" required hidden/>

        <div class="create-clinic-form-header">

            <div class="coaching-edit-picture" style="background-image: url('{{ asset('/storage/'.$workshop->picture) }}')">
                <h1><i onclick="removeImage()" class="fa-solid fa-trash"></i></h1>
                <input type="text" name="picture" accept="image/*" value="{{ $workshop->picture }}" hidden/>
            </div>
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-solid fa-prescription-bottle-medical"></i>
                <input type="text" name="name" placeholder="Name" value="{{ $workshop->name }}" required />
            </div>
            <div class="input-container">
                <i class="fa-solid fa-quote-left"></i>
                <input type="text" name="slogan" placeholder="Slogan" value="{{ $workshop->slogan }}" required />
            </div>
            <div class="input-container">
                <i class="fa-solid fa-calendar"></i>
                <input type="text" name="period" placeholder="Period | Example: 4 Weeks Course" value="{{ $workshop->period }}" required />
            </div>
            <div class="input-container">
                <i class="fa-solid fa-clock"></i>
                <input type="text" name="timetable" placeholder="Timetable | Example: Every Sunday" value="{{ $workshop->timetable }}" required />
            </div>
            <div class="input-container">

                <i class="fa-solid fa-chalkboard-user"></i>
                <input type="text" placeholder="Add a skill to be learned" class="skillser questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('skillser','skills-container','skills')"></i>

            </div>
            <div class="skills-container questions-container">
                @foreach (json_decode($workshop->skills) as $skill )
                    <h3>{{ $skill }}<i onclick="promptRemove('skills','skills-container')" class='fa-solid fa-trash'></i></h3>
                @endforeach
            </div>

            <textarea class="admin-form-textarea" name="description" id="" cols="30" rows="10" maxlength="600" placeholder="Description...">{{ $workshop->description }}</textarea>


        </div>
        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>
        </div>


    </form>

</div>
<script>
    //init prompts
    promptUpdate("skills","skills-container")
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
