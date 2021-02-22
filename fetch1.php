<?php
//fetch.php

session_start();
$sect=$_SESSION['sec']; 
require 'dbconnect.php';
if(isset($_POST["action"]))
{
 //$connect = mysqli_connect("localhost", "root", "", "login");
 $output = '';
 if($_POST["action"] == "sem")
 {
     $dept1=$_SESSION['dept'];
     if($_SESSION['batch']==2016)
     $batch1=2013;
     else
    $batch1=2017;
     
  $query = "SELECT * FROM subdetails WHERE sem = '".$_POST["query"]."' and dept='$dept1' and reg='$batch1' and type='LAB'";
  $result = mysqli_query($scon, $query);
  $output .= '<option value="">Select Subject</option>';
  while($row = mysqli_fetch_array($result))
  {
      $a=$row["subcode"]." ".$row["subname"];
   $output .= '<option value="'.$a.'">'.$a.'</option>';
  }
     
 }
   else  if($_POST["action"] == "state")
    {
    $dept1=$_SESSION['dept'];
        $batch1=$_SESSION['batch'];
//     if($_SESSION['batch']==2016)
//     $batch1=2013;
//     else
//    $batch1=2017;
//     //echo $_POST["query"];
      // $output =" ";
        
            $data=explode(" ",$_POST["query"]);
       
  $query = "SELECT staff_name from admin where staff_id IN (SELECT staffID FROM staffdetails WHERE subcode = '$data[0]' and dept='$dept1' and batch='$batch1' and sec='$sect')";
       $output .= '<option value="">Select Staff Name</option>';
  $result = mysqli_query($scon, $query);
       while($row = mysqli_fetch_array($result)){
//$query1="";
//  $result1=mysqli_query($scon,$query1);
//  while($row1 = mysqli_fetch_array($result1))
//  {
      $a=$row["staff_name"];
   $output .= '<option value="'.$a.'">'.$a.'</option>';
  }
         
    //}
   }
// {
//  $query = "SELECT city FROM country_state_city WHERE state = '".$_POST["query"]."'";
//  $result = mysqli_query($connect, $query);
//  $output .= '<option value="">Select City</option>';
//  while($row = mysqli_fetch_array($result))
//  {
//   $output .= '<option value="'.$row["city"].'">'.$row["city"].'</option>';
//  }
// }
 echo $output;
}
?>