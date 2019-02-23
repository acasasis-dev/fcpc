<?php
	require "../requires.php";

    $id = $_GET[ "id" ];
    $dataquery = "
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
                    a.eid=$id and
                    a.said=b.said and
                    b.sjid=c.sjid and
                    b.yasid=d.yasid and
                    d.cid=e.cid and
                    a.studid=f.pid
            ) g join persons h
        on
            g.profid=h.pid
    ";

    $data = $con->query( $dataquery )->fetch_assoc();

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

    $subjects = $con->query( $query );
    $students = $con->query( "select * from persons where ptype=2" );

	if( $_POST ) {
        $id = $_POST[ "id" ];
		$subject = $_POST[ "subject" ];
		$student = $_POST[ "student" ];

		$query = "
			update enrolled
                set
                    said=$subject,
                    studid=$student
                where
                    eid=$id
		";

		if( $con->query( $query ) )
			header( "Location: /enrolled" );
	}
?>

<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h2>FCPC IRIS</h2>
                <h3>Edit Enrolled</h3>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <label for="subject">Subject Assignation</label>
                        <select class="form-control item" id="subject" name="subject">
                        	<?php foreach( $subjects as $row ) { ?>
                        	<option value="<?= $row[ "said" ] ?>"<?= $data[ "said" ] == $row[ "said" ]? " selected": "" ?>><?= $row[ "sjdesc" ]. " - " .$row[ "ccode" ]. " " .$row[ "yasyear" ]. "-" .$row[ "yassection" ]. " - " .$row[ "plname" ]. ", " .$row[ "pfname" ]. " " .$row[ "pmname" ] ?></option>
                        	<?php } ?>
                        </select>
					</div>
					<div class="form-group">                      
                        <label for="student">Student</label>
                        <select class="form-control item" id="student" name="student">
                        	<?php foreach( $students as $row ) { ?>
                        	<option value="<?= $row[ "pid" ] ?>"<?= $data[ "pid" ] == $row[ "pid" ]? " selected": "" ?>><?= $row[ "plname" ]. ", " .$row[ "pfname" ]. " " .$row[ "pmname" ] ?></option>
                        	<?php } ?>
                        </select>
                    </div>                    
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Edit">
					</div>
				</form>
            </div>
        </div>
    </section>
</main>

<?php require "../footers/footer.php"; ?>