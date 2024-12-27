<?php
require '../config.php';
session_start();
$hasError = true;

if (isset($_SESSION['accommodation_id'])) {
    $accommodation_id = $_SESSION['accommodation_id'];
} else {
    $hasError = false;
    //error:accommodation_id not found(latitude,longitude)

}

if ($hasError) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $lat = $_POST['lat'];
        $lon = $_POST['lon'];

        $sql = "UPDATE rent SET latitude='$lat', longitude='$lon' WHERE accommodation_id='$accommodation_id'";
        try {
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('saved successfully');</script>";
                echo "<script>window.location.href = 'home.php';</script>"; // Redirect using JavaScript

            }
        } catch (Exception $e) {
            $msg = "Error: " . $e->getMessage();
            echo "<script>alert('error occurred');</script>";
            echo "<script>window.location.href = 'home.php';</script>"; // Redirect using JavaScript
        }
    }
} else {
    echo " <script>alert('an error occured while session');</script> ";
    echo "<script>window.location.href = 'home.php';</script>";
}

