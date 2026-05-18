<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
require_once __DIR__ . '/db_connection.php';

$categorySql = "SELECT DISTINCT genre FROM Movies ORDER BY genre";
$categoryResult = $conn->query($categorySql);

if ($categoryResult && $categoryResult->num_rows > 0) {
    while ($categoryRow = $categoryResult->fetch_assoc()) {
        $category = $categoryRow["genre"];
        echo "<section>";
        echo "<h2>" . htmlspecialchars($category) . "</h2>";

        $moviesSql = "SELECT id, title, rating, length, thumbnail, summary, year, genre, submissionDate, active FROM Movies WHERE genre = '" . $conn->real_escape_string($category) . "'";
        $moviesResult = $conn->query($moviesSql);

        if ($moviesResult && $moviesResult->num_rows > 0) {
            echo "<ul>";
            while ($movie = $moviesResult->fetch_assoc()) {
                $movieUrl = "movie.php?id=" . urlencode($movie['id']);
                echo "<li>";
                echo "<strong><a href=\"" . htmlspecialchars($movieUrl) . "\">" . htmlspecialchars($movie['title']) . "</a></strong> (" . htmlspecialchars($movie['year']) . ") - " . htmlspecialchars($movie['rating']) . "/10";
                echo "<br>Lengte: " . htmlspecialchars($movie['length']) . " minuten";
                echo "<br>Summary: " . htmlspecialchars($movie['summary']);
                echo "<br><a href=\"" . htmlspecialchars($movieUrl) . "\">Bekijk details</a>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Geen films in deze categorie.</p>";
        }

        echo "</section>";
    }
} else {
    echo "<p>Geen categorieën gevonden.</p>";
}

$conn->close();
?>
</body>
</html>