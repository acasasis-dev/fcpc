<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
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
        	a.said=$id and
            a.sjid=b.sjid and
            a.yasid=c.yasid and
            c.cid=d.cid and
            a.profid=e.pid and
            e.ptype=1
	";
	$data = $con->query( $query )->fetch_assoc();

	$subjects = $con->query( "select * from subjects" );
	$yasquery = "
		select a.*, b.*
		from year_and_secs a join courses b
		on a.cid=b.cid
	";
	$year_and_secs = $con->query( $yasquery );
	$profs = $con->query( "select * from persons where ptype=1" );

	if( $_POST ) {
		$id = $_POST[ "id" ];
		$subject = $_POST[ "subject" ];
		$year_and_sec = $_POST[ "year_and_sec" ];
		$prof = $_POST[ "prof" ];

		$query = "			
			update subject_assignations
				set
					sjid=$subject,
					yasid=$year_and_sec,
					profid=$prof
				where
					said=$id
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
                <h3>Edit Subject Assignation</h3>
                <form method="POST" enctype="multipart/form-data">
                	<input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select class="form-control item" id="subject" name="subject">
                        	<?php foreach( $subjects as $row ) { ?>                        	
                        	<option value="<?= $row[ "sjid" ] ?>"<?= $data[ "sjid" ] == $row[ "sjid" ]? " selected": "" ?>><?= $row[ "sjcode" ]. " - " .$row[ "sjdesc" ] ?></option>
                        	<?php } ?>
                        </select>
                        <label for="year_and_sec">Year and Section</label>
                        <select class="form-control item" id="year_and_sec" name="year_and_sec">
                        	<?php foreach( $year_and_secs as $row ) { ?>                        	
                        	<option value="<?= $row[ "yasid" ] ?>"<?= $data[ "yasid" ] == $row[ "yasid" ]? " selected": "" ?>><?= $row[ "ccode" ]. " " .$row[ "yasyear" ]. "-" .$row[ "yassection" ] ?></option>
                        	<?php } ?>
                        </select>
                        <label for="prof">Professor</label>
                        <select class="form-control item" id="prof" name="prof">
                        	<?php foreach( $profs as $row ) { ?>                        	
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