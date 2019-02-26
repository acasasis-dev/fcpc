<?php
	require "../headers/home_header.php";
	require "../db.php";

	$id = $_GET[ "id" ];
	$code = $_GET[ "code" ];

	$query = "
        select
            h.pfname as proffname,
            h.pmname as profmname,
            h.plname as proflname,
            g.*
        from
            (
                select
                    a.eid, b.said, b.profid, c.*,
                    d.yasyear, d.yassection, e.*, f.*
                from
                    enrolled a join
                    subject_assignations b join
                    subjects c join
                    year_and_secs d join
                    courses e join
                    persons f
                on
                	a.eid=$id and
                    a.said=b.said and
                    b.sjid=c.sjid and
                    b.yasid=d.yasid and
                    d.cid=e.cid and
                    a.studid=f.pid
            ) g join persons h
        on
            g.profid=h.pid
    ";

    $data = $con->query( $query )->fetch_assoc();
    $questions = $con->query( "select * from questions where qid!=1" );

	if( $_POST ) {
		$comment = $_POST[ "comment" ];
		$id = $_POST[ "id" ];

		$query = "
			insert into answers( qid, answer, eid ) values( 1, \"$comment\", $id ), 
		";

		$inserts = [];

		foreach( array_keys( $_POST ) as $x ) {
			$ans = $_POST[ $x ];
			$x = explode( "score", $x );
			if( count( $x ) > 1 )
				array_push( $inserts, "( $x[1], $ans, $id )" );
		}

		$inserts = implode( ", ", $inserts );
		$query = $query. $inserts;

		echo $query;
		if( $con->query( $query ) ) {
			header( "Location: /evaluation?id=$code" );
		}
	}
?>

<main class="page contact-page">
    <section class="portfolio-block contact">
        <div class="container">
            <div class="heading">
                <h1>FCPC IRIS</h1>
                <h4>Evaluation: <?= $data[ "sjdesc" ]. " - " .$data[ "ccode" ]. " " .$data[ "yasyear" ]. "-" .$data[ "yassection" ]. " - " .$data[ "proflname" ]. ", " .$data[ "proffname" ]. " " .$data[ "profmname" ] ?></h4>
                <h4>By: <?= $data[ "plname" ]. ", " .$data[ "pfname" ]. " " .$data[ "pmname" ] ?></h4>
                <form method="POST" enctype="multipart/form-data">
                	<input type="hidden" name="id" value="<?= $id ?>">
                	<input type="hidden" name="code" value="<?= $code ?>">
                	<?php foreach( $questions as $x ) { ?>
                    <div class="form-group">
                        <label for="code"><b><h3><?= $x[ "qdesc" ] ?></h3></b></label>
                        <table width="100%">
                            <tr>
                                <td>
                                    <input class="form-control item" type="radio" id="score<?= $x[ "qid" ] ?>" name="score<?= $x[ "qid" ] ?>" value="5">Outstanding
                                </td>
                                <td>
                                    <input class="form-control item" type="radio" id="score<?= $x[ "qid" ] ?>" name="score<?= $x[ "qid" ] ?>" value="4">Very Satisfactory
                                </td>
                                <td>
                                    <input class="form-control item" type="radio" id="score<?= $x[ "qid" ] ?>" name="score<?= $x[ "qid" ] ?>" value="3">Satisfactory
                                </td>
                                <td>
                                    <input class="form-control item" type="radio" id="score<?= $x[ "qid" ] ?>" name="score<?= $x[ "qid" ] ?>" value="2">Fair
                                </td>
                                <td>
                                    <input class="form-control item" type="radio" id="score<?= $x[ "qid" ] ?>" name="score<?= $x[ "qid" ] ?>" value="1">Poor
                                </td>
                            </tr>
                            
                        </table>
                        
                        
                        
                        
                        
                    </div>
                    <?php } ?>
                    <div class="form-group">
                   	<label for="comment">Comment</label>
                        <textarea class="form-control item" id="comment" name="comment"></textarea>
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