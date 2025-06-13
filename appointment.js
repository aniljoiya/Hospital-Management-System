// For Appointmnet
document.addEventListener("DOMContentLoaded", () => {
    const appointmentBtn = document.getElementById("appointmentBtn");
    const appointmentForm = document.getElementById("appointmentForm");
    const closeForm = document.getElementById("closeForm");
    const slotsContainer = document.getElementById("slots");
    const submitButton = document.getElementById('submit-btn')



    // Open the form
    appointmentBtn.addEventListener("click", () => {
        appointmentForm.style.display = "block";
    });

    // Close the form
    closeForm.addEventListener("click", () => {
        appointmentForm.style.display = "none";
    });

    submitButton.addEventListener("click",() =>{
        alert("Form is submitted successful")
    })

});


// code for time slots of specility/doctor and morning/evening
// Doctor Speciality Options
var commonValues = {
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



// Update Doctor Dropdown Based on Speciality
function changeDropDownValue(value) {
    var doctorDropdown = document.getElementById("doctor");
    if (value.length === 0) {
        doctorDropdown.innerHTML = "<option value='' disabled selected>Select Doctor</option>";
    } else {
        var options = "<option value='' disabled selected>Select Doctor</option>";
        for (var i = 0; i < commonValues[value].length; i++) {
            options += "<option>" + commonValues[value][i] + "</option>";
        }
        doctorDropdown.innerHTML = options;
    }
}

// Alert User for Doctor Dropdown without Speciality
document.getElementById("doctor").addEventListener("mousedown", function (e) {
    var speciality = document.getElementById("speciality").value;
    if (!speciality) {
        e.preventDefault();
        alert("Please select a speciality first before choosing a doctor.");
    }
});

document.getElementById("slot_time").addEventListener("mousedown", function (e) {
    var speciality = document.getElementById("day_slot_time").value;
    if (!speciality) {
        e.preventDefault();
        alert("Please select a Morning/Evening first before choosing a Available Slots.");
    }
});


// Check the slot booked or not if not then print a message
// Populate slots based on the selected time slot (morning/evening)
function changeTimeSlot(slotType) {
    const slotGrid = document.getElementById('slotGrid');
    const morningSlots = [
        "9:00-9:15 AM", "9:15-9:30 AM", "9:30-9:45 AM", "9:45-10:00 AM",
        "10:00-10-15 AM", "10:15-10:30 AM", "10:30-10:45 AM", "10:45-11:00 AM"
    ];
    const eveningSlots = [
        "5:00:5:15 PM", "5:15-5:30 PM", "5:30-5:45 PM", "5:45-6:00 PM",
        "6:00-6:15 PM", "6:15-6:30 PM", "6:30-6:45 PM", "6:45-7:00 PM"
    ];

    // Clear existing slots
    slotGrid.innerHTML = '';

    // Populate slots based on selected slot type
    const slots = slotType === 'Morning_Slot' ? morningSlots : eveningSlots;
    slots.forEach(slot => {
        const slotBrick = document.createElement('div');
        slotBrick.className = 'slot-brick';
        slotBrick.textContent = slot;
        slotBrick.onclick = () => selectSlot(slotBrick); // Add click functionality
        slotGrid.appendChild(slotBrick);
    });
}

// Handle slot selection
function selectSlot(slotElement) {
    // Deselect previously selected slot
    const previouslySelected = document.querySelector('.slot-brick.selected');
    if (previouslySelected) {
        previouslySelected.classList.remove('selected');
    }

    // Mark the clicked slot as selected
    slotElement.classList.add('selected');

    // Update the hidden input with the selected slot value
    const selectedSlotInput = document.getElementById('selectedSlot');
    selectedSlotInput.value = slotElement.textContent;
}



///-----------------
