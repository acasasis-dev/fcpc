<?php
    require "../headers/home_header.php";
    require "../db.php";

    $id = $_GET[ "id" ];
    $prof = $con->query( "select * from persons where pcode=$id" )->fetch_assoc();

    $query = "
        select
            count( a.eid ) as count,
            a.answer
        from
            answers a join
            enrolled b join
            subject_assignations c join
            persons d
        on
            a.eid=b.eid and
            b.said=c.said and
            c.profid=d.pid and
            c.profid=$id and
            a.qid!=1
        group by
            a.answer
    ";
?>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h1>FCPC Evaluation System</h1>
                    <h4>Statistics of: <?= $prof[ "plname" ]. ", " .$prof[ "pfname" ]. " " .$prof[ "pmname" ] ?></h4>
                    <p><small></small></p>
                </div>                
            </div>
        </section>
    </main>
<?php require "../footers/footer.php" ?>
