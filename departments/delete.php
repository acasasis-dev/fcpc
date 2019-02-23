<?php
	require "../requires.php";

	$id = $_GET[ "id" ];
	$query = "delete from departments where did=$id";

	if( $con->query( $query ) )
		header( "Location: /departments" );