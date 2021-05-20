<?php
session_start();
if(!$_SESSION['email'] && !$_SESSION['name']){
    header("Location:./index.php");
}
?>