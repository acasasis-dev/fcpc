<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$query = "
		select
			a.*,
			b.*
		from
			courses a join
			departments b
		on
			a.cid=$id and
			a.did=b.did			
	";
	$data = $con->query( $query )->fetch_assoc();
	$departments = $con->query( "select * from departments" );

	if( $_POST ) {
		$id = $_POST[ "id" ];
		$code = $_POST[ "code" ];
		$desc = $_POST[ "desc" ];
		$department = $_POST[ "department" ];

		$query = "
			update courses
				set
					ccode=\"$code\",
					cdesc=\"$desc\",
					did=\"$department\"
				where
					cid=$id
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
                <h3>Edit Course</h3>
                <form method="POST" enctype="multipart/form-data">
                	<input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input class="form-control item" type="text" id="code" name="code" value="<?= $data[ "ccode" ] ?>">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input class="form-control item" type="text" id="desc" name="desc" value="<?= $data[ "cdesc" ] ?>">
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control item" id="department" name="department">
                        	<?php foreach( $departments as $row ) { ?>
                        	<option value="<?= $row[ "did" ] ?>"<?= $data[ "did" ] == $row[ "did" ]? " selected": "" ?>><?= $row[ "ddesc" ] ?></option>
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