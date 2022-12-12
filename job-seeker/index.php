<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Register</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="resource/css/bootstrap.css">
    <link rel="stylesheet" href="resource/css/custom.css">
</head>

<body>

    <br>
    <div class="container-fluid col-md-8 off-set-md-2 tform">
        <div class="sms"></div>
        <div class="col-md-4 offset-md-1">
            <form class="rform">
                <h4>Register</h4>
                <input type="text" id="name" placeholder="Enter Your Name">
                <input type="email" id="email" placeholder="Enter Your Email">
                <input type="password" id="pass" placeholder="Enter Your Password">
                <input type="password" id="cpass" placeholder="Confirm Your Password">
                <button type="submit" id="regbtn">Register</button>
            </form>
        </div>

        <div class="col-md-4 offset-md-1">
            <form action="exe/login.php" method="POST" class="lform">
                <h4>Login</h4>
                <input type="email" name="email" placeholder="Enter Your Email">
                <input type="password" name="pass" placeholder="Enter Your Password">
                <button type="submit" name="login">Login</button>
                <p>Forgot Password?<a href="reset-pass.php">reset password</a></p>
            </form>
        </div>

    </div>
    <br>
    <?php
    if (isset($_SESSION['success'])) {
    ?>
        <p class="alert alert-success"><?php echo $_SESSION['success']; ?></p>
    <?php
    }
    unset($_SESSION['success']);
    ?>

    <!-- error -->
    <?php
    if (isset($_SESSION['error'])) {
    ?>
        <p class="alert alert-danger"><?php echo $_SESSION['error']; ?></p>
    <?php
    }
    unset($_SESSION['error']);
    ?>

    <a href="../index.php" class="bh">Back Home</a>

    <br>
    <br>
    <br>
    <script src="resource/js/jquery.js"></script>
    <script src="resource/js/popper.js"></script>
    <script src="resource/js/bootstrap.js"></script>
    <script src="resource/js/reg.js"></script>
</body>

</html>