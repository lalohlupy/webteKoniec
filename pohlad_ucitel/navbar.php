<nav class="navbar  fixed-top navbar-expand-sm navbar-dark" style="background-color: darkred">
    <div class="container">
        <a href="#" class="navbar-brand mb-0 h1">Navbar</a><!--NAVBAR-->
        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="#" class="nav-link active">Define and Edit Exams</a>
                </li>
                <li class="nav-item active">
                    <a href="define_time_limit.php" class="nav-link">Define Time Limit for Exams</a>
                </li>
                <li class="nav-item active">
                    <a href="five_types_of.php" class="nav-link">Define 5 Types of Questions</a>
                </li>
                <li class="nav-item active">
                    <a href="check_student_activity.php" class="nav-link">Check Student Activity</a>
                </li>
                <li class="nav-item active">
                    <a href="check_submit_exams.php" class="nav-link">Chech Submited Exams</a>
                </li>
                <li class="nav-item active">
                    <a href="export_exams.php" class="nav-link">Export Exams</a>
                </li>
            </ul>
            <div>
                <span style="color: darkorange">LOGGED IN AS: <?php
                    session_start();

                    if (isset($_SESSION['meno_ucitelp'])) {
                        echo $_SESSION['meno_ucitelp'];
                    }
                    ?></span>
            </div>
        </div>
    </div>
</nav>
