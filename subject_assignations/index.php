<?php
    require "../requires.php";

    $query = "
        select
            a.*, b.*, c.*,
            d.*, e.*
        from
            subject_assignations a join
            subjects b join
            year_and_secs c join
            courses d join
            persons e
        on
            a.sjid=b.sjid and
            a.yasid=c.yasid and
            c.cid=d.cid and
            a.profid=e.pid and
            e.ptype=1
    ";

    $data = $con->query( $query );
?>
<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h1>FCPC</h1>
                <h3>View Subject Assignations</h3>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/subject_assignations/add.php'">Add Subject Assignations</button></div>
                </div>
                    <table class='table table-striped' id='bwahaha'>
                        <thead>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Year and Section</th>
                            <th>Professor</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach( $data as $row ) { ?>
                            <tr>
                                <td><?= $row[ "said" ] ?></td>
                                <td><?= $row[ "sjcode" ]. " - " .$row[ "sjdesc"] ?></td>
                                <td><?= $row[ "ccode" ]. " " .$row[ "yasyear" ]. "-" .$row[ "yassection" ] ?></td>
                                <td><?= $row[ "plname" ]. ", " .$row[ "pfname" ]. " " .$row[ "pmname" ] ?></td>
                                <td>
                                    <a href="/subject_assignations/edit.php?id=<?= $row[ "said" ] ?>">Edit</a>
                                    <a href="/subject_assignations/delete.php?id=<?= $row[ "said" ] ?>">Delete</a>
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


