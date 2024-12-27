<?php
require '../config.php';
session_start();
$hasError = true;

if (isset ($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    //JS code for event handler
    $hasError = false;
}

//data storing at database
if (isset ($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);



    //validation part
    // Check for empty fields
    if (empty ($title) || empty ($detail) || empty ($address)) {
        $hasError = false;
        echo "<script>alert('Please enter all the fields');</script>";
    }

    if ($hasError) {
        $sql = "insert into rent (landlord_id,title,description,address,approve) values ('$user_id','$title','$detail','$address','pending')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // Get the ID of the inserted record
            $accommodation_id = mysqli_insert_id($conn);
            $_SESSION['accommodation_id'] = $accommodation_id;

            //echo " <script>alert('Successfully added with ID: $accommodation_id');</script> ";
            header('location:addPhoto.php');
        } else {
            echo " <script>alert('error');</script> ";
            echo " <script>window.location.href = 'addPlace.php';</script> ";
        }
    }
}