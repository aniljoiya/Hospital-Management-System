<?php
//Another part of the code for check book slot and insert data into the database 

$host = "localhost";
$user = "root";
$pass = "";
$db = "appointment_system";
$conn = new mysqli($host, $user, $pass, $db); 

if ($conn->connect_error) {
    echo "Failed to connect to database: " . $conn->connect_error;
}

// Slot availability check
$bookedSlots = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $speciality = $_POST['speciality'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $day_slot_time = $_POST['day_slot_time'];
    $slot_time = $_POST['slot_time'];

    // Check if the selected slot is already booked
    $checkSlotSql = "SELECT `slot_time` FROM `hmsappoint` WHERE `date` = '$date' AND `doctor` = '$doctor' AND `day_slot_time` = '$day_slot_time'";
    $resultCheck = mysqli_query($conn, $checkSlotSql);

    while ($row = mysqli_fetch_assoc($resultCheck)) {
        $bookedSlots[] = $row['slot_time']; // Store booked slots for the selected doctor and date
    }

    // If slot is available, insert the appointment
    if (!in_array($slot_time, $bookedSlots)) {
        $sql = "INSERT INTO `hmsappoint` (`fullname`, `email`, `gender`, `dob`, `address`, `contact`, `speciality`, `doctor`, `date`, `day_slot_time`, `slot_time`) 
                VALUES ('$fullname', '$email', '$gender', '$dob', '$address', '$contact', '$speciality', '$doctor', '$date', '$day_slot_time', '$slot_time')";
        
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Appointment booked Request sent wait for the email confirmation!');</script>";
        } else {
            echo "<script>alert('Error booking appointment. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('The selected slot is already booked. Please choose another one.');</script>";
    }
}


//--------------------------------------------------------------



