<?php
session_start();
if (empty($_SESSION['comemail'])) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload New Job</title>
    <?php include 'pages/head.php'; ?>
</head>

<body>
    <?php include 'pages/nav.php'; ?>
    <br>
    <div class="container">
        <div class="col-md-6 offset-md-3">

            <br>
            <h3 class="text-center">Upload New Job</h3>
            <br>
            <form id="uploadjob">
                <div class="mb-3">
                    <input type="text" placeholder="Job Title" id="title" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="Salary" id="salary" class="form-control">
                </div>
                <div class="mb-3">
                    <textarea name="" id="description" placeholder="Job Description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="Address" id="address" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="Phone" id="phone" class="form-control">
                </div>
                <input type="hidden" id="email" value="<?php echo $_SESSION['comemail']; ?>">
                <button class="btn btn-secondary ujbtn" type="submit">Upload</button>
            </form>
            <div class="sms"></div>
        </div>
    </div>
    <br>
    <?php include 'pages/footer.php'; ?>
    <script src="resource/js/job.js"></script>
</body>

</html>