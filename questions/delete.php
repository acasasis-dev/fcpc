<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$query = "delete from questions where qid=$id";

	if( $con->query( $query ) )
		header( "Location: /questions" );