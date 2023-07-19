@extends('layouts.admin')

@section('content')

<h1 class="section-title">All plans</h1>


<div class="clinics-container">
    <div class="add-clinic-section">
        <a class="primary-btn" href="/admin/plans/create"> <i class="fa-solid fa-money-check-dollar"></i>CREATE</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>FEE</th>
            <th>RETURNABLE FEE</th>
            <th>ACTIONS</th>
        </tr>
        @foreach ($plans as $plan )
        <tr @if ($loop->index%2==0)
            style="background-color:var(--secondary)"
        @endif>

        <td>{{ $plan->id }}</td>
        <td>{{ $plan->name }}</td>
        <td>${{ $plan->fee }}</td>
        <td>${{ $plan->returnable_fee }}</td>

            <td class="actions-td">
                <i onclick="dropDownHandler()" class="fa-solid fa-bars dropdown-trigger"></i>
                <div class="dropdown-actions" id={{ uniqid()}}>
                    <form onsubmit="event.preventDefault()">
                        <button onclick="window.location.href = '/admin/plans/{{ $plan->id }}/edit'" type="submit" >Edit <i class="fa-solid fa-pen-to-square"></i></button>
                    </form>
                    <form action="/admin/plans/{{ $plan->id }}/destroy/" method="post">
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
