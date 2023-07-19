@extends("layouts.admin")
@section('content')

<h1 class="section-title">Create a new Plan !</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/plans/store" method="post" >
        @csrf
        <div class="create-clinic-form-header">
            </div>


        <div class="create-clinic-form-body">
            <div class="input-container">
                <i class="fa-solid fa-money-check-dollar"></i>
                <input type="text" name="name" placeholder="Name"  required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-money-bill"></i>
                <input type="number" name="fee" placeholder="Fee"  step="any" required/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <input type="number" name="returnable_fee" placeholder="Returnable Fee" step="any"  required/>
            </div>

        </div>
        <div class="create-clinic-form-footer">
            <button type="reset"  class="secondary-btn">RESET<i class="fa-solid fa-rotate"></i></button>
            <button type="submit" class="primary-btn">CREATE<i class="fa-regular fa-square-plus"></i></button>
        </div>

    </form>

</div>
@endsection
