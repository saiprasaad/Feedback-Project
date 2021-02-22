<?php
session_start();
$staff=$_GET['staffdetails'];
$staff1=explode("-",$staff);
$_SESSION['staffid']=$staff1[0];
$_SESSION['subcode']=$staff1[1];
$_SESSION['sec']=$staff1[2];
$_SESSION['year']=$staff1[4];
$type=$staff1[3];
if($_SESSION['type']=="LAB")
    header("Location: practicalres.php");
else
    header("Location: result.php");
?>