<?php
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="eduform";

if( ! $db=mysqli_connect($servername, $dbusername, $dbpassword, $dbname)){
 die ('unable to connect to the data base');
}
?>