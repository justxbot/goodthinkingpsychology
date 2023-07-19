
<div class="admin-sidebar">

    <div class="admin-sidebar-header">
        <h1>ADMIN</h1>
    </div>
    <div class="admin-sidebar-body">
        <div class="{{ explode('/',url()->current())[4]== 'dashboard'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-table-columns"></i>
            <a href="/admin/dashboard">DASHBOARD</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'appointments'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-calendar-days"></i>
            <a href="/admin/appointments">APPOINTMENTS</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'messages'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-envelope"></i>
            <a href="/admin/messages">MESSAGES</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'clinics'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-house-chimney-medical"></i>
            <a href="/admin/clinics">CLINICS</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'coachings'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-user-gear"></i>
            <a href="/admin/coachings">COACHINGS</a>
        </div>

        <div class="{{ explode('/',url()->current())[4] == 'plans'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-money-check-dollar"></i>
            <a href="/admin/plans">PLANS</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'resources'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-brands fa-sourcetree"></i>
            <a href="/admin/resources">RESOURCES</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'r_d'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-hand-holding-dollar"></i>
            <a href="/admin/r_d">RATES & DEBATES</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'services'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-notes-medical"></i>
            <a href="/admin/services">SERVICES</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'team_members'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab " >
            <i class="fa-solid fa-people-group"></i>
            <a href="/admin/team_members">TEAM MEMBERS</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'therapies'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-hand-holding-heart"></i>
            <a href="/admin/therapies">THERAPIES</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'treatables'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-prescription-bottle-medical"></i>
            <a href="/admin/treatables">TREATABLES</a>
        </div>

        <div class="{{ explode('/',url()->current())[4]== 'workshops'? 'admin-sidebar-tab-active' : '' }} admin-sidebar-tab ">
            <i class="fa-solid fa-graduation-cap"></i>
            <a href="/admin/workshops">WORKSHOPS</a>
        </div>
    </div>
</div>
<script>
    function currentTab(){
        let url = window.location.href
        return url.split('/')[4]
    }

</script>
