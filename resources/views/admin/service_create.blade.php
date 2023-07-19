@extends("layouts.admin")

@section('content')

<h1 class="section-title">Create a service</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/services/store" method="post" enctype="multipart/form-data">
        <input type="text" name="treatables" class="treatables-input" required hidden/>
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
                <i class="fa-solid fa-notes-medical"></i>
                <input type="text" name="name" placeholder="Name" required />
            </div>
            <div style="color: var(--text)">
                Select multiple treatables
            </div>
            <div class="treatables-container">
                @foreach ($treatables as $treatable )
                    <span class="unselected" id={{ $treatable->id }} onclick="treatableUpdate()"> {{ $treatable->name  }}</span>
                @endforeach

            </div>


        </div>

        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">CREATE<i class="fa-regular fa-square-plus"></i></button>
        </div>


    </form>

</div>
<script>
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
