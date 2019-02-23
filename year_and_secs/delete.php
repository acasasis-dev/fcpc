<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$query = "delete from year_and_secs where yasid=$id";

	if( $con->query( $query ) )
		header( "Location: /year_and_secs" );