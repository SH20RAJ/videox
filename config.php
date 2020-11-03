<?php

include 'dbconnection.php';

$host = sbihost ;
$dbuser = sbiuser ;
$dbpass = sbidbpass ;
$db = sbidb ;

$conn = mysqli_connect($host,$dbuser,$dbpass,$db);

$sitename = "VideoX || Share Favs" ;

if(!$conn){
    echo "database connection error ! ";
}

$player = "plyr";


?>
