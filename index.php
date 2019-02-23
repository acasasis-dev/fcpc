<?php
    require "headers/home_header.php";
?>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h2>FCPC Evaluation System</h2>
                    <h3></h3>
                    <p><small></small></p>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="hoy" name="submitmoto">
                    <div class="form-group">
                        <label for="jsonfile">Student ID Mo</label>
                        <input class="form-control item" type="text" id="stud_id" name="stud_id">
                    </div>
                    <div class="form-group"><input type="submit" class="btn btn-primary btn-block btn-lg" value="View Data"></div>
                </form>
            </div>
        </section>
    </main>
<?php require "footers/footer.php" ?>
