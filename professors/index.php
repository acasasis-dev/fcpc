<?php
    require "../requires.php";

    $data = $con->query( "select * from persons where ptype=1" );
?>
<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h1>FCPC</h1>
                <h3>View Professors</h3>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/professors/add.php'">Add Professor</button></div>
                </div>
                    <table class='table table-striped' id='bwahaha'>
                        <thead>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach( $data as $row ) { ?>
                            <tr>
                                <td><?= $row[ "pid" ] ?></td>
                                <td><?= $row[ "pcode" ] ?></td>
                                <td><?= $row[ "plname" ]. ", " .$row[ "pfname" ]. " " .$row[ "pmname" ] ?></td>
                                <td>
                                    <a href="/professors/edit.php?id=<?= $row[ "pid" ] ?>">Edit</a>
                                    <a href="/professors/delete.php?id=<?= $row[ "pid" ] ?>">Delete</a>
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


