<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$data = $con->query( "select * from persons where pid=$id and ptype=2" )->fetch_assoc();

	if( $_POST ) {
		$id = $_POST[ "id" ];
		$code = $_POST[ "code" ];
		$fname = $_POST[ "fname" ];
		$mname = $_POST[ "mname" ];
		$lname = $_POST[ "lname" ];

		$query = "
			update persons
				set
					pcode=\"$code\",
					pfname=\"$fname\",
					pmname=\"$mname\",
					plname=\"$lname\"
				where
					pid=$id and ptype=2
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
                <h3>Edit Student</h3>
                <form method="POST" enctype="multipart/form-data">
                	<input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input class="form-control item" type="text" id="code" name="code" value="<?= $data[ "pcode" ] ?>">
                    </div>
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input class="form-control item" type="text" id="fname" name="fname" value="<?= $data[ "pfname" ] ?>">
                    </div>
                    <div class="form-group">
                        <label for="mname">Middle Name</label>
                        <input class="form-control item" type="text" id="mname" name="mname" value="<?= $data[ "pmname" ] ?>">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input class="form-control item" type="text" id="lname" name="lname" value="<?= $data[ "plname" ] ?>">
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