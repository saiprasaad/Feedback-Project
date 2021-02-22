 <div align="center">
    <img src="college.jpg" width="700px" height="170px"></div><br>
<?php //if(isset($_SESSION['admin'])=="")
    //{
      //  header("Location: index.php");
        //exit;
    //}
?>

<?php
session_start();
require "dbconnect.php";
//$scon=mysqli_connect('localhost','root','',$_SESSION['batch']);
$staff1=$_GET['staffid'];
    $type=$_SESSION['type'];
    $flag=1;
    $bat=$_SESSION['batch'];
    //$_SESSION['type']=$type;
    $staff2=explode("-",$staff1);
    $staff=$staff2[0]; 
    $_SESSION['name']=$staff2[1];
    $sem=$_SESSION['sem'];
    $dept=$_SESSION['dept'];
    if($dept=='M.B.A' &&( $bat==2018 || $bat==2019))
     $sql="Select * from mbastaffdetails where staffID='$staff'";
    else
  $sql = "SELECT * FROM `staffdetails` WHERE staffID='$staff' and batch='$bat' and dept='$dept' and subcode IN (select subcode from subdetails where type='$type' and sem='$sem') and sem='$sem'";
  $res = mysqli_query($scon,$sql);
?>
 <a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br>
 <a href="select.php" style="float:left; text-decoration:none; font-size:20px;">Back</a><br>
<div align="center"><p style="font-size:25px;">Select Subject and Section</p></div>

<hr>
<form action="resint.php" method="get">
    <div align="center">
<select name="staffdetails" id="staffid" >

<?php

  $res = mysqli_query($scon,$sql);
  while($list = mysqli_fetch_assoc($res)){
    $category = $list['staffID'];
    $username=$list['subcode'];
      if($dept=='M.B.A' && ($bat==2018 || $bat==2019))
          $section=$list['grp'];
      else
    $section=$list['sec'];
    $year=$list['year'];
      //$html="<html>"
    //$options = $list['options'];
?>

<option value="<?php echo $category,"-",$username,"-",$section,"-",$type,"-",$year ?>"><?php echo $category,"-",$_SESSION['name'],"-",$username,"-",$section?></option>


<?php 
  }
?>
    </select>
        
    <input type="submit" name="submit">
    </div>
    </form>
