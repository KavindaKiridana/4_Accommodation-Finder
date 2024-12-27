<!--header-->
<?php include ('../header.php');
$msg = [];
?>
<!--body-->
<style>
    body {
        background-color: #121212;
        color: #ffffff;
    }

    .login-form {
        max-width: 350px;
        margin: 0 auto;
    }

    .login-form input[type="text"],
    .login-form input[type="password"],
    .a {
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    h3 {
        color: #17a2b8;
        margin-bottom: 20px;
    }

    p {
        color: white;
    }
</style><br><br><br>
<div class="row">
    <div class="col-md-6">
        <div class="login-form">
            <form action="manageX.php" method="post" id="form">
                <h3>Change Password</h3>
                <input type="password" name="password" placeholder="Enter old password" required><br>
                <input type="password" name="password2" id="password2" placeholder="Enter new password" required><br>
                <input type="password" name="password3" id="password3" placeholder="Confirm password" required><br>
                <input type="hidden" name="action" value="change_password">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="login-form">
            <form action="manageX.php" method="post">
                <h3>Change Username</h3>
                <input type="text" name="name" placeholder="Enter new name" required><br>
                <input type="hidden" name="action" value="change_username">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('form').onsubmit = function (event) {
        var password2 = document.getElementById('password2').value;
        var password3 = document.getElementById('password3').value;
        if (password2 === password3) {
            // No need to prevent default behavior when passwords match
        } else {
            alert("Passwords do not match");
            event.preventDefault(); // Prevent form submission when passwords do not match
        }
    }
</script>
<!--your main content end-->
<?php
include ('../footer.php');
 ?>