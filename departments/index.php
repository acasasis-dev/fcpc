<?php
    require "../requires.php";

    $data = $con->query( "select * from departments" );
?>
<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h2>FCPC</h2>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/departments/add.php'">Add Department</button></div>
                </div>
                    <table class='table table-striped' id='bwahaha'>
                        <thead>
                            <th>ID</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach( $data as $row ) { ?>
                            <tr>
                                <td><?= $row[ "did" ] ?></td>
                                <td><?= $row[ "ddesc" ] ?></td>
                                <td>
                                    <a href="/courses?id=<?= $row[ "did" ] ?>">Courses</a>
                                    <a href="/departments/edit.php?id=<?= $row[ "did" ] ?>">Edit</a>
                                    <a href="/departments/delete.php?id=<?= $row[ "did" ] ?>">Delete</a>
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


