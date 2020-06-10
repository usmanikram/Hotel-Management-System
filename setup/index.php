<?php

$file= '../config/config.php';
if(file_exists($file))
{
    header("Location: ../index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Setup · HMS</title>



    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../css/floating-labels.css" rel="stylesheet">
</head>
<body>
<form class="form-signin" action="check.php" method="post">
    <div class="text-center mb-4">
        <h1 class="">Hotel Management System</h1>
        <h2 class="">Setup Page</h2>

        <p>Enter The Database Details To Continue</p>
    </div>

    <div class="form-label-group">
        <input type="text" class="form-control" name="hostname" placeholder="Database Hostname" required autofocus>
        <label for="hostname">Database Hostname</label>
    </div>

    <div class="form-label-group">
        <input type="text" class="form-control" name="username" placeholder="Database Username" required autofocus>
        <label for="username">Database Username</label>
    </div>


    <div class="form-label-group">
        <input type="password" class="form-control" name="password" placeholder="Database Password">
        <label for="password">Database Password</label>
    </div>

    <div class="form-label-group">
        <input type="text" class="form-control" name="name" placeholder="Database Name" required autofocus>
        <label for="name">Database Name</label>
    </div>


    <button class="btn btn-lg btn-primary btn-block" type="submit">Next Setup</button>
    <?php
    if(isset($_GET["message"]))
    {
        $msg = $_GET["message"];
        echo "<b><p style='color: red'>$msg</p></b>";
    }
    ?>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
</form>
</body>
</html>
