<?php

function isLoggedIn(){
	if( !$_SESSION ) return header( "Location: /login.php" );
}

isLoggedIn();