<?php
$servername2 = "localhost";
$username2 = "root";
$password2 = "";
$dbname2 = "espresso";

// Create connection
$conn2 = new mysqli($servername2, $username2, $password2, $dbname2);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}
$conProcedural = mysqli_connect("localhost","root","","espresso") or die(mysqli_error());
?>
