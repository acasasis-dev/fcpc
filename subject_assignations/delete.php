<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$query = "delete from subject_assignations where said=$id";

	if( $con->query( $query ) )
		header( "Location: /subject_assignations" );