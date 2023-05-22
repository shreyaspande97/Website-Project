<?php
$username = "u343927926_sdsj";
$password = "shreyas";
$hostname = "localhost";

$dbhandle = mysqli_connect($hostname,$username,$password) or die("Cloud not connect to data base");

$connected=mysqli_select_db($dbhandle,"u343927926_rs");
?>