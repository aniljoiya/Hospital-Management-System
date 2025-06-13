<!-- SCRIPT for check the slots alreay booked or not -->



<!-- LOGIN AND SIGNUP code-->
<?php
//For appointment system
include 'submit_appointment.php';

//For Login system
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital management website</title>

    <script src="https://kit.fontawesome.com/c1df782baf.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="appointment.css">

</head>
<body> 

    <header>
        
        <div class="logo"><img src="logo3.png" alt=""></div>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#service">Service</a>
            <a href="#doctor">Doctor</a>
            <a href="#Home">Blog</a>
            <a href="#Home">Contact</a>
        </nav>

        <div class="right-icons">
            <div id="menu-bars" class="fas fa-bars"></div>
           <a class="btn" href="login.php">Logout</a>
        </div>

    </header>

    <!-- header section ended -->

    <!-- Home section started -->

        <div id="home" class="main-home">

            <div class="home">
                <div class="home-left-content">
                    <span>welcome to hospital management</span>
                    <h2>We take care our<br> Patients Healths</h2>
                    <p class="lorem">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Possimus numquam veniam porro eius, fugiat vero ut ipsum libero</p>
                
                        <div class="home-btn">
                            <a href="">Read More</a>
                            <button id="appointmentBtn">Appointment</button>
                        </div>
                        
                    </div>

                <div class="home-right-content">
                    <img src="hero2.png" alt="">
                </div>
            </div>
        </div>



<!-- Appointment Form Popup -->
    
   
    <div id="appointmentForm" class="popup-form">
    <div class="form-header">
        <h1>Book Appointment</h1>
        <span id="closeForm" class="close-btn">&times;</span>
    </div>
    <div class="maindiv">
        <form id="appointmentDetails" method="POST">
            <div class="form-container">
                <!-- Left Side Form -->
                <div class="formpart1">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required>
                            <option value="" disabled selected>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" rows="3" name="address" placeholder="Enter your address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Number</label>
                        <input type="text" id="contact" name="contact" placeholder="Enter your contact number" required>
                    </div>
                </div>

                <!-- Right Side Form -->
                <div class="formpart2">
                    <div class="form-group">
                        <label for="speciality">Choose Speciality</label>
                        <select id="speciality" name="speciality" onchange="changeDropDownValue(this.value)" required>
                        <option value="" disabled selected>Select Speciality</option>
                        <option value="Cardiologist">Cardiologist</option>
                        <option value="Dentist">Dentist</option>
                        <option value="General_Physician">General Physician</option>
                        <option value="Dermatologist">Dermatologist</option>
                        <option value="Neurologist">Neurologist</option>
                        <option value="Orthopedic">Orthopedic</option>
                        <option value="Pediatrician">Pediatrician</option>
                        <option value="Psychiatrist">Psychiatrist</option>
                        <option value="Gynecologist">Gynecologist</option>
                        <option value="Ophthalmologist">Ophthalmologist</option>
                        <option value="ENT_Specialist">ENT Specialist</option>
                        <option value="Oncologist">Oncologist</option>
                        <option value="Urologist">Urologist</option>
                        <option value="Nephrologist">Nephrologist</option>
                        <option value="Endocrinologist">Endocrinologist</option>
                        <option value="Rheumatologist">Rheumatologist</option>
                        <option value="Pulmonologist">Pulmonologist</option>
                        <option value="Gastroenterologist">Gastroenterologist</option>
                        <option value="Hematologist">Hematologist</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="doctor">Choose Doctor</label>
                        <select id="doctor" name="doctor" required>
                            <option value="" disabled selected>Select Doctor</option>
                            <!-- Populate doctors dynamically -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Select Appointment Date</label>
                        <input type="date" name="date" id="date" required>
                    </div>
                    <div class="form-group">
                        <label for="day_slot_time">Select Time</label>
                        <select id="day_slot_time" name="day_slot_time" onchange="changeTimeSlot(this.value)" required>
                            <option value="" disabled selected>Select Slot</option>
                            <option value="Morning_Slot">Morning Slots</option>
                            <option value="Evening_Slot">Evening Slots</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="slot_time">Available Slots</label>
                        <div id="slotGrid">
                            <!-- Slot bricks will be dynamically populated here -->
                        </div>
                        <input type="hidden" id="selectedSlot" name="slot_time" required>
                    </div>

                </div>
            </div>
            <!-- Submit Button -->
            <div class="form-footer">
                <button type="submit" id="submit-btn" class="submit-btn">Submit</button>
            </div>
        </form>
    </div>
