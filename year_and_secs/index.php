<?php
    require "../requires.php";

    if( $_GET[ "id" ] )
        $id = $_GET[ "id" ];

    $query = "
        select a.*, b.*
        from year_and_secs a join courses b
        on a.cid=b.cid
    ";

    if( $id ) $query = $query. " and a.cid=$id";
    $data = $con->query( $query );
?>
<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h1>FCPC</h1>
                <h3>View Year and Sections</h3>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/year_and_secs/add.php'">Add Year and Section</button></div>
                </div>
                    <table class='table table-striped' id='bwahaha'>
                        <thead>
                            <th>ID</th>
                            <th>Course</th>
                            <th>Year and Section</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach( $data as $row ) { ?>
                            <tr>
                                <td><?= $row[ "yasid" ] ?></td>
                                <td><?= $row[ "ccode" ]. " - " .$row[ "cdesc" ] ?></td>
                                <td><?= $row[ "yasyear" ]. " - " .$row[ "yassection" ] ?></td>
                                <td>
                                    <a href="/year_and_secs/edit.php?id=<?= $row[ "yasid" ] ?>">Edit</a>
                                    <a href="/year_and_secs/delete.php?id=<?= $row[ "yasid" ] ?>">Delete</a>
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


