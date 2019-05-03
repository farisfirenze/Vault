<?php

$servername = "localhost";
$lusername = "root";
$lpassword = "";
$dbname = "bank";
$conn = mysqli_connect($servername, $lusername, $lpassword, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>