</div>







<!---Technology-->

        <div id="technology" class="technology">
            <div class="main-technology">
                
                <div class="inner-technology">
                    <span></span>
                    <i class="fi fi-tr-hands-heart"></i>
                    <h2>Quality & Safety</h2>
                    <p>Our Delmont hospital utilizes state of the art technology and employs a team of true experts.</p>
                </div>

                <div class="inner-technology">
                    <span></span>
                    <i class="fi fi-rr-doctor"></i>
                    <h2>Quality & Safety</h2>
                    <p>Our Delmont hospital utilizes state of the art technology and employs a team of true experts.</p>
                </div>

                <div class="inner-technology">
                    <span></span>
                    <i class="fi fi-tr-user-md"></i>
                    <h2>Quality & Safety</h2>
                    <p>Our Delmont hospital utilizes state of the art technology and employs a team of true experts.</p>
                </div>
            </div>
        </div>

    <!-- home section ends -->

    <!-- About us section started -->

        <div id="about" class="main-about">

            <div class="about-heading">About Us</div>

            <div class="inner-main-about">
                <div class="about-inner-content-left">
                    <img src="about1.png" alt="">
                </div>

                <div class="about-inner-content">
                    <div class="about-right-content">
                        <h2>We're setting Standards in Research <br> what's more, Clinical Care.</h2>
                        <p>We provide the most full medical services, so every person could have the pportunity 
                         o receive qualitative medical help.</p>
                        <p class="aboutsec-content">
                            Our Clinic has grown to provide a world class facility for the treatment of tooth loss, dental cosmetics and bore advanced restorative dentistry. We are among
                             the most qualified implant providers in the AUS with over 30 years of uality training and experience.
                            </p>
                            <button class="aboutbtn">Read More</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- About us section ends -->

    <!-- our doctors -->

        <div id="doctor" class="main-doctors">
            <div class="doctors-heading">
                <h2>Our Doctors</h2>
            </div>

            <div class="main-inner-doctor">
                <div class="doc-poster">
                    <div class="doc-icons">
                        <i class="fa-solid fa-share"></i>
                        <i class="fa-solid fa-eye"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <img src="team1.jpg" alt="">

                    <div class="doc-details">
                        <h2>Mr Joe</h2>
                        
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>

                </div>

                <div class="doc-poster">
                    <div class="doc-icons">
                        <i class="fa-solid fa-share"></i>
                        <i class="fa-solid fa-eye"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <img src="team2.jpg" alt="">
                    <div class="doc-details">
                        <h2>Mr Joe</h2>
                        
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </div>

                <div class="doc-poster">
                    <div class="doc-icons">
                        <i class="fa-solid fa-share"></i>
                        <i class="fa-solid fa-eye"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <img src="team3.jpg" alt="">
                    <div class="doc-details">
                        <h2>Mr Joe</h2>
                        
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </div>

                <div class="doc-poster">
                    <div class="doc-icons">
                        <i class="fa-solid fa-share"></i>
                        <i class="fa-solid fa-eye"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <img src="team4.jpg" alt="">
                    <div class="doc-details">
                        <h2>Mr Joe</h2>
                        
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </div>

                <div class="doc-poster">
                    <div class="doc-icons">
                        <i class="fa-solid fa-share"></i>
                        <i class="fa-solid fa-eye"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <img src="team5.jpg" alt="">
                    <div class="doc-details">
                        <h2>Mr Joe</h2>
                        
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                </div>

                <div class="doc-poster">
                    <div class="doc-icons">
                        <i class="fa-solid fa-share"></i>
                        <i class="fa-solid fa-eye"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <img src="team6.jpg" alt="">

                    <div class="doc-details">
                        <h2>Mr Joe</h2>
                        
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>

                </div>
            </div>

        </div>

    <!-- our doctors ended -->

    <!-- our services -->

    <div id="service" class="our-service">
        <div class="service-heading">
            <h2>Our Services</h2>
        </div>

        <div class="main-services">
            <div class="inner-services">
                <div class="service-icon">
                    <i class="fa-solid fa-truck-medical"></i>
                </div>
                <h3>Health Check</h3>
                <p>We offer extensive medical procedures to outbound & inbound patients what it is and we are very proud achievement staff.</p>
            </div>

            <div class="inner-services">
                <div class="service-icon">
                    <i class="fa-regular fa-hospital"></i>
                </div>
                <h3>Health Check</h3>
                <p>We offer extensive medical procedures to outbound & inbound patients what it is and we are very proud achievement staff.</p>
            </div>

            <div class="inner-services">
                <div class="service-icon">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <h3>Health Check</h3>
                <p>We offer extensive medical procedures to outbound & inbound patients what it is and we are very proud achievement staff.</p>
            </div>

            <div class="inner-services">
                <div class="service-icon">
                    <i class="fa-solid fa-notes-medical"></i>
                </div>
                <h3>Health Check</h3>
                <p>We offer extensive medical procedures to outbound & inbound patients what it is and we are very proud achievement staff.</p>
            </div>

            <div class="inner-services">
                <div class="service-icon">
                    <i class="fa-solid fa-list-check"></i>
                </div>
                <h3>Health Check</h3>
                <p>We offer extensive medical procedures to outbound & inbound patients what it is and we are very proud achievement staff.</p>
            </div>

            <div class="inner-services">
                <div class="service-icon">
                    <i class="fa-solid fa-user-doctor"></i>
                </div>
                <h3>Health Check</h3>
                <p>We offer extensive medical procedures to outbound & inbound patients what it is and we are very proud achievement staff.</p>
            </div>
        </div>
    </div>

    <!-- our services ended -->

    <!-- customer review -->
   
        <div  class="main-review">
            <section>  
            <div class="review-heading">
                <h1>Our Customers Review</h1>
            </div>

            <div class="main-inner-review">

                <div class="review-inner-content">

                    <div class="review-box">
                        <img src="pic1.png" alt="">

                        <h2>Lara John</h2>
                        <div class="review-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
    
                        <div class="review-text">
                            <p>Optio quod assumenda similique provident aliquid corrupti minima maxime tempore! Quas illo porro fuga consectetur repellat </p>
                        </div>

                    </div>

                    <div class="review-box">
                        <img src="pic2.png" alt="">

                        <h2>Lara John</h2>
                        <div class="review-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
    
                        <div class="review-text">
                            <p>Optio quod assumenda similique provident aliquid corrupti minima maxime tempore! Quas illo porro fuga consectetur repellat</p>
                        </div>

                    </div>

                    <div class="review-box">
                        <img src="pic3.png" alt="">

                        <h2>Lara John</h2>
                        <div class="review-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
    
                        <div class="review-text">
                            <p>Optio quod assumenda similique provident aliquid corrupti minima maxime tempore! Quas illo porro fuga consectetur repellat</p>
                        </div>

                    </div>

                </div>

            </div>
        </section>
        </div>
    
    <!-- customer review -->


    <!-- footer -->

    <div class="main-footer">
        <div class="footer-inner">
            <div class="footer-content">
                <h1>Dummy Links</h1>
                <div class="link">
                    <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                </div>
            </div>

            <div class="footer-content">
                <h1>Dummy Links</h1>
                <div class="link">
                    <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                </div>
            </div>

            <div class="footer-content">
                <h1>Dummy Links</h1>
                <div class="link">
                    <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                </div>
            </div>

            <div class="footer-content">
                <h1>Dummy Links</h1>
                <div class="link">
                    <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                </div>
            </div>

            <div class="footer-content">
                <h1>Dummy Links</h1>
                <div class="link">
                    <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                <a href="">Home</a>
                </div>
            </div>
        </div>
    </div>
        
    <!-- footer ended -->


    <script src="script.js"></script>
    <script src="appointment.js"></script>

</body>
</html>






