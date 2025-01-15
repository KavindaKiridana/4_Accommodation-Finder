<?php

require '../config.php';
$msg = [];
$verified = true;
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
$utype = mysqli_real_escape_string($conn, $_POST['utype']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
//varification parts

if ($password !== $password2) {
    $msg[] = "Password confirmation does not match.";
    $verified = false;
}

//email should be unique
$sql = "SELECT email FROM User WHERE email = '$email' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $msg[] = "Email address already exists.";
    $verified = false;
}

//now user will be registered
if ($verified) {
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "insert into User (username, email, password,phone,utype) values ('$name', '$email', '$password', '$phone', '$utype')";
    try {
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo " <script>alert('successfully registered');</script> ";
            echo " <script>window.location.href = 'addUser.php';</script> ";
        } else {
            $msg[] = "failed to register";
            echo "<script>alert('";
            foreach ($msg as $x) {
                echo addslashes($x) . "\\n";
            // Escape special characters and add new line
            }
            echo "');</script>";
            echo " <script>window.location.href = 'addUser.php';</script> ";
        }
    } catch (mysqli_sql_exception $e) {
        $msg[] = $e->getMessage();
        echo "<script>alert('";
        foreach ($msg as $x) {
            echo addslashes($x) . "\\n";
        }
        echo "');</script>";
        echo " <script>window.location.href = 'addUser.php';</script> ";
    }
} else {
    $msg[] = "failed to register";
    echo "<script>alert('";
    foreach ($msg as $x) {
        echo addslashes($x) . "\\n";
    }
    echo "');</script>";
    echo " <script>window.location.href = 'addUser.php';</script> ";
}
