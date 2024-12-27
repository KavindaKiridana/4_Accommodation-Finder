<?php
require '../config.php'; 

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch locations from the database
$sql = "SELECT title, latitude, longitude , accommodation_id  FROM rent where approve='approved' or approve='pending' "; // Select only the necessary columns
$result = $conn->query($sql);

$locations = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $locations[] = array($row["title"], $row["latitude"], $row["longitude"], $row["accommodation_id"]);
    }
} else {
    echo "0 results";
}
$conn->close();

echo json_encode($locations);