<?php
$severname=	"3.141.172.244";
$username= "jeonlinh";
$pass="jeonlinh@";
$dbname="tunesouce";
$conn= mysqli_connect($severname, $username, $pass, $dbname);

if (!$conn) 
{
die( " connect is error: " .mysqli_connect_error());
} else{
    echo "";
}
?>
