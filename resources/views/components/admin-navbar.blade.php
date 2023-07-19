<nav>
    <div class="navbar-left">
        <h1 class="nav-tab"></h1>
    </div>
    <div class="navbar-right">
        <div class="navbar-dropdown-container" >
            <h1 class="nav-tab settings-tab" ><i class="fa-solid fa-gear"></i></h1>
            <div class="navbar-dropdown">
                <a href="/"><i class="fa-sharp fa-solid fa-desktop"></i> Visit website</a>
                <a href="/admin/account_settings"><i class="fa-solid fa-user-gear"></i> Admin settings</a>
                <a href="/admin/website_settings"><i class="fa-solid fa-screwdriver-wrench"></i> Website settings</a>
                <a href="/__security_firewall_1/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
        <div>
    </div>

</nav>
<script>
    let title1 = document.querySelector(".navbar-left > .nav-tab")
    title1.innerText = currentTab().toUpperCase()
    function currentTab(){
        let url = window.location.href
        url = url.split('/')[4]
        url = url.split('?')[0]
        if(url=='r_d'){
            return 'Rates & Debates'
        }
        else if(url=='team_members'){
            return 'TEAM MEMBERS'
        }
        else if(url=='account_settings'){
            return 'ACCOUNT SETTINGS'
        }
        else if(url=='website_settings'){
            return 'WEBSITE SETTINGS'
        }
        else{

            return url
        }
    }
    let settingsTab = document.querySelector('.settings-tab')
    let navDropdown = document.querySelector('.navbar-dropdown')
    settingsTab.addEventListener('click',()=>{

        if(navDropdown.className == "navbar-dropdown"){
            navDropdown.className = "navbar-dropdown navbar-dropdown-active"
        }
        else{

            navDropdown.className ="navbar-dropdown"
        }

    })
</script>
