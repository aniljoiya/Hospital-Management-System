<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Module</title>
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="doctorpanel.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <div class="main-content">
        <div class="header">
            <h2>Appointment</h2>
            <input type="text" placeholder="Search here...">
            <div class="profile">
                <i class='bx bx-bell'></i>
                <i class='bx bx-cog'></i>
                <img src="dp.jpg" alt="profile picture">
                <p>Dr.Anil Joiya (Dentist)</p>
            </div>
        </div>

      

<!-- Filter Button -->
<div class="filter-section">

            

    <button id="filter-btn">Filter Data</button>
    <div id="filter-options" style="display: none;">
        <input type="text" id="filter-patient-id" placeholder="Patient ID">
        <input type="date" id="filter-booking-date" placeholder="Booking Date">
        
        <!-- Speciality Dropdown -->

    <select id="speciality" name="speciality" onchange="populateDoctors()" required>
        <option value="" >Select Speciality</option>
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


    <select id="doctor" name="doctor" onclick="validateSpecialitySelection()" required>
        <option value="" >Select Doctor</option>
        <!-- Doctors will be dynamically populated here -->
    </select>

        <!-- Slot Time Dropdown -->
        <select id="filter-slot-time">
            <option value="">Select Slot Time</option>
            <option value="Morning">Morning</option>
            <option value="Evening">Evening</option>
        </select>

        <button onclick="applyFilter()">Apply Filter</button>

        <!-- Print Report -->
 
        <button id="open-modal-btn" class="main-content">Print Report</button>

        <!-- Modal -->
        <div id="print-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn" onclick="closeModal()">×</span>
                <h3>Filtered Appointment Data</h3>
                <div id="print-table-preview">
                    <!-- Table will be cloned here dynamically -->
                </div>
                <div class="modal-footer">
                    <button class="print-btn" onclick="printTable()">Print Report</button>
                    <button class="download-btn" onclick="downloadPDF()">Download PDF</button>
                </div>
            </div>
        </div>
