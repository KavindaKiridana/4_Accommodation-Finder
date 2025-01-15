<?php
//require '../config.php';
session_start();
$hasError = true;
if (isset($_SESSION['user_type']) && !empty($_SESSION['user_type'])) {
    $usertype = $_SESSION['user_type'];
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>jelly page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }





        p {
            color: white;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="navbar-fixed.css" rel="stylesheet">
</head>

<body>
    
    <div class="row">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <?php
                    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        echo "Welcome, $username !"; /* Center the welcome message */
                    } else {
                        // Handle the case where the session doesn't exist or is empty
                        echo "Not logged in"; /* Center the "not logged in" message */
                    }
                    ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <?php
                    switch ($usertype) {
                        case "admin":
                            require 'config.php';
                            ?>
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/addUser.php">Add User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/manage.php">Manage Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/seeUser.php">See Users</a>
                        </li>
                    </ul>
                            <?php
                            break;
                        case "student":
                            ?>
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../student/home.php">View Places</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../student/manage.php">Manage Account</a>
                        </li>
                    </ul>
                            <?php
                            break;
                        case "warden":
                            ?>
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../warden/home.php">View Accomodation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../warden/addUser.php">Add User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../warden/manage.php">Manage Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../warden/seeUser.php">See Users</a>
                        </li>
                    </ul>
                            <?php
                            break;
                        case "landlord":
                            ?>
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link " href="view.php">View Places</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addPlace.php">Add Places</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="orders.php">Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage.php">Manage Account</a>
                        </li>
                    </ul>
                            <?php
                            break;
                    }
                    ?>
                    <form class="d-flex" role="search" method="post" onsubmit="return handleLogout(event)">
    <button class="btn btn-outline-danger" type="submit">Logout</button>
</form>
                    <script>
function handleLogout(event) {
    event.preventDefault();
    const form = event.target;
    
    // Try the first path
    fetch('../logout.php')
        .then(response => {
            if (response.ok) {
                form.action = '../logout.php';
            } else {
                form.action = 'logout.php';
            }
            form.submit();
        })
        .catch(() => {
            form.action = 'logout.php';
            form.submit();
        });
    
    return false;
}
</script>
                </div>
            </div>
        </nav>
    </div>

    <main class="container">
        <!--your main content start-->
