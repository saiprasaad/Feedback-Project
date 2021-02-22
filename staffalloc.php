<?php
session_start();
require 'dbconnect.php';
$inn=explode("-",$_POST['info']);
$batch=$inn[2];
$sec=$inn[1];
$sem=$inn[3];$dept=$inn[0];
if($sem%2==0)
$stype="EVEN";
else
$stype="ODD";
$done=0;

 $i=$_SESSION['count'];
    mysqli_query($scon,"DELETE from staffdetails where batch='$batch' and sec='$sec' and sem='$sem' and dept='$dept' and year=2020");
   while($i--)
   {
       $sub="sub".$i;
    $subcode=$_POST["$sub"];
    $find=mysqli_query($scon,"select type from subdetails where subcode='$subcode'");
	$find1=mysqli_fetch_array($find);
	$typ=$find1['type'];
    $sta="staff".$i;
    $staff=$_POST["$sta"];
    $a=explode("+",$staff);
    foreach($a as $value)
    {

     if(mysqli_query($scon,"insert into staffdetails (batch,dept,sem,sec,subcode,staffID,year,type,semtype) values('$batch','$dept','$sem','$sec','$subcode','$value',2020,'$typ','$stype')"))
      $done=1;
     else
     $done=0;
    }
   }

   if($done==1)
   $_SESSION['suc']=1;
  else
      $_SESSION['suc']=0;
 header("Location: hodopen.php");
