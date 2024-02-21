document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('searchForm').addEventListener('submit', function (event) {
        // Prevent form submission
        event.preventDefault();

        // Validate search terms
        var movie = document.getElementById('movie').value.trim();
        var year = document.getElementById('year').value.trim();
        var studio = document.getElementById('studio').value.trim();
        var director = document.getElementById('director').value.trim();

        // Check if at least one search term is provided
        if (!movie && !year && !studio && !director) {
            alert('Please provide at least one search term.');
            return;
        }

        // Check if year is numeric and within acceptable range
        if (year && (!/^\d+$/.test(year) || parseInt(year) < 1900 || parseInt(year) > new Date().getFullYear())) {
            alert('Please enter a valid release year between 1900 and the current year.');
            return;
        }

        // If all validations pass, submit the form
        this.submit();
    });
});
