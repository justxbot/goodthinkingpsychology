@extends("layouts.admin")
@section('content')

<h1 class="section-title">Editing {{ $plan->name }} Plan !</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/plans/{{ $plan->id }}/update" method="post" >
        @csrf
        <div class="create-clinic-form-header">
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-solid fa-money-check-dollar"></i>
                <input type="text" name="name" placeholder="Name" value="{{ $plan->name }}"  required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-money-bill"></i>
                <input type="number" name="fee" placeholder="Fee" value="{{ $plan->fee }}" step="any" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <input type="number" name="returnable_fee" placeholder="Returnable Fee" value="{{ $plan->returnable_fee }}" step="any"  required/>
            </div>

        </div>
        <div class="create-clinic-form-footer">
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>
        </div>

    </form>

</div>
@endsection
