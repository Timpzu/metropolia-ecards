<?php
$db_host = 'localhost';
$db_username = 'admin';
$db_password = 'admin';
$db_database = 'metropolia_christmas';

// Create connection
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo 'Connected successfully';
?>
