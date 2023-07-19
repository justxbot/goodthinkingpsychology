@extends('layouts.admin')
@section('content')

<h1 class="section-title">All Coachings</h1>

<div class="clinics-container">
    <div class="add-clinic-section">
        <a class="primary-btn" href="/admin/coachings/create"> <i class="fa-solid fa-user-gear"></i>CREATE</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>TEAM MEMBER IN CHARGE</th>
            <th>ACTIONS</th>
        </tr>
        @foreach ($coachings as $coaching )
        <tr @if ($loop->index%2==0)
            style="background-color:var(--secondary)"
        @endif>
            <td>{{ $coaching->id }}</td>
            <td>{{ $coaching->name }}</td>
            <td>{{ $coaching->team_member->fname." ".$coaching->team_member->lname }}</td>
            <td class="actions-td">
                <i onclick="dropDownHandler()" class="fa-solid fa-bars dropdown-trigger"></i>
                <div class="dropdown-actions" id={{ uniqid()}}>
                    <form onsubmit="event.preventDefault()">
                        <button onclick="window.location.href = '/coachings/{{ $coaching->id }}'" type="submit" >View <i class="fa-solid fa-eye"></i></button>
                    </form>
                    <form onsubmit="event.preventDefault()">
                        <button onclick="window.location.href = '/admin/coachings/{{ $coaching->id }}/edit'" type="submit" >Edit <i class="fa-solid fa-pen-to-square"></i></button>
                    </form>
                    <form action="/admin/coachings/{{ $coaching->id }}/destroy/" method="post">
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
