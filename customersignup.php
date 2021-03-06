<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Customer Sign Up - HMS</title>



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
<form class="form-signin" action="model/customer/signup/add.php" method="post">
    <div class="text-center mb-4">
        <h1>Customer Sign Up</h1>
        <h4>Fill Out The  Form To Sign Up</h4>
        <p style='color: red'>* Fields are required</p>
    </div>
    <?php
    if(isset($_GET["message"]))
    {
        $msg = $_GET["message"];
        echo "<b><p style='color: red'>$msg</p></b>";
    }
    ?>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Name <b style='color: red'>*</b></label>
            <input type="text" class="form-control" name="name" placeholder="Customer Name" required>
        </div>
        <div class="form-group col-md-6">
            <label for="dob">DOB <b style='color: red'>*</b></label>
            <input type="text" onfocus="(this.type='date')" class="form-control" name="dob" placeholder="Date of Birth" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="gender">Gender <b style='color: red'>*</b></label>
            <select class="form-control" name="gender" required>
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="cnic">CNIC <b style='color: red'>*</b></label>
            <input type="text" class="form-control" name="cnic" placeholder="Citizen National Identity Card Number" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="contact">Contact <b style='color: red'>*</b></label>
            <input type="text" class="form-control" name="contact" placeholder="Customer Contact Number" required>
        </div>
    </div>
    <div class="form-group">
        <label for="address">Address <b style='color: red'>*</b></label>
        <input type="text" class="form-control" name="address" placeholder="Customer Address" required>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">Email <b style='color: red'>*</b></label>
            <input type="email" class="form-control" name="email" placeholder="Customer Email" required>
        </div>
        <div class="form-group col-md-6">
            <label for="password">Password <b style='color: red'>*</b></label>
            <input type="password" class="form-control" name="password" placeholder="Customer Password" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="ccno">Credit Card Number</label>
            <input type="text" class="form-control" name="ccno" placeholder="Customer Credit Card Number">
        </div>
        <div class="form-group col-md-6">
            <label for="ccexpiry">Credit Card Expiry</label>
            <input type="text" onfocus="(this.type='date')" class="form-control" name="ccexpiry" placeholder="Credit Card Expiry Date">
        </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" >Register</button>
    <button class="btn btn-lg btn-primary btn-block" type="button" onclick="goBack();">Go Back</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; Copyright 2020, Hotel Management System.</p>
</form>
</body>
</html>
