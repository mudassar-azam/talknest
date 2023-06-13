// Comment section ajax of blogs

// Get the form element

var form = document.getElementById('commentForm');

// Add event listener for form submission
form.addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    // Create an instance of FormData and populate it with form data
    var formData = new FormData(form);

    // Create an instance of XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Set up the request
    xhr.open(form.method, form.action, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    // Define the callback function when the request is complete
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Reset the form fields
                form.reset();
                // Display a success message to the user using SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Comment added successfully.',
                });
            } else {
                // Display an error message to the user using SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error: ' + response.message,
                });
            }
        }
    };

    // Send the request
    xhr.send(formData);
});


//End  Comment section ajax of blogs

//show comment without page refresh

