@extends("layouts.admin")
@section('content')

<div class="dashboard-container">
    <div class="stats-container">

        <x-stats-tab url="/admin/appointments" name="NEW APPOINTMENTS" number="{{ App\Models\Appointment::where('status','=','pending')->count() }}">
            <i class="fa-solid fa-calendar-days"></i>
        </x-stats-tab>

        <x-stats-tab url="/admin/messages" name="MESSAGES" number="{{ App\Models\Message::count() }}">
            <i class="fa-solid fa-envelope"></i>
        </x-stats-tab>

        <x-stats-tab url="/admin/clinics" name="CLINICS" number="{{ App\Models\Clinic::count() }}">
            <i class="fa-solid fa-house-chimney-medical"></i>
        </x-stats-tab>

        <x-stats-tab name="COACHINGS" number="{{ App\Models\Coaching::count() }}">
            <i class="fa-solid fa-user-gear"></i>
        </x-stats-tab>

        <x-stats-tab name="RESOURCES" number="{{ App\Models\Resource::count() }}">
            <i class="fa-brands fa-sourcetree"></i>
        </x-stats-tab>

        <x-stats-tab name="TEAM MEMBERS" number="{{ App\Models\TeamMember::count() }}">
            <i class="fa-solid fa-people-group"></i>
        </x-stats-tab>
    </div>
</div>


@endsection
