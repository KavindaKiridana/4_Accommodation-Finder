<?php
require '../config.php';
session_start();
$hasError = true;




try {
    $id = $_GET['id'];
    $approved = $_POST['approve'];
    $sql = "UPDATE rent SET approve = '$approved' WHERE  accommodation_id= '$id' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('";
        echo $approved . " successfully";
        echo "');</script>";
        echo "<script>window.location.href = 'home.php';</script>"; // Redirect using JavaScript
        exit;
    }
} catch (Exception $e) {
    $msg = "Error: " . $e->getMessage();
    echo "<script>alert('error occurred');</script>";
    echo "<script>window.location.href = 'home.php';</script>"; // Redirect using JavaScript
    exit;
}