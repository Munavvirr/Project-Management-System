<?php
$servername = "sql873.main-hosting.eu";
$database = "u506548348_japrojects";
$username = "u506548348_japrojects";
$password = "Projects@90012";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>