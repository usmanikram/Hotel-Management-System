<?php
$file= 'config/config.php';
if(file_exists($file))
{
    require_once ('config/config.php');
}
else
{
    header("Location: setup/index.php");
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
    <title>Hotel Management System</title>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">

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
    <link href="css/cover.css" rel="stylesheet">
</head>
<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">HMS</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="index.php">Home</a>
                <a class="nav-link" href="customerlogin.php">Customer Login</a>
                <a class="nav-link" href="employeelogin.php">Employee Login</a>
                <a class="nav-link" href="adminlogin.php">Admin Login</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Hotel Management System</h1>
        <h3 >Premier Hotel Management Solutions</h3>

    </main>

    <section class="search-sec">

        <div class="container">
            <p class="lead">Enter the following details to check room availability.</p>

            <form action="availability.php" method="post" >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" onfocus="(this.type='date')" name="startdate" class="form-control search-slt" placeholder="Checkin Date" required>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input type="text" onfocus="(this.type='date')" name="enddate" class="form-control search-slt" placeholder="Checkout Date" required>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">

                                <select class="form-control search-slt" name="capacity" required>
                                    <option>No. of Guests</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <button type="submit" class="btn btn-danger wrn-btn">Check Availability</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p><a href="index.php">&copy; Copyright 2020, Hotel Management System.</a></p>
        </div>
    </footer>
</div>
</body>
</html>
