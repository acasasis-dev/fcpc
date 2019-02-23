<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$query = "delete from subjects where sjid=$id";

	if( $con->query( $query ) )
		header( "Location: /subjects" );