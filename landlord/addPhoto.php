<?php
include('../header.php');

//find the accommodation id

?>
<style>
    h3 {
        color: #17a2b8;
        margin-bottom: 20px;
        /* Add spacing for better readability */
    }

    .login-form {
        max-width: 350px;
        margin: 0 auto;
        /*   padding: 30px;
            border-radius: 5px;
            background-color: #343a40;*/
        /* Darker background for form */
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .btn {
        margin-top: 10px;
    }
</style>
<div class="login-form">

    <form action="addPhotoX.php" action="post" method="post" enctype="multipart/form-data">
        <h3>add photo</h3>
        <input type="file" name="file" required><br>
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Add Photo</button>
    </form>
</div>
<a href="addPlace.php" class="btn btn-success">go back</a>

<!--your main content end-->
<!--footer--><?php
include('../footer.php');
?>
