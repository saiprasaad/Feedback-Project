<?php
session_start();
require 'dbconnect.php';
if(isset($_SESSION['student']))
{
    
    $sec=$_SESSION['sec'];
$dep=$_SESSION['dept'];
    $sub=$_SESSION['sub'];
    $batch=$_SESSION['batch'];
	$who=$_SESSION['student'];
   // $scon=mysqli_connect('localhost','root','',$batch);
//$res=mysqli_query($scon,"Select staffID from staffdetails where subjectcode='$sub' and section='$sec'");
//$row=mysqli_fetch_array($res);$staff=$row['staffID'];
///$res=mysqli_query($scon,"Select staffID from staffdetails where subcode='$sub' and sec='$sec' and batch='$batch' and ");
///$row=mysqli_fetch_array($res);
    $staff=$_SESSION['name'];

//    $scon=mysqli_connect('localhost','root','','login');
//    if(!$scon)
//    {
//        die('Error Connecting to Database');
//    }
    $res=mysqli_query($scon,"select * from admin where staff_name='$staff'");
    $row=mysqli_fetch_array($res);
    $name=$row['staff_id'];
	
    if(isset($_POST['submit']))
    {   
//      $scon=mysqli_connect('localhost','root','',$batch);  
//$com=$_POST['Comments'];
$com=$_POST['Comments'];
$id=$_SESSION['student'];
$entry=$sub."+";
$sql1="Update student set flag=CONCAT(flag,'$entry') where RollNo='$id'";
        $sql="Insert into lab values('$sub','$name','$sec',".$_POST['1'].",".$_POST['2'].",".$_POST['3'].",".$_POST['4'].",".$_POST['5'].",".$_POST['6'].",".$_POST['7'].",".$_POST['8'].",".$_POST['9'].",".$_POST['10'].",'$com','$batch','$dep','$who')";
if(mysqli_query($scon,$sql) && mysqli_query($scon,$sql1)){
echo '<script type="text/javascript">alert("Response Recorded");</script>';
$_SESSION['success']="done";
header("Location: selection2.php");}
else
echo '<script type="text/javascript">alert("Error");</script>';
    }
  }
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Review</title>
    </head> <th></th>   
    <body>
         <div align="center">
    <img src="college.jpg" width="1000px" height="170px"></div>
    <form action="practical.php" method="post">
        <center>
    <p><strong>Student Feedback on Teacher(Practical)</strong></p>
            </center>
        <center><label><strong>STAFF-ID:</strong><?php echo $name;?></label>&nbsp;&nbsp;<label><strong>STAFF NAME:</strong><?php echo $staff;?></label>&nbsp;&nbsp;
        <label><strong>SUBJECT CODE:</strong><?php echo $sub;?></label>&nbsp;&nbsp;</center>
        <table cellspacing="20">
            <th>S.NO</th><th>Feedback against the
 following statements</th><th colspan="5">Select appropriate option for the following</th>      
            <tr required><td width="50">1.</td><td width="400">Inform about course outcomes (CO),program outcomes (POs) and does
the course delivery meets CO's</td>
                <td><input type="radio" name="1" value="5" required> Strongly agree</td>
                <td><input type="radio" name="1" value="4" required> Agree</td>
                <td><input type="radio" name="1" value="3" required> Neutral</td>
                <td><input type="radio" name="1" value="2" required> Disagree</td>
                <td><input type="radio" name="1" value="-2" required> Strongly Disagree</td>
  </tr>
            <tr required><td width="50">2.</td><td width="400">Preparedness for handling the Practical classes</td>
                <td><input type="radio" name="2" value="5" required> Excellent</td>
                <td><input type="radio" name="2" value="4" required> Very Good</td>
                <td><input type="radio" name="2" value="3" required> Good</td>
                <td><input type="radio" name="2" value="2" required> Satisfied</td> 
                <td><input type="radio" name="2" value="-2" required> Not Satisfied</td>
  </tr>
         <tr required><td width="50">3.</td><td width="400">Engages the Lab classes regularly and
