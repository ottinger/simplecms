<?php
// simplecms 
// sqlconnect.php

// Encompasses all code used to make a connection to MySQL server.
// To be included in all files that need to use MySQL.

include 'settings.php';

// Connect to database
$conn = mysql_connect($sqladdr,$sqluser,$sqlpass);
if(!$conn) {
	echo "Something blew up: " . mysql_error();
	exit;
}
if(!mysql_select_db($sqldb)) {
	echo "Something blew up: ". mysql_error();
	exit;
}

?>
