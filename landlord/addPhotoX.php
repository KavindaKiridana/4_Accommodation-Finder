<?php
require '../config.php';
session_start();
$hasError = true;

if (isset($_SESSION['accommodation_id'])) {
    $accommodation_id = $_SESSION['accommodation_id'];
} else {
    $hasError = false;
    //error:accommodation_id not found
    echo " <script>alert('an error occured while session');</script> ";
}

//image sent to the folder and it's path save at database
if (isset($_POST['submit'])) {
    if ($_FILES['file']['error'] === 4) {
        echo " <script>alert('Image doesn't exist');</script> ";
    } else {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];

        $validImageExtension = ['jpg', 'jpeg', 'png', 'gif'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo " <script>alert('Invalid image extension');</script> ";
            echo " <script>window.location.href = 'addPhoto.php';</script> ";
        } else {
            $newImageName = uniqid();
            $newImageName .= "." . $imageExtension;

            move_uploaded_file($fileTmpName, 'img/' . $newImageName);
            $sql = "insert into img(accommodation_id,img) values('$accommodation_id','$newImageName')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                ?>
                <script>
                    if (confirm("Image uploaded successfully! Want to add another photo?")) {
                        // User clicked "Yes" - redirect to addPhoto.php 
                        window.location.href = 'addPhoto.php';
                    } else {
                        // User clicked "No" - redirect to map.php
                        window.location.href = "map.php";
                    }
                </script>
                <?php
            } else {
                echo " <script>alert('An error occured,Please try again');</script> ";
                echo " <script>window.location.href = 'addPhoto.php';</script> ";
            }
        }
    }
}
