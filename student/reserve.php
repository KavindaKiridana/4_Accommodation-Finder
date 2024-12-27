<?php
require '../config.php';
session_start();
$hasError = true;

//get student id
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $hasError = false;
}

//get accomodation id
if (isset($_GET["id"])) {
    $rentid = $_GET["id"];
} else {
    $hasError = false;
}

//gert real date and time
$currentDateTime = date('Y-m-d H:i:s');

if ($hasError) {
    $sql = "insert into ordertable (student_id,accommodation_id,reservation_date) values('$user_id','$rentid','$currentDateTime') ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:home.php");
    } else {
        header("Location:home.php");
    }
}

