<?php

$servername = "localhost";
$dbUser = "root";
$dbPass = "";
$db = "lab7";

$con = mysqli_connect($servername, $dbUser, $dbPass, $db);

if(!$con){
    die("Connection Failed: ".mysqli_connect_error());
}