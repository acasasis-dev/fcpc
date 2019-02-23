<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$query = "delete from courses where cid=$id";

	if( $con->query( $query ) )
		header( "Location: /courses" );