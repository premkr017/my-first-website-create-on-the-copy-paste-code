<?php

// config.php
// Configuration settings can be added here in the future   
$host = "localhost";      // Database host
$user = "root";           // Database username
$pass = "";               // Database password
$db   = "prem_software";     // Database name

$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>