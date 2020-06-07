
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Setup Step 2 · HMS</title>



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
<form class="form-signin" action="check2.php" method="post">
    <div class="text-center mb-4">
        <?php
        if(isset($_GET["message"]))
        {
            $msg = $_GET["message"];
            echo "<b><p style='color: red'>$msg</p></b>";
        }
        ?>
        <h1 class="">Almost Complete</h1>
        <h2 class="">Step 2</h2>

        <p>Enter Administrator Details</p>
    </div>

    <div class="form-label-group">
        <input type="text" class="form-control" name="name" placeholder="Adminstrator Name" required autofocus>
        <label for="name">Adminstrator Name</label>
    </div>

    <div class="form-label-group">
        <input type="email" class="form-control" name="email" placeholder="Adminstrator Email" required autofocus>
        <label for="email">Adminstrator Email</label>
    </div>


    <div class="form-label-group">
        <input type="password" class="form-control" name="password" placeholder="Adminstrator Password">
        <label for="password">Adminstrator Password</label>
    </div>



    <button class="btn btn-lg btn-primary btn-block" type="submit">Next Setup</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
</form>
</body>
</html>
