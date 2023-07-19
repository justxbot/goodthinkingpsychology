<div class="booking-section">
    <div class="contact-section-text-container" >

        <div class="contact-text-body">
            <h1>
                Request an appointment now by selecting a day and time that suits you.</h1>
        </div>
    </div>
    <div class="contact-form-container">

        <form action="/request_appointment" method="post">
            @csrf
                <div class="contact-form-row">
                    <div class="contact-form-input-container">
                        <input type="text" name="fname" placeholder="First Name" required/>
                    </div>
                    <div class="contact-form-input-container">
                        <input type="text" name="lname" placeholder="Last Name" required/>
                    </div>
                </div>
                <div class="contact-form-row">

                    <div class="contact-form-input-container">
                        <input type="date" name="date" required/>
                    </div>

                    <div class="contact-form-input-container">
                        <input type="time" name="time" required/>
                    </div>
                </div>
                <div class="contact-form-input-container">
                    <input type="email" name="email" placeholder="Email" required/>
                </div>
                <div class="contact-form-input-container">
                    <input type="tel" name="mobile" placeholder="Telephone" required/>
                </div>
                <label >
                    <input style="accent-color :var(--secondary)" type="checkbox" name="hadAppointmentBefore"/>
                   Have you had an appointment before?
                </label>
                <div class="form-footer">
                    <button>Request <i class="fa-solid fa-calendar-days"></i></button>
                </div>
        </form>
    </div>
</div>
