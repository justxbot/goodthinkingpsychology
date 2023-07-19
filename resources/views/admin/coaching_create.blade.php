@extends('layouts.admin')
@section('content')

<h1 class="section-title">Create a Coaching !</h1>

<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/coachings/store" method="post" enctype="multipart/form-data">
        <input type="text" name="questions" id="questions" hidden/>
        @csrf
        <div class="create-clinic-form-header">

                <label for="file-upload" class="file-upload-box">
                    <input onchange="filesUpload()" id="file-upload" type="file" name="picture" accept="image/*" required/>
                    Upload A Picture
                    <p> </p>
                </label>
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-solid fa-user-gear"></i>
                <input type="text" name="name" placeholder="Name" required />
            </div>
            <div class="input-container">

                <i class="fa-solid fa-clipboard-question"></i>
                <input type="text" placeholder="Questions" class="questioner" />
                <i class="fa-solid fa-plus add-question" onclick="questionAdd()"></i>

            </div>
            <div class="questions-container">
            </div>
            <div class="input-container">
                <i class="fa-solid fa-people-group"></i>
                <select name="team_member"  onclick="dropdownArrow()" >
                    <option disabled selected > Choose a team member to assign</option>
                    @foreach ($team_members as $team_member)
                    <option value="{{ $team_member->id }}">{{ $team_member->fname.' '.$team_member->lname }}</option>

                    @endforeach
                </select>
                <i class="fa-solid fa-caret-down dropdownarrow"></i>
            </div>
            <textarea class="admin-form-textarea" name="description" id="" cols="30" rows="10" placeholder="Description..."required></textarea>


        </div>
        <div class="create-clinic-form-footer">
            <button type="reset"  class="secondary-btn">RESET<i class="fa-solid fa-rotate"></i></button>
            <button type="submit" class="primary-btn">CREATE<i class="fa-regular fa-square-plus"></i></button>
        </div>


    </form>

</div>
<script>
    function dropdownArrow(){

        let arrow = document.querySelector('.dropdownarrow')
        if(arrow.className == "fa-solid fa-caret-down dropdownarrow"){
            arrow.className ="fa-solid fa-caret-up dropdownarrow"
        }
        else{
            arrow.className = "fa-solid fa-caret-down dropdownarrow"

        }

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
        h3.innerHTML = input.value+"?<i onclick='questionRemove()' class='fa-solid fa-trash'></i>"
        questionsContainer.append(h3)
        questionUpdate()
    }
</script>



@endsection
