<?php
	require "../requires.php";
	$courses = $con->query( "select * from courses" );

	if( $_POST ) {
		$year = $_POST[ "year" ];
		$section = $_POST[ "section" ];
		$cid = $_POST[ "cid" ];

		$query = "
			insert into
				year_and_secs(
					yasyear,
					yassection,
					cid
				) values(
					$year,
					\"$section\",
					$cid
				)
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
                <h1>Add Year and Section</h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input class="form-control item" type="text" id="year" name="year">
                    </div>
                    <div class="form-group">
                        <label for="section">Section</label>
                        <input class="form-control item" type="text" id="section" name="section">
                    </div>
                    <div class="form-group">
                        <label for="section">Course</label>
                        <select class="form-control item" id="cid" name="cid">
                        	<?php foreach( $courses as $row ) { ?>
                        	<option value="<?= $row[ "cid" ] ?>"><?= $row[ "cdesc" ] ?></option>
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