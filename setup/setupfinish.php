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
        <h2 class="">Setup Finished</h2>

        <?php
        if(isset($_GET["message"]))
        {
            $msg = $_GET["message"];
            echo "<b><h2 style='color: red'>$msg</h2></b>";
        }
        ?>
        <p>Redirecting in 5 Seconds</p>
        <?php
        header( "refresh:5;url=../employeelogin.php" );
        ?>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
</form>
</body>
</html>
