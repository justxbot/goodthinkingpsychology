<div class="footer-container">
    <div class="footer-info">
        <h3 onclick="window.open('mailto:'+event.target.innerText)"><i class="fa-solid fa-envelope"></i>{{ $configs->email }}</h3>
        <h3 onclick="window.open('tel:'+event.target.innerText)"><i class="fa-solid fa-phone"></i>{{ $configs->phone }}</h3>
        <h3 onclick="window.open('https://google.com/maps/place/'+event.target.innerText)"><i class="fa-solid fa-location-dot"></i>{{ $configs->address }}</h3>
    </div>
    <div class="footer">
        <div class="footer-content">
            <div class="footer-logo">

            </div>
            <div class="footer-pages-container">
                <div class="footer-pages">
                    <h1>PAGES</h1>
                    <h3>HOME</h3>
                    <h3>ABOUT</h3>
                    <h3>THERAPIES</h3>
                    <h3>SERVICE</h3>
                    <h3>ACTIVITIES & WORKSHOPS</h3>
                    <h3>RESOURCES</h3>
                    <h3>CONTACT US</h3>
                </div>


            </div>
            <div class="footer-socials-container">
                <h1>SOCIALS</h1>
                <div class="footer-socials">
                    <i onclick="window.open('{{ $configs->facebook_link }}')" class="fa-brands fa-square-facebook"></i>
                    <i onclick="window.open('{{ $configs->google_link }}')" class="fa-brands fa-square-google-plus"></i>
                    <i onclick="window.open('{{ $configs->twitter_link }}')" class="fa-brands fa-square-twitter"></i>
                </div>
            </div>
        </div>
        <div class="footer-footer">
           © Good Thinking Clinical Psychology - 2023
        </div>
    </div>
</div>
