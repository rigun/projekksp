<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "ksp";

$con= mysqli_connect($host,$user,$pass,$db);

if(mysqli_connect_errno()){
    echo 'gagal konek : '.mysqli_connect_error();
}
 ?>
