<!-- <?php
try {
    $msg = isset($_GET['m']) ? $_GET['m'] : null;
} catch (Exception $e) {
    // ignore
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
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
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        h3 {
            color: #17a2b8;
            margin-bottom: 20px;
            /* Add spacing for better readability */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-form">
                    <form action="login.php" method="post">
                        <h3>Login</h3>
                        <input type="text" name="email" placeholder="Enter your email" required><br>
                        <input type="password" name="password" placeholder="Enter your password" required><br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <p>
                            <?php
                            if (!empty($msg)) {
                                echo $msg;
                            }
                            ?>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFOnpD lijXkE93tSaT9ePWvYrYkJvGkUN05T16LFj/69VhNqR7EoZkJoogz"
        crossorigin="anonymous"></script>
</body>

</html> -->
<?php
try {
    $msg = isset($_GET['m']) ? $_GET['m'] : null;
} catch (Exception $e) {
    // ignore
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center text-primary mb-4">Login</h3>
                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?php if (!empty($msg)) : ?>
                                <div class="alert alert-info mt-3" role="alert">
                                    <?= htmlspecialchars($msg); ?>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFOnplijXkE93tSaT9ePWvYrYkJvGkUN05T16LFj/69VhNqR7EoZkJoogz"
        crossorigin="anonymous"></script>
</body>

</html>
