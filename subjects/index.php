<?php
    require "../requires.php";

    $query = "select * from subjects";
    $data = $con->query( $query );
?>
<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h1>FCPC</h1>
                <h3>View Subjects</h3>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/subjects/add.php'">Add Subjects</button></div>
                </div>
                    <table class='table table-striped' id='bwahaha'>
                        <thead>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach( $data as $row ) { ?>
                            <tr>
                                <td><?= $row[ "sjid" ] ?></td>
                                <td><?= $row[ "sjcode" ] ?></td>
                                <td><?= $row[ "sjdesc" ] ?></td>
                                <td>
                                    <a href="/subjects/edit.php?id=<?= $row[ "sjid" ] ?>">Edit</a>
                                    <a href="/subjects/delete.php?id=<?= $row[ "sjid" ] ?>">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require "../footers/footer.php"; ?>


