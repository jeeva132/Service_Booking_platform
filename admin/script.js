// script.js
document.addEventListener('DOMContentLoaded', function() {
    const sidehome = document.querySelector('#sidehome');
    const sidebookings = document.querySelector('#sidebookings');
    const sidemessage = document.querySelector('#sidemessage');
    const container1 = document.querySelector('.container1');
    const container2 = document.querySelector('.container2');
    const container3 = document.querySelector('.container3');

    // Set the initial state: Display container1 and hide container2 and container3
    container1.style.display = 'block';
    container2.style.display = 'none';
    container3.style.display = 'none';

    sidehome.addEventListener('click', function(e) {
        e.preventDefault();
        container1.style.display = 'block';
        container2.style.display = 'none';
        container3.style.display = 'none';
    });

    sidebookings.addEventListener('click', function(e) {
        e.preventDefault();
        container1.style.display = 'none';
        container2.style.display = 'block';
        container3.style.display = 'none';
    });

    sidemessage.addEventListener('click', function(e) {
        e.preventDefault();
        container1.style.display = 'none';
        container2.style.display = 'none';
        container3.style.display = 'block';
    });

    // Add event listeners for other buttons as needed
});
