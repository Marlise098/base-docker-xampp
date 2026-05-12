<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$servername = "mysql_db";
$username = "root";
$password = "root";
$dbname = "streamflix";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT id, title, rating, length, thumbnail, summary, year, genre, submissionDate, active FROM Movies";
// Execute the SQL query
$result = $conn->query($sql);

// Process the result set
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Title: " . $row["title"]. " - Rating: " . $row["rating"]. " - Length: " . $row["length"]. " - Thumbnail: " . $row["thumbnail"]. " - Summary: " . $row["summary"]. " - Year: " . $row["year"]. " - Genre: " . $row["genre"]. " - Submission Date: " . $row["submissionDate"]. " - Active: " . $row["active"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();

?>
</body>
</html>