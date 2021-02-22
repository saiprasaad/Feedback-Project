<?php
session_start();
require 'dbconnect.php';
$id=$_SESSION['student'];
$res=mysqli_query($scon,"select flag from student where RollNo='$id'");
$row=mysqli_fetch_array($res);
$data=explode("+",$row['flag']);
$bad=0;
$_SESSION['error']="";
$SEM=$_POST['sem'];
$TYPE='THEORY';
$SUBJECT=explode(" ",$_POST['state']);
$_SESSION['sub']=$SUBJECT[0];
unset($_SESSION['error']);
foreach($data as $value)
{
  if($value == $_SESSION['sub'])
  {
    if($value =='MI7502')
	  continue;
    $bad=1;$_SESSION['error']='ttt';
   header("Location: selection1.php");
  }
}
if($bad==0){
if($TYPE=="THEORY")
  header("Location: feedbackform.php");
 else
    header("Location: practical.php");}
       ?>


