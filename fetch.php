<?php
//fetch.php
session_start();
require 'dbconnect.php';
if(isset($_POST["action"]))
{
 $output = '';
 if($_POST["action"] == "sem")
 {
     $dept1=$_SESSION['dept'];
     $reg1=$_SESSION['reg'];
     if($_SESSION['batch']==2016)
     $batch1=2013;
     else
    $batch1=2017;
     $sem11=$_POST['query'];
     $_SESSION['sem']=$sem11;
   if($dept1=="M.B.A" and $sem11=='3')
   {
     $query="SELECT * from subdetails where subcode in (Select subcode from mytable where regno=$reg1 or grp='al')";
   }  
   else{
  $query = "SELECT * FROM subdetails WHERE sem = '".$_POST["query"]."' and dept='$dept1' and reg='$batch1' and type='THEORY'";
   }
  $result = mysqli_query($scon, $query);
  $output .= '<option value="">Select Subject</option>';
  while($row = mysqli_fetch_array($result))
  {
      $a=$row["subcode"]." ".$row["subname"];
   $output .= '<option value="'.$a.'">'.$a.'</option>';
  }
 }
 echo $output;
}
?>