<?php

if (isset($_GET['jobid'])) {
    session_start();
    require_once('company/db.php');
    $id = $_GET['jobid'];
    $select = "SELECT * FROM jobs WHERE id ='$id' LIMIT 1";
    $connect = mysqli_query($dbcon, $select);
} else {
    header("Location:index.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "pages/head.php" ?>
    <title>Detail</title>
</head>

<body>
    <?php include 'pages/nav.php'; ?>
    <br>
    <?php
    if (mysqli_num_rows($connect) > 0) {
        $detail = mysqli_fetch_assoc($connect);
    ?>
        <div class="detail">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $detail['title']; ?></h5> &nbsp;&nbsp;

                    <hr class="hr">
                    <p>&nbsp;&nbsp;&nbsp;<?php echo $detail['salary']; ?></p>

                    <p>&nbsp;&nbsp;&nbsp;<?php echo $detail['phone']; ?></p>
                    <p>&nbsp;&nbsp;&nbsp;<?php echo $detail['address']; ?></p>
                    <p class="card-text">Description -<br>
                        <?php echo stripcslashes($detail['description']); ?></p>
                    <!-- Button trigger modal -->
                    <?php
                    if (!empty($_SESSION['seekemail'])) {
                    ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Apply Now
                        </button>&nbsp;&nbsp;&nbsp; <button class="btn btn-info" onclick="window.history.back()">Back</button>
                    <?php
                    } else {
                    ?>
                        <button class="btn btn-secondary">Login to Apply this job</button>
                        &nbsp;&nbsp;&nbsp; <button class="btn btn-info" onclick="window.history.back()">Back</button>
                    <?php
                    }
                    ?>



                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="applyform">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Your Name">

                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Your Email">

                                        </div>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Enter Your Number">

                                        </div>
                                        <p>Upload CV Form</p>
                                        <div class="mb-3">
                                            <input type="file" class="form-control" name="cv" aria-describedby="emailHelp" placeholder="Choose File">

                                        </div>
                                        <input type="hidden" name="comemail" value="<?php echo $detail['comemail']; ?>">
                                        <button type="submit" class="btn btn-primary applybtn">Apply Now</button>
                                    </form>
                                    <br>
                                    <div class="applysms"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <?php include 'pages/footer.php'; ?>
    <script src="resource/js/apply.js"></script>
</body>

</html>