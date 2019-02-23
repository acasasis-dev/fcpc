<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$courses = $con->query( "select * from courses" );
	$query = "
		select a.*, b.*
		from year_and_secs a join courses b
		on a.cid=b.cid and yasid=$id
	";
	$data = $con->query( $query )->fetch_assoc();

	if( $_POST ) {
		$cid = $_POST[ "cid" ];
		$year = $_POST[ "year" ];
		$section = $_POST[ "section" ];

		$query = "
			update year_and_secs
				set
					yasyear=$year,
					yassection=\"$section\",
					cid=$cid
				where
					yasid=$id
		";

		if( $con->query( $query ) )
			header( "Location: /year_and_secs" );
	}
?>

<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h3>FCPC IRIS</h3>
                <h1>Edit Year and Section</h1>
                <form method="POST" enctype="multipart/form-data">
                	<input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input class="form-control item" type="text" id="year" name="year" value="<?= $data[ "yasyear" ] ?>">
                    </div>
                    <div class="form-group">
                        <label for="section">Section</label>
                        <input class="form-control item" type="text" id="section" name="section" value="<?= $data[ "yassection" ] ?>">
                    </div>
                    <div class="form-group">
                        <label for="section">Course</label>
                        <select class="form-control item" id="cid" name="cid">
                        	<?php foreach( $courses as $row ) { ?>
                        	<option value="<?= $row[ "cid" ] ?>"<?= $data[ "cid" ] == $row[ "cid" ]? " selected": "" ?>><?= $row[ "cdesc" ] ?></option>
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