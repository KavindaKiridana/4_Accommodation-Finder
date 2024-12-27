<?php
require '../config.php';
session_start();
$msg = [];
$hasError = true;

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $hasError = false;
}
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
} else {
    $hasError = false;
}

if ($hasError) {
    if (isset($_POST['submit'])) {
        if (isset($_POST['action']) && $_POST['action'] === 'change_password') {
            // Process password change form data

            $oldPassword = $_POST['password'];
            $oldPasswordHash = password_hash($oldPassword, PASSWORD_BCRYPT); // Hash the old password
            $sql = "SELECT password FROM User WHERE email = '$email' ";
            $result = mysqli_query($conn, $sql);
            $verify = false;
            while ($row = mysqli_fetch_assoc($result)) {
                $verify = password_verify($oldPassword, $row['password']); // Compare hashed old password with stored hashed password
                if ($verify) {
                    break; // Break the loop once the password is verified
                }
            }

            if ($verify) {
                $newPassword = $_POST['password2'];
                $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT); // Hash the new password
                $sql = "UPDATE user SET password='$newPasswordHash' WHERE user_id='$id'";
                try {
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo " <script>alert('successfully changed password');</script> ";
                        echo " <script>window.location.href = 'manage.php';</script> ";
                    }
                } catch (Exception $e) {
                    echo "<script>alert('";
                    echo $e;
                    echo "');</script>";
                }
            } else {
                echo " <script>alert('wrong password.Please try again');</script> ";
                echo "<script>window.location.href = 'manage.php';</script>";
            }
        } else if (isset($_POST['action']) && $_POST['action'] === 'change_username') {
            // Process username change form data
            $newName = $_POST['name'];
            $sql = "update user set username='$newName' where user_id='$id'";
            try {
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo " <script>alert('successfully changed username');</script> ";
                    echo " <script>window.location.href ='manage.php';</script> ";
                } else {
                    echo " <script>alert('error occurred');</script> ";
                    echo "<script>window.location.href ='manage.php';</script>";
                }
            } catch (Exception $e) {
                echo "<script>alert('";
                echo $e;
                echo "');</script>";
                echo " <script>window.location.href ='manage.php';</script> ";
            }
        }
    }
} else {
    echo " <script>alert('an error occurred while session. Please try again');</script> ";
    echo "<script>window.location.href = 'manage.php';</script>";
}
