<?php
	session_start();
	require "env.php";

	$con = new mysqli( $host, $user, $pass, $db_name );
