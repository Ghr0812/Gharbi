// Handling the form submission
const form = document.getElementById('assignment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    // Display a confirmation message (in real application, handle server-side logic)
    alert('Assignment Submitted Successfully!');

    // Hide the upload form and show feedback section
    document.querySelector('.upload-section').style.display = 'none';
    document.getElementById('feedback-section').style.display = 'block';
});