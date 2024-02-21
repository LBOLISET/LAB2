<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';
    
    $movie_name = $_POST["Movie"];
    $year = $_POST["Release_Year"];
    $studio = $_POST["Ownership"];
    $director = $_POST["Director"];

    // Query to fetch distinct years available in the database
    $year_query = "SELECT DISTINCT `Release Year` FROM `MARVEL`";
    $year_result = mysqli_query($conn, $year_query);
    $available_years = array();
    while ($row = mysqli_fetch_assoc($year_result)) {
        $available_years[] = $row['Release Year'];
    }

    // Check if the entered year is available in the database
    if (!empty($year) && !in_array($year, $available_years)) {
        echo "There are no MARVEL movies released in that year";
        exit();
    }

    $sql = "SELECT * FROM `MARVEL` WHERE 
    (Movie LIKE '%$movie_name%') AND
    (`Release Year` LIKE '%$year%') AND
    (Ownership LIKE '%$studio%') AND
    (Director LIKE '%$director%')";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Movie that match your request are:</h1>";
        // Initialize HTML table
        $html = "<html><head><link rel='stylesheet' type='text/css' href='search_style.css'></head><body><table border='1'><tr><th>Movie</th><th>Release Year</th><th>Ownership</th><th>Director</th></tr>";

        // Loop through the result and populate the HTML table
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= "<tr><td><a href='detail.php?movieName=" . urlencode($row['Movie']) . "'>" . $row['Movie'] . "</a></td><td>" . $row['Release Year'] . "</td><td>" . $row['Ownership'] . "</td><td>" . $row['Director'] . "</td></tr>";
        }
        
        // Close the HTML table
        $html .= "</table></body></html>";
        echo $html;
    } else {
        echo "No results";
    }
    exit();
}

$conn->close();
?>
