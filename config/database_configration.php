<?php
$host = 'localhost';
$user = 'root';
$passwd = '';
$database = 'foodpoint';
$connect = mysqli_connect($host,$user,$passwd,$database);
if(!$connect)
{
    $alert = '<script> swal({
        title: "Connection Failed",
        text:"Failed to Connect The Database",
        icon: "error",
    }).then((result)=>{
        location="../admin/login.php";
    });</script>';
}
?>