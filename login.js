const signUpButton = document.getElementById('signUpButton');
const signInButton = document.getElementById('signInButton');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signUp');
const recoverForm = document.getElementById('recoverPasswordForm'); // Recover password form
const resetForm = document.getElementById('resetPasswordForm'); // Reset password form
const recoverpass = document.getElementById('recover_password');

// Change into register page
signUpButton.addEventListener('click', function () {
    signInForm.style.display = "none";
    signUpForm.style.display = "block";
});

// Change into Sign in page
signInButton.addEventListener('click', function () {
    signInForm.style.display = "block";
    signUpForm.style.display = "none";
});


// Display the correct form based on the URL
document.addEventListener("DOMContentLoaded", function () {
    // Ensure only the active form is displayed
    if (window.location.href.includes("recover_password.php")) {
        recoverForm.style.display = "block";
        signInForm.style.display = "none";
        signUpForm.style.display = "none";
    }

    if (window.location.href.includes("reset_password.php")) {
        resetForm.style.display = "block";
        signInForm.style.display = "none";
        signUpForm.style.display = "none";
    }
});

