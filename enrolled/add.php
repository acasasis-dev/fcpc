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

    $subjects = $con->query( $query );
    $students = $con->query( "select * from persons where ptype=2" );

	if( $_POST ) {
		$subject = $_POST[ "subject" ];
		$student = $_POST[ "student" ];

		$query = "
			insert into
				enrolled( said, studid )
				values( $subject, $student )
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
                <h3>Add Enrolled</h3>
                <form method="POST" enctype="multipart/form-data">                    
                    <div class="form-group">
                        <label for="subject">Subject Assignation</label>
                        <select class="form-control item" id="subject" name="subject">
                        	<?php foreach( $subjects as $row ) { ?>
                        	<option value="<?= $row[ "said" ] ?>"><?= $row[ "sjdesc" ]. " - " .$row[ "ccode" ]. " " .$row[ "yasyear" ]. "-" .$row[ "yassection" ]. " - " .$row[ "plname" ]. ", " .$row[ "pfname" ]. " " .$row[ "pmname" ] ?></option>
                        	<?php } ?>
                        </select>
					</div>
					<div class="form-group">                      
                        <label for="student">Student</label>
                        <select class="form-control item" id="student" name="student">
                        	<?php foreach( $students as $row ) { ?>
                        	<option value="<?= $row[ "pid" ] ?>"><?= $row[ "plname" ]. ", " .$row[ "pfname" ]. " " .$row[ "pmname" ] ?></option>
                        	<?php } ?>
                        </select>
                    </div>                    
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Add">
					</div>
				</form>
            </div>
        </div>
    </section>
</main>

<?php require "../footers/footer.php"; ?>