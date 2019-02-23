<?php
    require "../requires.php";

    $query = "
        select
            h.pfname as proffname,
            h.pmname as profmname,
            h.plname as proflname,
            g.*
        from
            (
                select
                    a.eid, b.said, b.profid, c.*,
                    d.yasyear, d.yassection, e.*, f.*
                from
                    enrolled a join
                    subject_assignations b join
                    subjects c join
                    year_and_secs d join
                    courses e join
                    persons f
                on
                    a.said=b.said and
                    b.sjid=c.sjid and
                    b.yasid=d.yasid and
                    d.cid=e.cid and
                    a.studid=f.pid
            ) g join persons h
        on
            g.profid=h.pid
    ";
    $data = $con->query( $query );
?>
<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h1>FCPC</h1>
                <h3>View Enrolled</h3>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/enrolled/add.php'">Add enrolled</button></div>
                </div>
                    <table class='table table-striped' id='bwahaha'>
                        <thead>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Year and Section</th>
                            <th>Professor</th>
                            <th>Student</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach( $data as $row ) { ?>
                            <tr>
                                <td><?= $row[ "eid" ] ?></td>
                                <td><?= $row[ "sjdesc" ] ?></td>
                                <td><?= $row[ "ccode" ]. " " .$row[ "yasyear" ]. "-" .$row[ "yassection" ] ?></td>
                                <td><?= $row[ "proflname" ]. ", " .$row[ "proffname" ]. " " .$row[ "profmname" ] ?></td>
                                <td><?= $row[ "plname" ]. ", " .$row[ "pfname" ]. " " .$row[ "pmname" ] ?></td>
                                <td>
                                    <a href="/enrolled/edit.php?id=<?= $row[ "eid" ] ?>">Edit</a>
                                    <a href="/enrolled/delete.php?id=<?= $row[ "eid" ] ?>">Delete</a>
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


