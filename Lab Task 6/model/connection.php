<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = mysqli_connect($servername,$username,$password) or die(mysqli_error($conn));
mysqli_select_db($conn,$dbname) or die(mysqli_error($conn));
?>