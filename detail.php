<?php
include 'db.php';

// Retrieve movie name from the URL
$movieName = $_GET["movieName"];

// Query the database to get details of the selected movie
$sql = "SELECT * FROM `MARVEL` WHERE Movie = '$movieName'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Display detailed information about the selected movie
    echo "<html><head><link rel='stylesheet' type='text/css' href='detail_style.css'></head><body>";
    echo "<h1>Movie Details</h1>";
    echo "<div class='movie-details'>";
    echo "<p><strong>Movie Name:</strong> " . $row['Movie'] . "</p>";
    echo "<p><strong>Release Date:</strong> " . $row['Release Date'] . "</p>";
    echo "<p><strong>Release Month:</strong> " . $row['Release Month'] . "</p>";
    echo "<p><strong>Release Day:</strong> " . $row['Release Day'] . "</p>";
    echo "<p><strong>Release Year:</strong> " . $row['Release Year'] . "</p>";
    echo "<p><strong>Ownership:</strong> " . $row['Ownership'] . "</p>";
    echo "<p><strong>Director:</strong> " . $row['Director'] . "</p>";
    echo "<p><strong>Domestic Box office Collections:</strong> " . number_format($row['Domestic Box Office'] / 1000000,2) ." millions". "</p>";
    echo "<p><strong>(Inflation) Adjusted Domestic Box office Collections:</strong> " . number_format($row['Inflation Adjusted Domestic'] / 1000000,2) ." millions" . "</p>";
    echo "<p><strong>International Box office Collections:</strong> " . number_format($row['International Box Office'] / 1000000,2) ." millions" . "</p>";
    echo "<p><strong>(Inflation) Adjusted International Box office Collections:</strong> " . number_format($row['Inflation Adjusted International'] / 1000000,2) ." millions" . "</p>";
    echo "<p><strong>Worldwide Box office Collections:</strong> " . number_format($row['Worldwide Box Office'] / 1000000,2) ." millions" . "</p>";
    echo "<p><strong>(Inflation) Adjusted Worldwide Box office Collections:</strong> " . number_format($row['Inflation Adjusted Worldwide'] / 1000000,2) ." millions" . "</p>";
    echo "<p><strong>Opening Weekend Collections:</strong> " . number_format($row['Opening Weekend'] / 1000000,2) ." millions" . "</p>";
    echo "<p><strong>(Inflation) Adjusted Opening Weekend Box office Collections:</strong> " . number_format($row['Inflation Adjusted Opening Weekend'] / 1000000,2) ." millions" . "</p>";
    echo "<p><strong>Budget of the movie:</strong> " . number_format($row['Budget'] / 1000000,2) ." millions" . "</p>";
    echo "<p><strong>(Inflation) Adjusted Budget:</strong> " . number_format($row['Inflation Adjusted Budget'] / 1000000,2) ." millions" . "</p>";
    echo "<p><strong>IMDb Score:</strong> " . $row['IMDb Score'] . "</p>";
    echo "<p><strong>Meta Score:</strong> " . $row['Meta Score'] . "</p>";
    echo "<p><strong>Tomatometer score:</strong> " . $row['Tomatometer'] . "</p>";
    echo "<p><strong>Rotten Tomato Audience Score:</strong> " . $row['Rotten Tomato Audience Score'] . "</p>";
    echo "<p><strong>Total Movie Duration:</strong> " . $row['Run Time In Minutes'] ." minutes". "</p>";
    echo "<p><strong>Phase:</strong> " . $row['Phase'] . "</p>";
    echo "</div>";
    echo "</body></html>";
} else {
    echo "Movie not found";
}

$conn->close();
?>
