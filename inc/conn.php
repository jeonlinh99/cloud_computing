<?php
$severname=	"52.6.114.59";
$username= "jeonlinh";
$pass="jeonlinh179699718@";
$dbname="tunesource";
$conn= mysqli_connect($severname, $username, $pass, $dbname);

if (!$conn) 
{
die( " connect is error: " .mysqli_connect_error());
} else{
	echo "";
}
?>
