<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company user password reset</title>
    <link rel="stylesheet" href="resource/css/bootstrap.css">
    <link rel="stylesheet" href="resource/css/custom.css">
</head>

<body>
    <br>
    <br>
    <div class="container">
        <div class="col-md-4 offset-md-4">
            <h3 class="text-center">Enter Your Email to reset password</h3>
            <div class="sms"></div>
            <br>
            <form id="resetpass">
                <div class="mb-3">
                    <input type="email" id="email" class="form-control" placeholder="Enter Your Email">
                </div>
                <button id="resbtn" class="btn btn-secondary" type="submit">Request Link</button>
            </form>
        </div>
    </div>
    <br>
    <br>


    <script src="resource/js/jquery.js"></script>
    <script src="resource/js/popper.js"></script>
    <script src="resource/js/bootstrap.js"></script>
    <script src="resource/js/resetpass.js"></script>

</body>

</html>