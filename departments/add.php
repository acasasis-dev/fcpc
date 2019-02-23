<?php
	require "../requires.php";

	if( $_POST ) {
		$desc = $_POST[ "desc" ];

		$query = "
			insert into
				departments(
					ddesc
				) values(
					\"$desc\"
				)
		";

		if( $con->query( $query ) )
			header( "Location: /departments" );
	}
?>

<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h2>FCPC IRIS</h2>
                <h3>Add Department</h3>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input class="form-control item" type="text" id="desc" name="desc">
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