@extends("layouts.admin")
@section('content')

<h1 class="section-title">Admin Account Settings</h1>
<div class="clinics-container">
    <form class="create-clinic-form" action="/admin/account_settings/update/" method="post" enctype="multipart/form-data">
        @csrf
        <div class="create-clinic-form-body">
            <div class="input-container" style="margin-top: 3rem ">
                <i class="fa-regular fa-at"></i>
                <input type="text" name="email" placeholder="Email" value="{{ $user->email }}"/>
            </div>
            <div class="input-container">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Set New Password" />
            </div>

        </div>
        <div class="create-clinic-form-footer">
            <button type="reset" class="secondary-btn">RESET<i class="fa-solid fa-rotate"></i></button>
            <button type="submit" class="primary-btn">EDIT<i class="fa-solid fa-pen-to-square"></i></button>
        </div>

    </form>

</div>
@endsection
