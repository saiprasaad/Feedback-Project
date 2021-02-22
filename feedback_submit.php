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
    $query="Insert into theory values('$subcode','$staffid','$sec',".$_POST['t1'].",".$_POST['t2'].",".$_POST['t3'].",".$_POST['t4'].",".$_POST['t5'].",".$_POST['t6'].",".$_POST['t7'].",".$_POST['t8'].",".$_POST['t9'].",".$_POST['t10'].",".$_POST['t11'].",".$_POST['t12'].",".$_POST['t13'].",".$_POST['t14'].",".$_POST['t15'].",".$_POST['t16'].",".$_POST['t17'].",".$_POST['t18'].",".$_POST['t19'].",".$_POST['t20'].",'$com','$batch','$dept','$rollno');";
    $entry=$subcode."+";
    $query .= "Update student set flag=CONCAT(flag,'$entry') where RollNo='$rollno';";
    $query .= "Update sss_alloc set checkedin=1 where rollno='$rollno' and subcode='$subcode' and staffid='$staffid';";
    $res=mysqli_multi_query($scon, $query);
    mysqli_close($scon);
    header("Location: home.php");
    exit;
}

?>