@extends('layouts.admin')
@section('content')

<h1 class="section-title">Create a Therapy !</h1>

<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/therapies/store" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="treatables" id="questions" hidden />
        <input type="text" name="team_members_p" class="treatables-input" required hidden/>

        <div class="create-clinic-form-header">

                <label for="file-upload" class="file-upload-box">
                    <input onchange="filesUpload()" id="file-upload" type="file" name="picture" accept="image/*" required/>
                    Upload A Picture/Banner
                    <p> </p>
                </label>
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <input type="text" name="name" placeholder="Name" required />
            </div>
            <div class="input-container">
                <i class="fa-solid fa-clover"></i>
                <input type="text" name="abbr" placeholder="Abbreviation">
            </div>
            <div class="input-container">

                <i class="fa-solid fa-suitcase-medical"></i>
                <input type="text" placeholder="Treatables" class="questioner" />
                <i class="fa-solid fa-plus add-question" onclick="questionAdd()"></i>

            </div>
            <div class="questions-container">
            </div>
            <div style="color: var(--text)">
                Select 1 or multiple team members
            </div>
            <div class="treatables-container">
                @foreach ($team_members as $treatable )
                    <span class="unselected" id={{ $treatable->id }} onclick="treatableUpdate()"> {{ $treatable->fname." ".$treatable->lname  }}</span>
                @endforeach

            </div>
            <textarea class="admin-form-textarea" name="description" id="" cols="30" rows="10" maxlength="600" placeholder="Description..."></textarea>


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
    function questionUpdate(){

let input = document.querySelector("#questions");
let questionHolders = document.querySelectorAll(".questions-container>h3")
let questions = []
questionHolders.forEach(elm=>{

    questions.push(elm.innerText)
})
input.value = questions

}
function questionRemove(){
event.target.parentNode.remove();
questionUpdate()
}
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
