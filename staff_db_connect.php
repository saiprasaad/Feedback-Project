<?php
require "dbconnect.php";
session_start();
$batch=$_POST['batch'];
$yr=$_POST['yr'];
$dept=$_SESSION['hod'];
$sem=$_POST['sem'];
$semtype="ODD";
if($sem%2==0)
{$semtype="EVEN";}
$sec=$_POST['sec'];
$subcode=$_POST['subcode'];
$ftch=mysqli_query($scon,"Select type from subdetails where subcode='$subcode'");
$row=mysqli_fetch_array($ftch);
$type=$row['type'];
$staffid=$_POST['staffid'];
$name = $_POST['student'];
$creation=mysqli_query($scon,"CREATE TABLE IF NOT EXISTS sss_alloc(subcode varchar(20),staffid varchar(20),rollno varchar(20),checkedin int)");
$sql="Insert into sss_alloc values ";

foreach ($name as $stud){

    $sql .="('$subcode','$staffid','$stud',0),";

}
$sql=substr($sql, 0, -1);
if(mysqli_query($scon,"Insert into staffdetails values('$batch','$dept','$sem','$sec','$subcode','$staffid','$yr',0,'$type','$semtype')")){

    if(mysqli_query($scon,$sql)){
        $_SESSION['fuck']=100;
        header("Location: dynamic_alloc.php");
        exit;
    }
    else {

        mysqli_query($scon,"'Delete from staffdetails where subcode='$subcode' and staffID='$staffid' and batch='$batch' and year='$yr' and sem='$sem'");
        
    }
}
$_SESSION['fuck']=101;
header("Location: dynamic_alloc.php");



?>