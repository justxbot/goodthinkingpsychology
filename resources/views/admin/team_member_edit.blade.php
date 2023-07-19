@extends("layouts.admin")

@section('content')

<h1 class="section-title">Editing {{ $team_member->fname." ".$team_member->lname }} details</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/team_members/{{ $team_member->id }}/update" method="post" enctype="multipart/form-data">
        <input type="text"placeholder="qualifications"  name="qualifications" hidden />
        <input type="text"placeholder="interests"  name="interests" hidden />
        <input type="text"placeholder="experiences" name="experiences" hidden />
        <input type="text"placeholder="approaches"  name="approaches"  hidden/>
        @csrf
        <div class="create-clinic-form-header">

            <div class="coaching-edit-picture" style="background-image: url('{{ asset('/storage/'.$team_member->picture) }}')">
                <h1><i onclick="removeImage()" class="fa-solid fa-trash"></i></h1>
                <input type="text" name="picture" accept="image/*" value="{{ $team_member->picture }}" hidden/>
            </div>
            </div>


        <div class="create-clinic-form-body">
            <div class="row-inputs">
                <div class="input-container">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="fname"  placeholder="First name" value="{{ $team_member->fname }}" required/>
                </div>
                <div class="input-container">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="lname"  placeholder="Last name" value="{{ $team_member->lname }}" required/>
                </div>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-certificate"></i>
                <input type="text" name="degree"  placeholder="Degree" value="{{ $team_member->degree}}" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-id-card-clip"></i>
                <input type="text" name="role"  placeholder="Role" value="{{ $team_member->role }}" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-money-check-dollar"></i>
                <select name="plan"  onclick="dropdownArrow()" required>
                    @foreach ($plans as $plan)
                        @if($plan->id == $team_member->plan_id)
                        <option value="{{ $plan->id }}" selected>{{ $plan->name}}</option>
                        @else
                        <option value="{{ $plan->id }}">{{ $plan->name}}</option>
                        @endif
                    @endforeach
                </select>
                <i class="fa-solid fa-caret-down dropdownarrow"></i>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-house-chimney-medical"></i>
                <input type="text" name="availability"  placeholder="Availibility | Example: Available at Haberfield on Saturdays and Sundays " value="{{ $team_member->availability }}"/>
            </div>
            <div class="input-container">

                <i class="fa-solid fa-certificate"></i>
                <input type="text" placeholder="Qualifications" class="qualificationser questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('qualificationser','qualifications-container','qualifications')"></i>

            </div>
            <div class="qualifications-container questions-container">
                @foreach (json_decode($team_member->qualifications) as $qualification )
                    <h3> {{ $qualification }}<i onclick="promptRemove('qualifications','qualifications-container')" class="fa-solid fa-trash"></i></h3>
                @endforeach
            </div>
            <div class="input-container">

                <i class="fa-solid fa-ranking-star"></i>
                <input type="text" placeholder="Experiences" class="experienceser questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('experienceser','experiences-container','experiences')"></i>

            </div>
            <div class="experiences-container questions-container">
                @foreach (json_decode($team_member->experiences) as $exp )
                    <h3> {{ $exp }}<i onclick="promptRemove('experiences','experiences-container')" class="fa-solid fa-trash"></i></h3>
                @endforeach
            </div>
            <div class="input-container">

                <i class="fa-solid fa-user-gear"></i>
                <input type="text" placeholder="Approaches" class="approacheser questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('approacheser','approaches-container','approaches')"></i>

            </div>
            <div class="approaches-container questions-container">
                @foreach (json_decode($team_member->approachs) as $appr )
                    <h3> {{ $appr }}<i onclick="promptRemove('approaches','approaches-container')" class="fa-solid fa-trash"></i></h3>
                @endforeach
            </div>
            <div class="input-container">

                <i class="fa-solid fa-fingerprint"></i>
                <input type="text" placeholder="Special interests" class="specializer questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('specializer','special-interests-container','interests')"></i>

            </div>
            <div class="special-interests-container questions-container">
                @foreach (json_decode($team_member->approachs) as $appr )
                    <h3> {{ $appr }}<i onclick="promptRemove('interests','special-interests-container')" class="fa-solid fa-trash"></i></h3>
                @endforeach
            </div>
            <div class="row-inputs">
                <div class="input-container">
                    <i class="fa-brands fa-facebook-f"></i>
                    <input type="text" name="fb"  placeholder="Facebook link" value="{{ $team_member->facebook_link }}" />
                </div>
                <div class="input-container">
                    <i class="fa-brands fa-instagram"></i>
                    <input type="text" name="insta"  placeholder="Instagram link" value="{{ $team_member->instagram_link }}" />
                </div>
                <div class="input-container">
                    <i class="fa-brands fa-at"></i>
                    <input type="email" name="email"  placeholder="Email"  value="{{ $team_member->email }}"/>
                </div>
            </div>
        </div>

        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>
        </div>


    </form>

</div>
<script>
    //init jsons
    promptUpdate("qualifications", "qualifications-container")
    promptUpdate("experiences", "experiences-container")
    promptUpdate("approaches", "approaches-container")
    promptUpdate("interests", "special-interests-container")



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
    }
    function promptRemove($inputName,$containerClass){

        event.target.parentNode.remove();
        promptUpdate($inputName,$containerClass);

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
    function dropdownArrow(){

let arrow = document.querySelector('.dropdownarrow')
if(arrow.className == "fa-solid fa-caret-down dropdownarrow"){
    arrow.className ="fa-solid fa-caret-up dropdownarrow"
}
else{
    arrow.className = "fa-solid fa-caret-down dropdownarrow"

}

}

</script>
@endsection
