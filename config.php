<?php
// Foutmeldingen zichtbaar maken
ini_set ('display_errors', 1);
error_reporting(E_ALL);

// database login details
$db_hostname = 'localhost'; // or '127.0.0.1'
$db_username = 'db089797';
$db_password = 'Blex1905!';
$db_database = '089797_database';

// create the database connection
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

// If the connection cannot be made: report
if (!$mysqli) {
    echo "ERROR: no connection to the database. <br>";
    echo "Error: " . mysqli_connect_error() . "<br/>";
    exit;
}
?>
