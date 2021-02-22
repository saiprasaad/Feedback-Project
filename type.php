<?php
require 'dbconnect.php';
$res=mysqli_query($scon,"select * from staffdetails");
while($row=mysqli_fetch_assoc($res))
{
    $code=$row['subcode'];
    $dp=$row['dept'];
    $se=$row['sem'];
    $res1=mysqli_query($scon,"select type from subdetails where subcode='$code' and dept='$dp' and sem='$se'");
    $row1=mysqli_fetch_array($res1);
    $typ=$row1['type'];
    $res2=mysqli_query($scon,"update staffdetails set type='$typ' where subcode='$code' and dept='$dp' and sem='$se'");
    
}
