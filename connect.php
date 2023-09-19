<?php
$servername = "localhost";
$username = "Natthawut";
$password = "6540201057Poh@";
$db = "Natthawut";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
//echo "Connected successfully";
?>