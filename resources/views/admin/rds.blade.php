@extends('layouts.admin')

@section('content')

<h1 class="section-title">All Rates & Debates</h1>


<div class="clinics-container">
    <div class="add-clinic-section">
        <a class="primary-btn" href="/admin/r_d/create"> <i class="fa-solid fa-hand-holding-dollar"></i>CREATE</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>FEE</th>
            <th>REBATE</th>
            <th>GP REFERRAL</th>
            <th>ACTIONS</th>
        </tr>
        @foreach ($rds as $rd )
        <tr @if ($loop->index%2==0)
            style="background-color:var(--secondary)"
        @endif>

        <td>{{ $rd->id }}</td>
        <td>{{ $rd->name }}</td>
        <td>${{ $rd->fee }}</td>
        <td>${{ $rd->rebate }}</td>
        @if( $rd->gp )
            <td class="had"><i class="fa-solid fa-check"></i></td>
        @else
            <td class="hadnt"><i class="fa-solid fa-xmark"></i></td>
        @endif

            <td class="actions-td">
                <i onclick="dropDownHandler()" class="fa-solid fa-bars dropdown-trigger"></i>
                <div class="dropdown-actions" id={{ uniqid()}}>
                    <form onsubmit="event.preventDefault()">
                        <button onclick="window.location.href = '/admin/r_d/{{ $rd->id }}/edit'" type="submit" >Edit <i class="fa-solid fa-pen-to-square"></i></button>
                    </form>
                    <form action="/admin/r_d/{{ $rd->id }}/destroy/" method="post">
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
