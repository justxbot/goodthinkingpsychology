@extends("layouts.admin")

@section('content')

<h1 class="section-title">Editing {{ $service->name }} Service</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/services/{{ $service->id }}/update" method="post" enctype="multipart/form-data">
        <input type="text" name="treatables" class="treatables-input" required hidden />
        @csrf
        <div class="create-clinic-form-header">

            <div class="coaching-edit-picture" style="background-image: url('{{ asset('/storage/'.$service->picture) }}')">
                <h1><i onclick="removeImage()" class="fa-solid fa-trash"></i></h1>
                <input type="text" name="picture" accept="image/*" value="{{ $service->picture }}" hidden/>
            </div>
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-solid fa-notes-medical"></i>
                <input type="text" name="name" placeholder="Name" required value="{{ $service->name }}"/>
            </div>
            <div style="color: var(--text)">
                Select multiple treatables
            </div>
            <div class="treatables-container">
                @foreach ($treatables as $treatable )
                    {{ $isTrue = false }}
                    @foreach ($service_treatables as $service_treatable )
                        @if($treatable->id == $service_treatable->treatable_id)
                        @php $isTrue = true @endphp
                            <span class="selected" id="{{ $treatable->id }}" onclick="treatableUpdate()"> {{ $treatable->name  }}</span>
                        @endif
                    @endforeach
                    @if(!$isTrue)
                        <span class="unselected" id="{{ $treatable->id }}" onclick="treatableUpdate()"> {{ $treatable->name  }}</span>
                    @endif
                @endforeach

            </div>


        </div>

        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>

        </div>


    </form>

</div>
<script>
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
