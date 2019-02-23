<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$data = $con->query( "select * from subjects where sjid=$id" )->fetch_assoc();

	if( $_POST ) {
		$id = $_POST[ "id" ];
		$code = $_POST[ "code" ];
		$desc = $_POST[ "desc" ];

		$query = "
			update subjects
				set
					sjcode=\"$code\",
					sjdesc=\"$desc\"
				where
					sjid=$id
		";

		if( $con->query( $query ) )
			header( "Location: /subjects" );
	}
?>

<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h2>FCPC IRIS</h2>
                <h3>Edit Subject</h3>
                <form method="POST" enctype="multipart/form-data">
                	<input type="hidden" name="id" value="<?= $id ?>">
                	<div class="form-group">
                        <label for="code">Code</label>
                        <input class="form-control item" type="text" id="code" name="code" value="<?= $data[ "sjcode" ] ?>">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input class="form-control item" type="text" id="desc" name="desc" value="<?= $data[ "sjdesc" ] ?>">
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