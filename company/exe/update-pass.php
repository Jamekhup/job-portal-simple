<?php

if (isset($_GET['resetpasskey'])) {

    $key = $_GET['resetpasskey'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Your Password</title>
    </head>

    <body>
        <div class="rpform">
            <form action="reset-pass-final.php" method="POST">
                <input type="password" name="pass" placeholder="New Password">
                <input type="password" name="cpass" placeholder="Confirm New Password">
                <input type="hidden" name="key" value="<?php echo $key; ?>">
                <button id="rspass" name="submit" onclick="sendtob()">Reset Pass</button>
            </form>
        </div>

    </body>


    </html>



<?php
} else {
    header("Location:../../index.php");
}


?>