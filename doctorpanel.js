//Appoint approve or decline
function sendAppointmentAction(id, email, action) {
    fetch('submit_appointment.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id=${id}&email=${email}&action=${action}`
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        // Update the button UI
        const row = document.querySelector(`tr[data-id="${id}"]`);
        if (action === 'approve') {
            row.querySelector('.action-cell').innerHTML = 
                '<button class="approve-btn" style="width:100%;">Approved</button>';
        } else {
            row.querySelector('.action-cell').innerHTML = 
                '<button class="decline-btn" style="width:100%;">Declined</button>';
        }
    })
    .catch(error => console.error('Error:', error));
}

function approveAppointment(id, email) {
    sendAppointmentAction(id, email, 'approve');
    alert("Appointment Approved and Email Sent!");
}

function declineAppointment(id, email) {
    sendAppointmentAction(id, email, 'decline');
    alert("Appointment Declined and Email Sent!");
}

/**************************************************************************************** */
// print the table or download the table data
const modal = document.getElementById("print-modal");

        // Open the modal
        document.getElementById("open-modal-btn").addEventListener("click", function () {
            const tableBody = document.querySelector("#appointment-table-body");
            const previewDiv = document.getElementById("print-table-preview");

            // Clone filtered rows into the preview
            previewDiv.innerHTML = "<table border='1'>" + tableBody.parentElement.innerHTML + "</table>";
            modal.style.display = "block";
        });

        // Close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Print the table
        function printTable() {
            const printContent = document.getElementById("print-table-preview").innerHTML;
            const newWindow = window.open("", "_blank");
            newWindow.document.write(`<html><head><title>Print Report</title></head><body>${printContent}</body></html>`);
            newWindow.document.close();
            newWindow.print();
        }

        // Download the table as PDF
        function downloadPDF() {
            const element = document.getElementById("print-table-preview");
            const opt = {
                margin: 1,
                filename: "appointment_report.pdf",
                image: { type: "jpeg", quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: "in", format: "letter", orientation: "landscape" },
            };

            html2pdf().set(opt).from(element).save();
        }

        // Close modal on outside click
        window.onclick = function (event) {
            if (event.target === modal) {
                closeModal();
            }
        };



/************************************************************************************* */
