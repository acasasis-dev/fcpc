<?php
    require "../requires.php";

    $query = "
        select
            a.*,
            b.*
        from
            courses a join
            departments b
        on
            b.did=a.did
    ";
    $data = $con->query( $query );
?>
<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h2>Human Resource Information System</h2>
                <h3>View Employees</h3>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/courses/add.php'">Add Course</button></div>
                </div>
                    <table class='table table-striped' id='bwahaha'>
                        <thead>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Department</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach( $data as $row ) { ?>
                            <tr>
                                <td><?= $row[ "cid" ] ?></td>
                                <td><?= $row[ "ccode" ] ?></td>
                                <td><?= $row[ "cdesc" ] ?></td>
                                <td><?= $row[ "ddesc" ] ?></td>
                                <td>
                                    <a href="/courses/edit.php?id=<?= $row[ "cid" ] ?>">Edit</a>
                                    <a href="/courses/delete.php?id=<?= $row[ "cid" ] ?>">Delete</a>
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


