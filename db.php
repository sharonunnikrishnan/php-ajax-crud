<?php

$host = "localhost";
$username="root";
$password="";
$db="crud_example";

$conn = mysqli_connect($host,$username,$password,$db);

if(!$conn)
{
    die("Sorry database not connected");
}

?>