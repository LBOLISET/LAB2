// script.js

document.addEventListener('DOMContentLoaded', function () {
    // Getting the form element
    var form = document.querySelector('form');

    // Attaching a submit event listener to the form
    form.addEventListener('submit', function (event) {
        // Getting input values
        var movieName = document.querySelector('input[name="Movie"]').value.trim();
        var releaseYear = document.querySelector('input[name="Release Year"]').value.trim();
        var studio = document.querySelector('input[name="Ownership"]').value.trim();
        var director = document.querySelector('input[name="Director"]').value.trim();

        // Checking if all input fields are empty
        if (!movieName && !releaseYear && !studio && !director) {
            // If all fields are empty, prevent form submission and show an alert
            event.preventDefault();
            alert('Please fill at least one field before submitting.');
        }
    });
});
