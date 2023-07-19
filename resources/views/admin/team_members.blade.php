@extends('layouts.admin')

@section('content')

<h1 class="section-title">All Team Members</h1>


<div class="clinics-container">
    <div class="add-clinic-section">
        <a class="primary-btn" href="/admin/team_members/create"> <i class="fa-solid fa-people-group"></i>CREATE</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>PICTURE</th>
            <th>FULL NAME</th>
            <th>DEGREE</th>
            <th>ROLE</th>
            <th>ACTIONS</th>
        </tr>
        @foreach ($team_members as $member )
        <tr @if ($loop->index%2==0)
            style="background-color:var(--secondary)"
        @endif>

        <td>{{ $member->id }}</td>
        <td><img src="{{asset("/storage/".$member->picture)}}" alt=""></td>
        <td>{{ $member->fname." ".$member->lname }}</td>
        <td>{{ $member->degree }}</td>
        <td>{{ $member->role }}</td>
            <td class="actions-td">
                <i onclick="dropDownHandler()" class="fa-solid fa-bars dropdown-trigger"></i>
                <div class="dropdown-actions" id={{ uniqid()}}>
                    <form onsubmit="event.preventDefault()">
                        <button onclick="window.location.href = '/our-team/{{ $member->id }}'" type="submit" >View <i class="fa-solid fa-eye"></i></button>
                    </form>
                    <form onsubmit="event.preventDefault()">
                        <button onclick="window.location.href = '/admin/team_members/{{ $member->id }}/edit'" type="submit" >Edit <i class="fa-solid fa-pen-to-square"></i></button>
                    </form>
                    <form action="/admin/team_members/{{ $member->id  }}/destroy/" method="post">
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
