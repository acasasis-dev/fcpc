<?php
    require "../requires.php";

?>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h2>FCPC Evaluation System</h2>
                    <h3></h3>
                    <p><small></small></p>
                </div>
                <form method="GET" action="/profs/stats.php">
                    <div class="form-group">
                        <label for="jsonfile">Professor ID</label>
                        <input class="form-control item" type="text" id="id" name="id">
                    </div>
                    <div class="form-group"><input type="submit" class="btn btn-primary btn-block btn-lg" value="View Data"></div>
                </form>
            </div>
        </section>
    </main>
<?php require "../footers/footer.php" ?>
