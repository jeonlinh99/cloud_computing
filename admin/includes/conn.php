<?php
$severname=	"localhost";
$username= "jeonlinh";
$pass="jeonlinh@";
$dbname="tunesource";
$conn= mysqli_connect($severname, $username, $pass, $dbname);

if (!$conn) 
{
die( " connect is error: " .mysqli_connect_error());
} else{
    echo "";
}
?>
