<?php
$server ="localhost";
$user = "root";
$password = "";
$dbname = "project";

$connect = mysqli_connect($server, $user, $password, $dbname);

if(!$connect)
{
    die ("ERROR: cannot connect ot the database  on server");

}









?>