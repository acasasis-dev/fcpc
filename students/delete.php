<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$query = "delete from persons where pid=$id and ptype=1";

	if( $con->query( $query ) )
		header( "Location: /professors" );