</div>
</div>


        <!--APPOINTMENT DATA DISPLAY START-->
        <div class="appointment-card">
            <table class="table-fixed">
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Speciality</th>
                        <th>Doctor</th>
                        <th>Booking Date</th>
                        <th>Slot Time</th>
                        <th>Time of Booking</th>
                        <th>Slot Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="appointment-table-body">
                    <?php
                    include("submit_appointment.php");
                    $sql = "SELECT * FROM hmsappoint";
                    $data = mysqli_query($conn, $sql);
                    $total = mysqli_num_rows($data);

                    if($total != 0){
                        while($result = mysqli_fetch_assoc($data)){
                            echo "
                            <tr data-id='".$result['id']."'>
                                <td>".$result['id']."</td>
                                <td>".$result['fullname']."</td>
                                <td>".$result['email']."</td>
                                <td>".$result['gender']."</td>
                                <td>".$result['dob']."</td>
                                <td>".$result['address']."</td>
                                <td>".$result['contact']."</td>
                                <td>".$result['speciality']."</td>
                                <td>".$result['doctor']."</td>
                                <td>".$result['date']."</td>
                                <td>".$result['day_slot_time']."</td>
                                <td>".$result['slot_time']."</td>
                                <td>".$result['Current Time']."</td>
                                <td class='action-cell'>
                                     <button class='approve-btn' onclick='approveAppointment(".$result['id'].", \"".$result['email']."\")'>Approve</button>
                                    <button class='decline-btn' onclick='declineAppointment(".$result['id'].", \"".$result['email']."\")'>Decline</button>
                                </td>
                            </tr>
                            ";
                        } 
                    } else {
                        echo "<tr><td colspan='13'>No records found!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="doctorpanel.js"></script>
    <script>
        // Show/Hide filter options
        document.getElementById('filter-btn').addEventListener('click', function() {
            var filterOptions = document.getElementById('filter-options');
            filterOptions.style.display = filterOptions.style.display === 'none' ? 'block' : 'none';
        });

        // Apply Filter
        function applyFilter() {
            var patientId = document.getElementById('filter-patient-id').value.toLowerCase();
            var bookingDate = document.getElementById('filter-booking-date').value.toLowerCase();
            var speciality = document.getElementById('speciality').value.toLowerCase();
            var doctor = document.getElementById('doctor').value.toLowerCase();
            var slotTime = document.getElementById('filter-slot-time').value.toLowerCase();

            var rows = document.querySelectorAll('#appointment-table-body tr');
            
            rows.forEach(function(row) {
                var patientIdCell = row.cells[0].innerText.toLowerCase();
                var bookingDateCell = row.cells[9].innerText.toLowerCase();
                var specialityCell = row.cells[7].innerText.toLowerCase();
                var doctorCell = row.cells[8].innerText.toLowerCase();
                var slotTimeCell = row.cells[10].innerText.toLowerCase();

                if (
                    (patientId === '' || patientIdCell.includes(patientId)) &&
                    (bookingDate === '' || bookingDateCell.includes(bookingDate)) &&
                    (speciality === '' || specialityCell.includes(speciality)) &&
                    (doctor === '' || doctorCell.includes(doctor)) &&
                    (slotTime === '' || slotTimeCell.includes(slotTime))
                ) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        //dynamically change the doctor name by there speciality
        const doctors = {
        Cardiologist: ["Dr. Sumit Sharma", "Dr. Karan Veer", "Dr. Rajat Verma"],
        Dentist: ["Dr. Isha Malhotra", "Dr. Sunil Deh", "Dr. Digvijay Rathi"],
        General_Physician: ["Dr. Omkar Sharma", "Dr. Lovy Verma", "Dr. Sidharth Shukla"],
        Dermatologist: ["Dr. Meenakshi Reddy", "Dr. Arjun Malhotra", "Dr. Riya Sharma"],
        Neurologist: ["Dr. Sanjay Kumar", "Dr. Priya Gupta", "Dr. Ramesh Yadav"],
        Orthopedic: ["Dr. Vishal Singh", "Dr. Anjali Pandey", "Dr. Mohan Verma"],
        Pediatrician: ["Dr. Rakesh Jain", "Dr. Anuradha Das", "Dr. Ritu Agarwal"],
        Psychiatrist: ["Dr. Alok Mehta", "Dr. Sanjana Sharma", "Dr. Rajesh Bhatt"],
        Gynecologist: ["Dr. Neha Saini", "Dr. Priyanka Rao", "Dr. Archana Gupta"],
        Ophthalmologist: ["Dr. Vishnu Das", "Dr. Suman Mehta", "Dr. Rohit Kumar"],
        ENT_Specialist: ["Dr. Deepak Sharma", "Dr. Swati Chauhan", "Dr. Amit Gupta"],
        Oncologist: ["Dr. Suraj Yadav", "Dr. Kavita Roy", "Dr. Anand Gupta"],
        Urologist: ["Dr. Manoj Kumar", "Dr. Neeraj Singh", "Dr. Sumitra Yadav"],
        Nephrologist: ["Dr. Harish Verma", "Dr. Aarti Sharma", "Dr. Vikram Patel"],
        Endocrinologist: ["Dr. Pooja Sharma", "Dr. Ravi Sharma", "Dr. Ajay Singh"],
        Rheumatologist: ["Dr. Nisha Kapoor", "Dr. Anil Malhotra", "Dr. Rahul Verma"],
        Pulmonologist: ["Dr. Suresh Jain", "Dr. Aparna Gupta", "Dr. Rohit Sharma"],
        Gastroenterologist: ["Dr. Ankit Sharma", "Dr. Sunita Malhotra", "Dr. Rakesh Gupta"],
        Hematologist: ["Dr. Vinod Das", "Dr. Shweta Sharma", "Dr. Rahul Kumar"]
    };

    // Function to populate doctors based on the selected specialty
    function populateDoctors() {
        const specialitySelect = document.getElementById("speciality");
        const doctorSelect = document.getElementById("doctor");
        const selectedSpeciality = specialitySelect.value;

        // Clear existing doctor options
        doctorSelect.innerHTML = '<option value="" disabled selected>Select Doctor</option>';

        // Populate new doctor options
        if (selectedSpeciality && doctors[selectedSpeciality]) {
            doctors[selectedSpeciality].forEach(doctor => {
                const option = document.createElement("option");
                option.value = doctor;
                option.textContent = doctor;
                doctorSelect.appendChild(option);
            });
        }
    }

    // Function to validate if a specialty is selected before showing doctors
    function validateSpecialitySelection() {
        const specialitySelect = document.getElementById("speciality").value;
        if (!specialitySelect) {
            alert("Please select a specialty first before selecting a doctor.");
        }
    }
    </script>
</body>
</html>
