<nav class="navbar navbar-expand-lg navbar-light mynav">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Myanmar Dev Job Portal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post-job.php">Post New Job</a>
                </li>

                <?php
                if (empty($_SESSION['comemail']) && empty($_SESSION['seekemail'])) {
                ?>
                    <form class="d-flex">
                        <a href="company" class="btn btn-outline-info">Company</a> &nbsp;&nbsp;
                        <a href="job-seeker" class="btn btn-outline-secondary">Job Seeker</a>
                    </form>
                <?php
                } else {
                ?>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php
                }
                ?>
            </ul>

        </div>
    </div>
</nav>