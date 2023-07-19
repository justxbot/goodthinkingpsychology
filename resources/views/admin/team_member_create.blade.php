@extends("layouts.admin")

@section('content')

<h1 class="section-title">Create a team member </h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/team_members/store" method="post" enctype="multipart/form-data">
        <input type="text" name="qualifications" hidden />
        <input type="text" name="interests" hidden />
        <input type="text" name="experiences"  hidden/>
        <input type="text" name="approaches" hidden />
        @csrf
        <div class="create-clinic-form-header">

                <label for="file-upload" class="file-upload-box">
                    <input onchange="filesUpload()" id="file-upload" type="file" name="picture" accept="image/*" required/>
                    Upload A Picture
                    <p> </p>
                </label>
            </div>


        <div class="create-clinic-form-body">
            <div class="row-inputs">
                <div class="input-container">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="fname"  placeholder="First name" required/>
                </div>
                <div class="input-container">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="lname"  placeholder="Last name" required/>
                </div>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-certificate"></i>
                <input type="text" name="degree"  placeholder="Degree" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-id-card-clip"></i>
                <input type="text" name="role"  placeholder="Role" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-money-check-dollar"></i>
                <select name="plan"  onclick="dropdownArrow()" required>
                    <option value="" hidden disabled selected > Choose a plan to be assigned</option>
                    @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}">{{ $plan->name}}</option>

                    @endforeach
                </select>
                <i class="fa-solid fa-caret-down dropdownarrow"></i>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-house-chimney-medical"></i>
                <input type="text" name="availability"  placeholder="Availibility | Example: Available at Haberfield on Saturdays and Sundays " />
            </div>
            <div class="input-container">

                <i class="fa-solid fa-certificate"></i>
                <input type="text" placeholder="Qualifications" class="qualificationser questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('qualificationser','qualifications-container','qualifications')"></i>

            </div>
            <div class="qualifications-container questions-container">

            </div>
            <div class="input-container">

                <i class="fa-solid fa-ranking-star"></i>
                <input type="text" placeholder="Experiences" class="experienceser questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('experienceser','experiences-container','experiences')"></i>

            </div>
            <div class="experiences-container questions-container">
            </div>
            <div class="input-container">

                <i class="fa-solid fa-user-gear"></i>
                <input type="text" placeholder="Approaches" class="approacheser questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('approacheser','approaches-container','approaches')"></i>

            </div>
            <div class="approaches-container questions-container">

            </div>
            <div class="input-container">

                <i class="fa-solid fa-fingerprint"></i>
                <input type="text" placeholder="Special interests" class="specializer questioner" />
                <i class="fa-solid fa-plus add-question" onclick="promptAdd('specializer','special-interests-container','interests')"></i>

            </div>
            <div class="special-interests-container questions-container">

            </div>
            <div class="row-inputs">
                <div class="input-container">
                    <i class="fa-brands fa-facebook-f"></i>
                    <input type="text" name="fb"  placeholder="Facebook link" />
                </div>
                <div class="input-container">
                    <i class="fa-brands fa-instagram"></i>
                    <input type="text" name="insta"  placeholder="Instagram link" />
                </div>
                <div class="input-container">
                    <i class="fa-brands fa-at"></i>
                    <input type="email" name="email"  placeholder="Email" />
                </div>
            </div>
        </div>

        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">CREATE<i class="fa-regular fa-square-plus"></i></button>
        </div>


    </form>

</div>
<script>
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
