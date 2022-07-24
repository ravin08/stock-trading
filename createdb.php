<?php

$servername="localhost:3308";
$username="root";
$password="root";

// Create connection
mysqli_connect($servername,$username,$password) or die("connection failed");
$conn=mysqli_connect($servername,$username,$password) or die("connection failed");
echo("<pre>");
var_dump($conn);
echo("</pre>");


?>