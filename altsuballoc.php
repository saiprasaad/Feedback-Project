<?php
$info=$_GET['info'];
$temp=explode("^",$info);
$subcode=$temp[0];
$subname=$temp[1];
$type=$temp[2];
$credits=$temp[3];
$sem=$temp[4];
$reg=$temp[5];
$dept=$temp[6];
$ugpg=$temp[7];
require 'dbconnect.php';
if(mysqli_query($scon,"insert into subdetails values('$subcode','$subname','$type','$credits','$sem','$reg','$dept','$ugpg')"))
{
    echo 'success!!';
}
else
{
    echo 'error!!';
}
exit;

?>