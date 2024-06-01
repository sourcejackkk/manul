<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registerUser";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connectionlost". mysqli_connect_error());
}
else{
    "успех";
}
?>