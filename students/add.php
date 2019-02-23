<?php
	require "../requires.php";

	if( $_POST ) {
		$code = $_POST[ "code" ];
		$fname = $_POST[ "fname" ];
		$mname = $_POST[ "mname" ];
		$lname = $_POST[ "lname" ];

		$query = "
			insert into
				persons(
					pcode,
					pfname,
					pmname,
					plname,
					ptype
				) values(
					\"$code\",
					\"$fname\",
					\"$mname\",
					\"$lname\",
					2
				)
		";

		if( $con->query( $query ) )
			header( "Location: /students" );
	}
?>

<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h1>FCPC IRIS</h1>
                <h3>Add Student</h3>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input class="form-control item" type="text" id="code" name="code">
                    </div>
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input class="form-control item" type="text" id="fname" name="fname">
                    </div>
                    <div class="form-group">
                        <label for="mname">Middle Name</label>
                        <input class="form-control item" type="text" id="mname" name="mname">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input class="form-control item" type="text" id="lname" name="lname">
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