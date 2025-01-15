<?php

// Initialize the session
session_start();
// Include database configuration
require '../config.php';
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Check if ID parameter exists in URL
if (isset($_GET['id'])) {
    $accommodation_id = mysqli_real_escape_string($conn, $_GET['id']);
    $user_id = $_SESSION['user_id'];
// Verify that this accommodation belongs to the logged-in landlord
    $verify_query = "SELECT landlord_id FROM rent WHERE accommodation_id = '$accommodation_id' AND landlord_id = '$user_id'";
    $verify_result = mysqli_query($conn, $verify_query);
    if (mysqli_num_rows($verify_result) > 0) {
    // Begin transaction
        mysqli_begin_transaction($conn);
        try {
        // First delete related images from img table
            $delete_images = "DELETE FROM img WHERE accommodation_id = '$accommodation_id'";
            mysqli_query($conn, $delete_images);
        // Then delete the accommodation record
            $delete_accommodation = "DELETE FROM rent WHERE accommodation_id = '$accommodation_id'";
            mysqli_query($conn, $delete_accommodation);
        // If both queries successful, commit transaction
            mysqli_commit($conn);
        // Set success message in session
            $_SESSION['delete_success'] = "Record deleted successfully";
        } catch (Exception $e) {
        // If any query fails, rollback changes
            mysqli_rollback($conn);
            $_SESSION['delete_error'] = "Error deleting record: " . $e->getMessage();
        }
    } else {
        $_SESSION['delete_error'] = "You don't have permission to delete this record";
    }
} else {
    $_SESSION['delete_error'] = "Invalid request";
}

// Redirect back to view.php
header("Location: view.php");
exit();
