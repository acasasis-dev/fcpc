<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$query = "delete from enrolled where eid=$id";

	if( $con->query( $query ) )
		header( "Location: /enrolled" );