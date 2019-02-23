<?php
error_reporting(0);
require "db.php";
require "midwares/index.php";
?>

<?php
    require "headers/main_header.php"; ?>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h2>FCPC Evaluation System</h2>
                    <h3></h3>
                    <p><small></small></p>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/departments'">Departments</button></div>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/courses'">Courses</button></div>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/professors'">Professors</button></div>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/students'">Students</button></div>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/subjects'">Subjects</button></div>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/subject_assignations'">Subject Assignations</button></div>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/year_and_secs'">Year and Sections</button></div>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/enrolled'">Enrolled Subjects</button></div>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/questions'">Questions</button></div>                
            </div>
        </section>
    </main>
    <?php require "footers/footer.php"; ?>
