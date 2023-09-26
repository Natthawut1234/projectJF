<?php
$servername = "localhost";
$username = "root";
$password = "6540201057Poh@";
$db = "movie";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "";
//echo "Connected successfully";
?>