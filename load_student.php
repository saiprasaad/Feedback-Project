<?php
require 'dbconnect.php';
session_start();
if(isset($_POST['sec']))
{

    $output = '<div class="pl-2">
    <input type="checkbox" onclick="toggle(this);">
    <label for="inlineRadio2">Select All</label></div>';
    $batch=$_POST['batch'];
    $sec=$_POST['sec'];
    $sem=$_POST['sem'];
    $dept=$_SESSION['hod'];
    $res=mysqli_query($scon,"Select * from student where dept='$dept' and batch='$batch' and sec='$sec'");
    while($row = mysqli_fetch_array($res))
  {
      $a=$row["RollNo"]." ".$row["Student_Name"];
    
   $output .=  '<div class="pl-2">
        <input type="checkbox" id="'.$row["RollNo"].'" value="'.$row["RollNo"].'" name="student[]">
        <label for="inlineRadio2">'.$a.'</label>
      </div>';
       
  }
 
  echo $output;
}


?>