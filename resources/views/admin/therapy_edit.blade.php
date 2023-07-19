@extends('layouts.admin')
@section('content')

<h1 class="section-title">Editing {{ $therapy->name }} </h1>

<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/therapies/{{ $therapy->id }}/update" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="treatables" id="questions"  hidden/>
        <input type="text" name="team_members_p" class="treatables-input" required hidden/>

        <div class="create-clinic-form-header">

            <div class="coaching-edit-picture" style="background-image: url('{{ asset('/storage/'.$therapy->picture) }}')">
                <h1><i onclick="removeImage()" class="fa-solid fa-trash"></i></h1>
                <input type="text" name="picture" accept="image/*" value="{{ $therapy->picture }}" hidden/>
            </div>
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <input type="text" name="name" placeholder="Name"  value="{{ $therapy->name }}" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-clover"></i>
                <input type="text" name="abbr" placeholder="Abbreviation" required value="{{ $therapy->abbr }}"/>
            </div>
            <div class="input-container">

                <i class="fa-solid fa-suitcase-medical"></i>
                <input type="text" placeholder="Treatables" class="questioner" />
                <i class="fa-solid fa-plus add-question" onclick="questionAdd()"></i>

            </div>
            <div class="questions-container">
                @foreach (json_decode($therapy->treatables) as $treatable )
                <h3> {{ $treatable }}<i onclick="questionRemove()" class="fa-solid fa-trash"></i></h3>
                @endforeach
            </div>
            <div style="color: var(--text)">
                Select 1 or multiple team members
            </div>
            <div class="treatables-container">
                @foreach ($team_members as $team_member )
                {{ $isTrue = false }}
                @foreach ($therapyPracticings as $therapyPracticing )
                    @if($team_member->id == $therapyPracticing->team_member_id)
                    @php $isTrue = true @endphp
                        <span class="selected" id="{{ $team_member->id }}" onclick="treatableUpdate()"> {{ $team_member->fname." ".$team_member->lname  }}</span>
                    @endif
                @endforeach
                @if(!$isTrue)
                    <span class="unselected" id="{{ $team_member->id }}" onclick="treatableUpdate()"> {{ $team_member->fname." ".$team_member->lname   }}</span>
                @endif
            @endforeach


            </div>
            <textarea class="admin-form-textarea" name="description" id="" cols="30" rows="10" maxlength="600" placeholder="Description..." >{{ $therapy->description }}</textarea>


        </div>
        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>
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
function questionUpdate(){

    let input = document.querySelector("#questions");
    let questionHolders = document.querySelectorAll(".questions-container>h3")
    let questions = []
    questionHolders.forEach(elm=>{

        questions.push(elm.innerText)
    })
    input.value = questions

}
function treatablesInit(){
        let input = document.querySelector(".treatables-input")
        let selected = document.querySelectorAll(".selected")
        let treatables = []
        selected.forEach(elm=>{
            treatables.push(elm.id)
        })
        input.value = treatables

    }
    treatablesInit()
function questionRemove(){
event.target.parentNode.remove();
questionUpdate()
}
questionUpdate()
function questionAdd(){
let input = document.querySelector(".questioner");
let questionsContainer = document.querySelector(".questions-container");
let h3 = document.createElement('h3')
h3.innerHTML = input.value+"<i onclick='questionRemove()' class='fa-solid fa-trash'></i>"
questionsContainer.append(h3)
questionUpdate()
}
function treatableUpdate(){

if(event.target.className == "unselected"){
    event.target.className = "selected"
}
else{
    event.target.className = "unselected"
}
let input = document.querySelector(".treatables-input")
let selected = document.querySelectorAll(".selected")
let treatables = []
selected.forEach(elm=>{
    treatables.push(elm.id)
})
input.value = treatables
}
</script>



@endsection
