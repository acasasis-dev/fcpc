<?php
	error_reporting(0);
	require "../db.php";

	$id = $_GET[ "id" ];


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
                    a.studid=f.pid and
                    f.pcode=$id and
                    f.ptype=2 and
                    a.eid not in (
                        select distinct( eid ) from answers
                    )
            ) g join persons h
        on
            g.profid=h.pid
    ";

    $name = "No results";
    if( $id = (int)$id ) {
        if( is_integer( $id ) ) {
        	$data = $con->query( "select * from persons where pcode=$id and ptype=2" )->fetch_assoc();
        	$name = !$data? "No results": $data[ "plname" ]. ", " .$data[ "pfname" ]. " " .$data[ "pmname" ];
        	$subjects = $con->query( $query );
        }
    }
?>

<?php
    require "../headers/home_header.php"; ?>
    <main class="page contact-page">
        <section class="portfolio-block contact">
            <div class="container">
                <div class="heading">
                    <h1>FCPC Evaluation System</h1>
                    <h4>Subjects Of: <?= $name ?></h4>
                    <p><small></small></p>
                </div>
                <?php foreach( $subjects as $row ) { ?>
                <div class="form-group"><button class="btn btn-primary btn-block btn-lg" onclick="window.location = '/evaluation/evaluate.php?id=<?= $row[ "eid" ] ?>&code=<?= $id ?>'"><?= $row[ "sjdesc" ]. " - " .$row[ "ccode" ]. " " .$row[ "yasyear" ]. "-" .$row[ "yassection" ]. " - " .$row[ "proflname" ]. ", " .$row[ "proffname" ]. " " .$row[ "profmname" ] ?></button></div>
                <?php } ?>
            </div>
        </section>
    </main>
    <?php require "../footers/footer.php"; ?>
