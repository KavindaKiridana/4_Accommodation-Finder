<?php
include ('../header.php');
require '../config.php';
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Credentials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head> -->
<br/>
<body class="bg-dark text-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Change Password Form -->
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="manageX.php" method="post" id="form">
                            <h3 class="text-center text-primary mb-4">Change Password</h3>
                            <div class="mb-3">
                                <label for="password" class="form-label">Old Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter old password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password2" class="form-label">New Password</label>
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Enter new password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password3" class="form-label">Confirm New Password</label>
                                <input type="password" name="password3" id="password3" class="form-control" placeholder="Confirm password" required>
                            </div>
                            <input type="hidden" name="action" value="change_password">
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Change Username Form -->
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="manageX.php" method="post">
                            <h3 class="text-center text-primary mb-4">Change Username</h3>
                            <div class="mb-3">
                                <label for="name" class="form-label">New Username</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter new name" required>
                            </div>
                            <input type="hidden" name="action" value="change_username">
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('form').onsubmit = function (event) {
            var password2 = document.getElementById('password2').value;
            var password3 = document.getElementById('password3').value;
            if (password2 !== password3) {
                alert("Passwords do not match");
                event.preventDefault();
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFOnpDlijXkE93tSaT9ePWvYrYkJvGkUN05T16LFj/69VhNqR7EoZkJoogz"
        crossorigin="anonymous"></script>
</body>

</html>
