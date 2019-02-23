<?php
	require "../requires.php";

	$subjects = $con->query( "select * from subjects" );
	$yasquery = "
		select a.*, b.*
		from year_and_secs a join courses b
		on a.cid=b.cid
	";
	$year_and_secs = $con->query( $yasquery );
	$profs = $con->query( "select * from persons where ptype=1" );

	if( $_POST ) {
		$subject = $_POST[ "subject" ];
		$year_and_sec = $_POST[ "year_and_sec" ];
		$prof = $_POST[ "prof" ];

		$query = "
			insert into
				subject_assignations(
					sjid,
					yasid,
					profid
				) values(
					$subject,
					$year_and_sec,
					$prof
				)
		";

		if( $con->query( $query ) )
			header( "Location: /subject_assignations" );
	}
?>

<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h2>FCPC IRIS</h2>
                <h3>Add Subject Assignation</h3>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select class="form-control item" id="subject" name="subject">
                        	<?php foreach( $subjects as $row ) { ?>                        	
                        	<option value="<?= $row[ "sjid" ] ?>"><?= $row[ "sjcode" ]. " - " .$row[ "sjdesc" ] ?></option>
                        	<?php } ?>
                        </select>
                        <label for="year_and_sec">Year and Section</label>
                        <select class="form-control item" id="year_and_sec" name="year_and_sec">
                        	<?php foreach( $year_and_secs as $row ) { ?>                        	
                        	<option value="<?= $row[ "yasid" ] ?>"><?= $row[ "ccode" ]. " " .$row[ "yasyear" ]. "-" .$row[ "yassection" ] ?></option>
                        	<?php } ?>
                        </select>
                        <label for="prof">Professor</label>
                        <select class="form-control item" id="prof" name="prof">
                        	<?php foreach( $profs as $row ) { ?>                        	
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