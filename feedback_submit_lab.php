<?php
session_start();
require 'dbconnect.php';
if(isset($_SESSION['student']))
{
    $rollno=$_SESSION['student'];
    $sec=$_SESSION['sec'];
    $batch=$_SESSION['batch'];
    $dept=$_SESSION['dept'];
    $subcode=$_POST['subcode'];
    $staffid=$_POST['staffid'];
    $com=$_POST['comments'];
    $query="Insert into lab values('$subcode','$staffid','$sec',".$_POST['1'].",".$_POST['2'].",".$_POST['3'].",".$_POST['4'].",".$_POST['5'].",".$_POST['6'].",".$_POST['7'].",".$_POST['8'].",".$_POST['9'].",".$_POST['10'].",'$com','$batch','$dept','$rollno');";
    $entry=$subcode."+";
    $query .= "Update student set flag=CONCAT(flag,'$entry') where RollNo='$rollno';";
    $query .= "Update sss_alloc set checkedin=1 where rollno='$rollno' and subcode='$subcode' and staffid='$staffid';";
    $res=mysqli_multi_query($scon, $query);
    mysqli_close($scon);
    header("Location: home.php");
    exit;
}

?>