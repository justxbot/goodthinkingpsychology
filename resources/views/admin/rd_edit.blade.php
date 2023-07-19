@extends("layouts.admin")
@section('content')

<h1 class="section-title">Editing {{ $rd->name }} Rate and Debate</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/r_d/{{ $rd->id }}/update" method="post" >
        <input type="text" name="benifits" id="questions" @if ($rd->benifits!=null)value="{{ implode(',',json_decode($rd->benifits)) }}"@endif  hidden/>
        @csrf
        <div class="create-clinic-form-header">
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                <input type="text" name="name" placeholder="Name"  value="{{ $rd->name }}" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-money-bill"></i>
                <input type="text" name="fee" placeholder="Fee"  value="{{ $rd->fee }}" step="any" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <input type="text" name="rebate" placeholder="Rebate" value="{{ $rd->rebate }}" step="any"  required/>
            </div>
            <div class="input-container">

                <i class="fa-solid fa-clipboard-question"></i>
                <input type="text" placeholder="Benifits/Services" class="questioner" />
                <i class="fa-solid fa-plus add-question" onclick="questionAdd()"></i>

            </div>
            <div class="questions-container">
            </div>
            <div class="checkbox-input-container">
                <input type="checkbox" name="gp" @if($rd->gp==1) checked @endif><span>Eligible for GP referral</span>
            </div>
        </div>
        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>
        </div>

    </form>

</div>
@if ($rd->benifits!=null)
<script>
function questionsInit(){
        let input = document.querySelector("#questions");
        let questionsContainer = document.querySelector(".questions-container");
        input = input.value.split(',')
        console.log(input);
        input.forEach(elm=>{
            let h3 = document.createElement('h3')
            h3.innerHTML = elm+"<i onclick='questionRemove()' class='fa-solid fa-trash'></i>"
            questionsContainer.append(h3)
        })


    }
    questionsInit()
</script>

@endif
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
