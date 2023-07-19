@extends("layouts.admin")
@section('content')

<h1 class="section-title">Create a new Rate & Debate !</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/r_d/store" method="post" >
        <input type="text" name="benifits" id="questions"  hidden/>
        @csrf
        <div class="create-clinic-form-header">
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                <input type="text" name="name" placeholder="Name"  required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-money-bill"></i>
                <input type="text" name="fee" placeholder="Fee"  required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <input type="text" name="rebate" placeholder="Rebate"   required/>
            </div>
            <div class="input-container">

                <i class="fa-solid fa-clipboard-question"></i>
                <input type="text" placeholder="Benifits/Services" class="questioner" />
                <i class="fa-solid fa-plus add-question" onclick="questionAdd()"></i>

            </div>
            <div class="questions-container">
            </div>
            <div class="checkbox-input-container">
                <input type="checkbox" name="gp"><span>Eligible for GP referral</span>
            </div>
        </div>
        <div class="create-clinic-form-footer">
            <button type="reset"  class="secondary-btn">RESET<i class="fa-solid fa-rotate"></i></button>
            <button type="submit" class="primary-btn">CREATE<i class="fa-regular fa-square-plus"></i></button>
        </div>

    </form>

</div>
<script>
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
</script>
@endsection
