@extends('layouts.admin')

@section('content')
<h1 class="section-title">All Clinics </h1>

<div class="clinics-container">
    <div class="add-clinic-section">
        <a class="primary-btn" href="/admin/clinics/create"> <i class="fa-regular fa-hospital"></i>CREATE</a>
    </div>
    <table>

        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>ADDRESS</th>
            <th>ACTIONS</th>
        </tr>
        @forelse ( $clinics as $clinic )
        <tr @if ($loop->index%2==0)
            style="background-color:var(--secondary)"
        @endif>
            <td>{{ $clinic->id }}</td>
            <td>{{ $clinic->name }}</td>
            <td>{{ $clinic->address }}</td>
            <td class="actions-td">
                <i onclick="dropDownHandler()" class="fa-solid fa-bars dropdown-trigger"></i>
                <div class="dropdown-actions" id={{ uniqid()}}>
                    <form  onsubmit="event.preventDefault()">
                        <button onclick="window.location.href = '/admin/clinics/edit/{{ $clinic->id }}'" >Edit <i class="fa-solid fa-pen-to-square"></i></button>
                    </form>
                    <form action="/admin/clinics/destroy/{{ $clinic->id }}" method="post">
                        @csrf
                        <button type="submit">Remove <i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @empty

        @endforelse


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