maintains discipline</td>
             <td><input type="radio" name="3" value="5" required> Strongly agree</td>
             <td><input type="radio" name="3" value="4" required> Agree</td>
             <td><input type="radio" name="3" value="3" required> Neutral</td>
             <td><input type="radio" name="3" value="2" required> Generally disagree</td> 
             <td><input type="radio" name="3" value="-2" required> Disagree</td>
  </tr>
         <tr required><td width="50">4.</td><td width="400">Helps the students in conducting
the experiments through
demonstrations</td>
             <td><input type="radio" name="4" value="5" required> Always</td>
             <td><input type="radio" name="4" value="4" required> Often</td>
             <td><input type="radio" name="4" value="3" required> Sometimes</td>
             <td><input type="radio" name="4" value="2" required> Rare</td> 
             <td><input type="radio" name="4" value="-2" required> Never</td>
  </tr>
   <tr required><td width="50">5.</td><td width="400">Helps the students to explore the
topic of study involved in the
experiment</td>
       <td><input type="radio" name="5" value="5" required> Always</td>
       <td><input type="radio" name="5" value="4" required> Often</td>
       <td><input type="radio" name="5" value="3" required> Sometimes</td>
       <td><input type="radio" name="5" value="2" required> Rare</td> 
  <td><input type="radio" name="5" value="-2" required> Never</td>
  </tr>
  <tr required><td width="50">6.</td><td width="400">Takes interest in conducting viva for
clear understanding of the
experiment</td>
  <td><input type="radio" name="6" value="5" required> Always</td>
  <td><input type="radio" name="6" value="4" required> Often</td>
  <td><input type="radio" name="6" value="3" required> Sometimes</td>
  <td><input type="radio" name="6" value="2" required> Rare</td> 
  <td><input type="radio" name="6" value="-2" required> Never</td>
  </tr>
        
<tr required><td width="50">7.</td><td width="400">Regular checking of the laboratory
observation/ records</td>
    <td><input type="radio" name="7" value="5" required> Always</td>
    <td><input type="radio" name="7" value="4" required> Often</td>
    <td><input type="radio" name="7" value="3" required> Sometimes</td>
    <td><input type="radio" name="7" value="2" required> Rare</td> 
    <td><input type="radio" name="7" value="-2" required> Never</td>
  </tr>
  <tr required><td width="50">8.</td><td width="400">Provides helpful information for
preparing and writing examination</td>
      <td><input type="radio" name="8" value="5" required>  Always</td>
      <td><input type="radio" name="8" value="4" required> Often</td>
      <td><input type="radio" name="8" value="3" required> Sometimes</td>
      <td><input type="radio" name="8" value="2" required> Rare</td> 
  <td><input type="radio" name="8" value="-2" required> Never
  </td></tr>
<tr required><td width="50">9.</td><td width="400">Prompt and fairness in evaluating experiments results</td><td>
    <input type="radio" name="9" value="5" required> Always</td>
    <td><input type="radio" name="9" value="4" required> Often</td>
    <td><input type="radio" name="9" value="3" required> Sometimes</td>
    <td><input type="radio" name="9" value="2" required> Rare</td> 
  <td><input type="radio" name="9" value="-2" required> Never
  </td></tr>
  <tr required><td width="50">10.</td><td width="400">Courteous and unbiased in dealing
with students</td><td>
      <input type="radio" name="10" value="5" required> Very satisfied</td>
      <td><input type="radio" name="10" value="4" required> Satisfied</td> 
      <td> <input type="radio" name="10" value="3" required> Neutral</td>
      <td><input type="radio" name="10" value="2" required> Slightly Dissatisfied </td>
      <td><input type="radio" name="10" value="-2" required> Dissatisfied
  </td></tr>
 <span class="validity"></span>
    </table>
          <center><strong>Comments(Max 200 characters)</strong><input type="text" name="Comments" style="width:1000px; margin:0px auto; display:block;" required></center><br>
        <div align="center">
        <input type="submit" name="submit"></div>
        </form>
     </body>
</html>
