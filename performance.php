<?php
require 'dbconnect.php';

$year=$_GET['year'];
$type=$_GET['type'];
$sem=$_GET['sem'];
$batch=$_GET['batch'];
$res=mysqli_query($scon,"Select * from staffdetails where year='$year' and type='$type' and sem='$sem' and batch='$batch'");
while($row1=mysqli_fetch_assoc($res))
{
    $sub=$row1['subcode'];
    $staff=$row1['staffID'];
    $sec=$row1['sec'];
    $dep=$row1['dept'];
    
    
    $res1=mysqli_query($scon,"select COUNT(t1),AVG(t1),AVG(t2),AVG(t3),AVG(t4),AVG(t5),AVG(t6),AVG(t7),AVG(t8),AVG(t9),AVG(t10),AVG(t11),AVG(t12),AVG(t13),AVG(t14),AVG(t15),AVG(t16),AVG(t17),AVG(t18),AVG(t19),AVG(t20) from theory where sub_code='$sub' and staff_id='$staff' and section='$sec' and (dept='$dep' or dept='1') and batch='$batch'");
    
    $row=mysqli_fetch_array($res1);
    $percent=$row['AVG(t1)']+$row['AVG(t2)']+$row['AVG(t3)']+$row['AVG(t4)']+$row['AVG(t5)']+$row['AVG(t6)']+$row['AVG(t7)']+$row['AVG(t8)']+$row['AVG(t9)']+$row['AVG(t10)']+$row['AVG(t11)']+$row['AVG(t12)']+$row['AVG(t13)']+$row['AVG(t14)']+$row['AVG(t15)']+$row['AVG(t16)']+$row['AVG(t17)']+$row['AVG(t18)']+$row['AVG(t19)']+$row['AVG(t20)'];
    
    echo $sub," ",$staff," ",$sec," ",$dep," ",$percent,"<br>";

    $upd=mysqli_query($scon,"update staffdetails set performance='$percent' where staffID='$staff' and subcode='$sub' and dept='$dep' and sec='$sec' and batch='$batch'");
}
?>