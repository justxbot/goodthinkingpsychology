@extends('layouts.admin')

@section('content')

<h1 class="section-title">All Therapies</h1>


<div class="clinics-container">
    <div class="add-clinic-section">
        <a class="primary-btn" href="/admin/therapies/create"> <i class="fa-solid fa-hand-holding-heart"></i>CREATE</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>PICTURE</th>
            <th>NAME</th>
            <th>ABBREVIATION</th>
            <th>ACTIONS</th>
        </tr>
        @foreach ($therapies as $therapy )
        <tr @if ($loop->index%2==0)
            style="background-color:var(--secondary)"
        @endif>

        <td>{{ $therapy->id }}</td>
        <td><img src="{{asset("/storage/".$therapy->picture)}}" alt=""></td>
        <td>{{ $therapy->name }}</td>
        <td>{{ $therapy->abbr }}</td>
            <td class="actions-td">
                <i onclick="dropDownHandler()" class="fa-solid fa-bars dropdown-trigger"></i>
                <div class="dropdown-actions" id={{ uniqid()}}>
                    <form onsubmit="event.preventDefault()">
                        <button onclick="window.location.href = '/therapies/{{ $therapy->id }}'" type="submit" >View <i class="fa-solid fa-eye"></i></button>
                    </form>
                    <form onsubmit="event.preventDefault()">
                        <button onclick="window.location.href = '/admin/therapies/{{ $therapy->id }}/edit'" type="submit" >Edit <i class="fa-solid fa-pen-to-square"></i></button>
                    </form>
                    <form action="/admin/therapies/{{ $therapy->id  }}/destroy/" method="post">
                        @csrf
                        <button type="submit">Remove <i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<script>
    function dropDownHandler(){


            if(event.target.nextElementSibling.className=="dropdown-actions"){
                let dropdowns = document.querySelectorAll(".dropdown-actions-active")
                dropdowns.forEach(element => {
                element.className = "dropdown-actions"})
                event.target.nextElementSibling.className ="dropdown-actions dropdown-actions-active";
            }
            else{
                event.target.nextElementSibling.className ="dropdown-actions";
            }
    }
    </script>
@endsection
