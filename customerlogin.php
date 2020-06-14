<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Customer Login - HMS</title>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
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
    <link href="css/floating-labels.css" rel="stylesheet">
</head>
<body>
<form class="form-signin" action="verifycustomer.php" method="post">
    <div class="text-center mb-4">
        <h1 >Customer Login</h1>
        <h4>Enter Your Credentials</h4>
    </div>
    <?php
    if(isset($_GET["message"]))
    {
        $msg = $_GET["message"];
        echo "<b><p style='color: red'>$msg</p></b>";
    }
    ?>
    <div class="form-label-group">
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="email">Email address</label>
    </div>

    <div class="form-label-group">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <label for="password">Password</label>
    </div>


    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <button class="btn btn-lg btn-primary btn-block" type="button" onclick="location.href='customersignup.php';">Register</button>
    <button class="btn btn-lg btn-primary btn-block" type="button" onclick="goBack();">Go Back</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
</form>
</body>
</html>
