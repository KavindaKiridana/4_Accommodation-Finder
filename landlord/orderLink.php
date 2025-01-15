<?php

require '../config.php';
try {
    $id = $_GET['id'];
    $sql = "UPDATE ordertable
SET status = 'accepted'
WHERE order_id ='$id'";
    $result = mysqli_query($conn, $sql);
    header("location:orders.php");
} catch (PDOException $e) {
    header("location:orders.php");
}
