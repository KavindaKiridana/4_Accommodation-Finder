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
        /*   padding: 30px;
            border-radius: 5px;
            background-color: #343a40;*/
        /* Darker background for form */
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
    <div class="login-form">
        <form action="addUserX.php" method="post">
            <h3>Add User</h3>
            <input type="text" name="name" placeholder="enter name" required><br>
            <input type="text" name="phone" placeholder="enter phone number" required><br>
            <input type="text" name="email" placeholder="enter email" required><br>
            <input type="password" name="password" placeholder="enter password" required><br>
            <input type="password" name="password2" placeholder="confirm password" required><br>
            <select name="utype" id="catogry" placeholder="select your catogry" required class="a"><br>
                <option value="warden">waden</option>
                <option value="student">student</option>
                <option value="landlord">landload</option>
                <option value="admin">admin</option>
            </select><br>
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
        </form>
        <p>
            <?php
            for ($i = 0; $i < count($msg); $i++) {
                echo $msg[$i] . "<br>";
            }
            ?>
        </p>
    </div>
</div>
<!--your main content end-->
<!--footer-->
<?php
include ('../footer.php');
 ?>