<?php
session_start();
if(isset($_SESSION['admin'])=="")
  {
    header("Location: index.php");exit;
  }
  $_SESSION['year1']=$_POST['year'];
  $_SESSION['sem1']=$_POST['semty'];
  $rep1=$_POST['report'];
  if($rep1=="one")
  {
  	header("Location: depart.php");
  }
  else if($rep1=="two")
{
	header("Location: depart2.php");
}
else
{
	header("Location: newdept.php");
}
?>