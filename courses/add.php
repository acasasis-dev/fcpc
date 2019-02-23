<?php
	require "../requires.php";

	$departments = $con->query( "select * from departments" );

	if( $_POST ) {
		$code = $_POST[ "code" ];
		$desc = $_POST[ "desc" ];
		$department = $_POST[ "department" ];

		$query = "
			insert into
				courses(
					ccode,
					cdesc,
					did
				) values(
					\"$code\",
					\"$desc\",
					\"$department\"
				)
		";

		if( $con->query( $query ) )
			header( "Location: /courses" );
	}
?>

<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h2>FCPC IRIS</h2>
                <h3>Add Course</h3>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input class="form-control item" type="text" id="code" name="code">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input class="form-control item" type="text" id="desc" name="desc">
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control item" id="department" name="department">
                        	<?php foreach( $departments as $row ) { ?>
                        	<option value="<?= $row[ "did" ] ?>"><?= $row[ "ddesc" ] ?></option>
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