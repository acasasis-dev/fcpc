<?php
    require "../requires.php";

    $data = $con->query( "select * from questions" );
?>
<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h1>FCPC</h1>
                <h3>View Questions</h3>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/questions/add.php'">Add Question</button></div>
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
                                <td><?= $row[ "qid" ] ?></td>
                                <td><?= $row[ "qdesc" ] ?></td>
                                <td>
                                    <a href="/questions/edit.php?id=<?= $row[ "qid" ] ?>">Edit</a>
                                    <a href="/questions/delete.php?id=<?= $row[ "qid" ] ?>">Delete</a>
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


