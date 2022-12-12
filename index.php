<?php
session_start();
require_once('company/db.php');
$select = "SELECT * FROM jobs ORDER BY id DESC LIMIT 3";
$connect = mysqli_query($dbcon, $select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Job Portal - PHP, AJAX , MYSQLI</title>
    <?php include 'pages/head.php'; ?>
</head>

<body>
    <?php include 'pages/nav.php'; ?>

    <div class="bg">
        <h1>Are You looking for job or employees?</h1>
        <a href="" class="btn btn-outline-info">Company</a> &nbsp;&nbsp;
        <a href="" class="btn btn-outline-secondary">Job Seeker</a>
    </div>

    <br>

    <div class="container">
        <div class="col-md-6 offset-md-3">
            <input type="search" id="searchjob" placeholder="Search By Job Title" class="form-control">
            <div class="svalue"></div>
        </div>
    </div>
    <br>
    <br>
    <h4 class="jl">Job Lists</h4>

    <br>
    <hr class="hr1">

    <div class="row row-cols-1 row-cols-md-3 g-4 mcard" id="joblist">

        <?php
        if (mysqli_num_rows($connect) > 0) {
        ?>
            <?php
            while ($job = mysqli_fetch_assoc($connect)) {
            ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $job['title']; ?></h5> &nbsp;&nbsp;
                            <p>&nbsp;&nbsp;<?php echo $job['address']; ?></p>
                            <p class="card-text">Description -<br>
                                <?php echo substr($job['description'], 0, 120); ?></p>
                            <a href="detail.php?jobid=<?php echo $job['id']; ?>">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php
                $lastid = $job['id'];
            }
            ?>
        <?php
        } else {
        ?>
            <h3 class="text-center">No Post</h3>
        <?php
        }
        ?>

        <br>
        
        <button class="btn btn-secondary" data-id="<?php echo $lastid; ?>" id="morejob">Load More Job</button>
        

    </div>

    <br>

    <div class="container-fluid"></div>

    <?php include 'pages/footer.php'; ?>
    <script src="resource/js/morejob.js"></script>


</body>

</html>