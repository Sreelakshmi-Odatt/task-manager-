/*
file name: script.js 
Student name: Sreelakshmi Odatt Venu
Description:  This JavaScript code defines functions to show an alert and redirect the user, and to validate that two password fields match during form submission, preventing form submission if they do not match.
*/

function showAlert(message, destination) {
    alert(message);
    window.location.href = destination;
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelector('.user-registration-form').addEventListener('submit', function (event) {
        if (!validatePasswords()) {
            event.preventDefault();
          
        
        }
    });
});

function validatePasswords() {
    const password1 = document.getElementById('password1').value;
    const password2 = document.getElementById('password2').value;

    if (password1 !== password2) {
       
        alert('Passwords do not match. Please try again.');
        return false;
    }

    return true;
}
