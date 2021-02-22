<?php
session_start();
require 'dbconnect.php';
$id=$_SESSION['student'];
$res=mysqli_query($scon,"select flag,dept from student where RollNo='$id'");
$row=mysqli_fetch_array($res);
$d=$row['dept'];
$data=explode("+",$row['flag']);
$bad=0;
$_SESSION['error']="";
$SEM=$_POST['country'];
$TYPE="LAB";
echo $SEM;
$SUBJECT=explode(" ",$_POST['state']);
$_SESSION['sub']=$SUBJECT[0];
$_SESSION['name']=$_POST['staff'];
unset($_SESSION['error']);
foreach($data as $value)
{
	if($d=="CHEMICAL" || $SEM=='2')
	break;
  if($value == $_SESSION['sub'])
  {
     if($value=='MI7502'|| $value=='BS8161')
continue;
    $bad=1;$_SESSION['error']='ttt';
    header("Location: selection2.php");
  }
}
if($bad==0){
if($TYPE=="theory")
  header("Location: feedbackform.php");
 else
    header("Location: practical.php");}
       ?>


