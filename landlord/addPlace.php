<?php
include('../header.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    //JS code for event handler
    $hasError = false;
}


?>
<style>
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
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    h3 {
        color: #17a2b8;
        margin-bottom: 20px;
    }
</style>
<div class="login-form">
    <form action="addPlaceX.php" method="post">
        <h3>Add place details</h3>
        <input type="text" name="title" placeholder="title" required><br>
        <input type="text" name="detail" placeholder="description" required><br>
        <input type="text" name="address" placeholder="address" required><br>
        <input type="submit" name="submit" value="next" class="btn btn-primary">
    </form>
</div>
<br>
<a href="home.php" class="btn btn-success">go back</a>

<!--your main content end-->
<!--footer--><?php
include('../footer.php');
?>
