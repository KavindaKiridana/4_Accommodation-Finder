<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);


    $sql = "SELECT password FROM User WHERE email = '$email' ";
    $result = mysqli_query($conn, $sql);
    $verify = false;
    while ($row = mysqli_fetch_assoc($result) and !$verify) {
        $verify = password_verify($password, $row['password']);
    }

    if ($verify) {
        //find the username type of the current user
        $sql = "SELECT utype,username,user_id FROM User WHERE email = '$email' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $utype = $row['utype'];
        $username = $row['username'];
        $user_id = $row['user_id'];

        //session values
        $_SESSION['utype'] = $utype;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_type']=$utype;

        //redirect the user to correct page
        switch ($utype) {
            case "admin":
                header("location:admin/home.php");
                break;
            case "student":
                header("location:student/home.php");
                break;
            case "warden":
                header("location:warden/home.php");
                break;
            case "landlord":
                header("location:landlord/home.php");
                break;
        }
    } else {
        $msg = "invalid email address or password.please try again.";
        $msg = urlencode($msg);
        header("location:index.php?m=$msg");
    }
}
//123 is the default password for all users 

