<?php
session_start();
require 'dbconnect.php';
if(isset($_SESSION['student']))
{

    $sec=$_SESSION['sec'];
    $sub=$_SESSION['sub'];
    $batch=$_SESSION['batch'];
    $dep=$_SESSION['dept'];
    $reg=$_SESSION['reg'];
	$who=$_SESSION['student'];
    if($dep=='M.B.A' and $_SESSION['sem']=='3')
    {
        $res=mysqli_query($scon,"Select * from mbastaffdetails where subcode='$sub' and grp=(SELECT grp from mytable where subcode='$sub' and regno='$reg')");
        if(mysqli_num_rows($res)==0)
        {
         $res=mysqli_query($scon,"Select * from mbastaffdetails where subcode='$sub' and grp='$sec'");
        }
           while($row=mysqli_fetch_assoc($res)){
               $staff=$row['staffID'];
               $sec=$row['grp'];}
        
    }
else
{
	$res=mysqli_query($scon,"Select staffID from staffdetails where subcode='$sub' and sec='$sec' and batch='$batch' and dept='$dep'");

           while($row=mysqli_fetch_assoc($res)){
               $staff=$row['staffID'];}
}
   //$row=mysqli_fetch_array($res);
   //$staff=$row['staffID']; 
    $res=mysqli_query($scon,"select * from admin where staff_id='$staff'");
    $row=mysqli_fetch_array($res);
    $name=$row['staff_name'];
    
    if(isset($_POST['submit']))
    {

$com=$_POST['Comments'];
$id=$_SESSION['student'];
$entry=$sub."+";
$sql1="Update student set flag=CONCAT(flag,'$entry') where RollNo='$id'";
$sql="Insert into theory values('$sub','$staff','$sec',".$_POST['t1'].",".$_POST['t2'].",".$_POST['t3'].",".$_POST['t4'].",".$_POST['t5'].",".$_POST['t6'].",".$_POST['t7'].",".$_POST['t8'].",".$_POST['t9'].",".$_POST['t10'].",".$_POST['t11'].",".$_POST['t12'].",".$_POST['t13'].",".$_POST['t14'].",".$_POST['t15'].",".$_POST['t16'].",".$_POST['t17'].",".$_POST['t18'].",".$_POST['t19'].",".$_POST['t20'].",'$com','$batch','$dep','$who')";
if(mysqli_query($scon,$sql) && mysqli_query($scon,$sql1)){
echo '<script type="text/javascript">alert("Response Recorded");</script>';
    $_SESSION['success']="done";
header("Location: selection1.php");}
else
echo '<script type="text/javascript">alert("Error");</script>';
}

}
?>
<!DOCTYPE html>
<html>
     <script type="text/javascript">
        window.onbeforeunload = function () {
            var inputs = document.getElementsByTagName("INPUT");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type == "submit") {
                    inputs[i].disabled = true;
                }
            }
        };
    </script>
    <body>
        
     <div align="center">
    <img src="college.jpg" width="1000px" height="170px"></div>
<form action="feedbackform1.php" method="post">
    <h3 style="text-align: center">Student Feedback on Teacher (Theory)</h3>
    <center><label><strong>STAFF-ID:</strong><?php echo $staff;?></label>&nbsp;&nbsp;<label><strong>STAFF NAME:</strong><?php echo $name;?></label>&nbsp;&nbsp;
        <label><strong>SUBJECT CODE:</strong><?php echo $sub;?></label>&nbsp;&nbsp;</center>
<table cellspacing="20">
<tr>
 <th>S.No</th>
    <th>Feedback against the following statements</th>
    <th colspan="5">Select appropriate option against the statement</th>
</tr>
<tr>
  <td width="90">1</td>
    <td width="400">Inform about course outcomes (CO), program outcomes (PO's) and does the course delivery meets CO's</td>
  <td><input type="radio" name="t1" value="5" required>Strongly Agree</td>
     <td> <input type="radio" name="t1" value="4" unchecked required>Agree</td>
     <td> <input type="radio" name="t1" value="3" unchecked required>Neutral</td>
     <td> <input type="radio" name="t1" value="2" unchecked required>Disagree</td>
      <td><input type="radio" name="t1" value="-2" unchecked required>Strongly Disagree</td>
</tr>
<tr>
    <td width="90">2</td>
    <td width="400">Preparedness for handling the class</td>
    <td><input type="radio" name="t2" value="5" unchecked required>Excellent</td>
      <td><input type="radio" name="t2" value="4" unchecked required>Very Good</td>
      <td><input type="radio" name="t2" value="3" unchecked required>Good</td>
      <td><input type="radio" name="t2" value="2" unchecked required>Satisfied</td>
      <td><input type="radio" name="t2" value="-2" unchecked required>Not satisfied</td>
</tr>
<tr>
    <td width="90">3</td>
    <td width="400">Engages the classes regularly and maintains discipline</td>
       <td><input type="radio" name="t3" value="5" unchecked required>Strongly Agree</td>
       <td><input type="radio" name="t3" value="4" unchecked required>Agree</td>
      <td> <input type="radio" name="t3" value="3" unchecked required>Neutral</td>
       <td><input type="radio" name="t3" value="2" unchecked required>Disagree</td>
       <td><input type="radio" name="t3" value="-2" unchecked required>Strongly Disagree</td>
</tr>
    <tr>
    <td width="90">4</td>
    <td width="400">Speaks clearly and audibly</td>
       <td><input type="radio" name="t4" value="5" unchecked required>Strongly Agree</td>
       <td><input type="radio" name="t4" value="4" unchecked required>Agree</td>
       <td><input type="radio" name="t4" value="3" unchecked required>Neutral</td>
       <td><input type="radio" name="t4" value="2" unchecked required>Disagree</td>
       <td><input type="radio" name="t4" value="-2" unchecked required>Strongly Disagree</td>
</tr>
    <tr>
    <td width="90">5</td>
    <td width="400">Writes and draw legibly</td>
       <td><input type="radio" name="t5" value="5" unchecked required>Strongly Agree</td>
      <td> <input type="radio" name="t5" value="4" unchecked required>Agree</td>
      <td> <input type="radio" name="t5" value="3" unchecked required>Neutral</td>
       <td><input type="radio" name="t5" value="2" unchecked required>Disagree</td>
       <td><input type="radio" name="t5" value="-2" unchecked required>Strongly Disagree</td>
</tr>
    <tr>
    <td width="90">6</td>
    <td width="400">Explains clearly and effectively the concepts with appropriate examples</td>
       <td><input type="radio" name="t6" value="5" unchecked required>Strongly Agree</td>
      <td> <input type="radio" name="t6" value="4" unchecked required>Agree</td>
       <td><input type="radio" name="t6" value="3" unchecked required>Neutral</td>
       <td><input type="radio" name="t6" value="2" unchecked required>Disagree</td>
       <td><input type="radio" name="t6" value="-2" unchecked required>Strongly Disagree</td>
</tr>
    <tr>
    <td width="90">7</td>
    <td width="400">Teach effectively suiting the student level of understanding</td>
       <td><input type="radio" name="t7" value="5" unchecked required>Strongly Agree</td>
       <td><input type="radio" name="t7" value="4" unchecked required>Agree</td>
       <td><input type="radio" name="t7" value="3" unchecked required>Neutral</td>
       <td><input type="radio" name="t7" value="2" unchecked required>Disagree</td>
       <td><input type="radio" name="t7" value="-2" unchecked required>Strongly Disagree</td>
</tr>
        <tr>
    <td width="90">8</td>
    <td width="400">Covers the syllabus completely at appropriate pace</td>
       <td><input type="radio" name="t8" value="5" unchecked required>Consistently</td>
       <td><input type="radio" name="t8" value="4" unchecked required>Adequate</td>
       <td><input type="radio" name="t8" value="3" unchecked required>Manageable</td>
       <td><input type="radio" name="t8" value="2" unchecked required>Rushed</td>
       <td><input type="radio" name="t8" value="-2" unchecked required>Never</td>
</tr>
    <tr>
    <td width="90">9</td>
    <td width="400">Ensures student participation in learning and problem solving in the class</td>
       <td><input type="radio" name="t9" value="5" unchecked required>Consistently</td>
      <td> <input type="radio" name="t9" value="4" unchecked required>Adequate</td>
       <td><input type="radio" name="t9" value="3" unchecked required>Manageable</td>
       <td><input type="radio" name="t9" value="2" unchecked required>Rushed</td>
       <td><input type="radio" name="t9" value="-2" unchecked required>Never</td>
</tr>
    <tr>
    <td width="90">10</td>
    <td width="400">Encourages questioning/ raising doubts by students and answer them well</td>
       <td><input type="radio" name="t10" value="5" unchecked required>Always</td>
       <td><input type="radio" name="t10" value="4" unchecked required>Often</td>
       <td><input type="radio" name="t10" value="3" unchecked required>Sometimes</td>
       <td><input type="radio" name="t10" value="2" unchecked required>Rarely</td>
       <td><input type="radio" name="t10" value="-2" unchecked required>Never</td>
</tr>
    <tr>
    <td width="90">11</td>
    <td width="400">Motivate students by identifying their strength/ weakness and providing right level of guidance</td>
       <td><input type="radio" name="t11" value="5" unchecked required>Always</td>
       <td><input type="radio" name="t11" value="4" unchecked required>Often</td>
       <td><input type="radio" name="t11" value="3" unchecked required>Sometimes</td>
       <td><input type="radio" name="t11" value="2" unchecked required>Rarely</td>
       <td><input type="radio" name="t11" value="-2" unchecked required>Never</td>
</tr>
    <tr>
    <td width="90">12</td>
    <td width="400">Use of modern ICT tools (LCD/ Webinar/ Multimedia presentation/ NPTEL videos etc.,.)</td>
       <td><input type="radio" name="t12" value="5" unchecked required>More Frequently</td>
       <td><input type="radio" name="t12" value="4" unchecked required>Frequently</td>
       <td><input type="radio" name="t12" value="3" unchecked required>Sometimes</td>
       <td><input type="radio" name="t12" value="2" unchecked required>Rarely</td>
       <td><input type="radio" name="t12" value="-2" unchecked required>Never</td>
</tr>
    <tr>
    <td width="90">13</td>
    <td width="400">Upload course materials in the web portal at appropriate time</td>
       <td><input type="radio" name="t13" value="5" unchecked required>Always</td>
       <td><input type="radio" name="t13" value="4" unchecked required>Often</td>
       <td><input type="radio" name="t13" value="3" unchecked required>Sometimes</td>
       <td><input type="radio" name="t13" value="2" unchecked required>Rarely</td>
       <td><input type="radio" name="t13" value="-2" unchecked required>Never</td>
</tr>
    <tr>
    <td width="90">14</td>
    <td width="400">Effectiveness of the course material uploaded</td>
    <td><input type="radio" name="t14" value="5" unchecked required>Excellent</td>
      <td> <input type="radio" name="t14" value="4" unchecked required>Very Good</td>
     <td>  <input type="radio" name="t14" value="3" unchecked required>Good</td>
       <td><input type="radio" name="t14" value="2" unchecked required>Satisfied</td>
       <td><input type="radio" name="t14" value="-2" unchecked required>Not satisfied</td>
</tr>
    <tr>
    <td width="90">15</td>
    <td width="400">Provides helpful information for preparing and writing examination</td>
       <td><input type="radio" name="t15" value="5" unchecked required>Always</td>
       <td><input type="radio" name="t15" value="4" unchecked required>Often</td>
       <td><input type="radio" name="t15" value="3" unchecked required>Sometimes</td>
       <td><input type="radio" name="t15" value="2" unchecked required>Rarely</td>
       <td><input type="radio" name="t15" value="-2" unchecked required>Never</td>
</tr>
    <tr>
    <td width="90">16</td>
    <td width="400">Prompt in evaluating and returning answer scripts, assignment sheets</td>
       <td><input type="radio" name="t16" value="5" unchecked required>Always</td>
       <td><input type="radio" name="t16" value="4" unchecked required>Often</td>
       <td><input type="radio" name="t16" value="3" unchecked required>Sometimes</td>
       <td><input type="radio" name="t16" value="2" unchecked required>Rarely</td>
       <td><input type="radio" name="t16" value="-2" unchecked required>Never</td>
</tr>
<tr>
    <td width="90">17</td>
    <td width="400">Provide feedback on performance improvement while distributing answer scripts</td>
       <td><input type="radio" name="t17" value="5" unchecked required>Always</td>
       <td><input type="radio" name="t17" value="4" unchecked required>Often</td>
       <td><input type="radio" name="t17" value="3" unchecked required>Sometimes</td>
       <td><input type="radio" name="t17" value="2" unchecked required>Rarely</td>
       <td><input type="radio" name="t17" value="-2" unchecked required>Never</td>
</tr>
    <tr>
    <td width="90">18</td>
    <td width="400">Fairness in evaluating answer scripts</td>
       <td><input type="radio" name="t18" value="5" unchecked required>Very Satisfied</td>
       <td><input type="radio" name="t18" value="4" unchecked required>Satisfied</td>
       <td><input type="radio" name="t18" value="3" unchecked required>Neutral</td>
       <td><input type="radio" name="t18" value="2" unchecked required>Slightly Dissatisfied</td>
       <td><input type="radio" name="t18" value="-2" unchecked required>Dissatisfied</td>
</tr>
    <tr>
    <td width="90">19</td>
    <td width="400">Courteous and unbiased in dealing with students</td>
       <td><input type="radio" name="t19" value="5" unchecked required>Very Satisfied</td>
       <td><input type="radio" name="t19" value="4" unchecked required>Satisfied</td>
       <td><input type="radio" name="t19" value="3" unchecked required>Neutral</td>
       <td><input type="radio" name="t19" value="2" unchecked required>Slightly Dissatisfied</td>
       <td><input type="radio" name="t19" value="-2" unchecked required>Dissatisfied</td>
</tr>
<tr>
    <td width="90">20</td>
    <td width="400">Offers assistance and counseling to the students beyond regular classes</td>
       <td><input type="radio" name="t20" value="5" unchecked required>Very Satisfied</td>
       <td><input type="radio" name="t20" value="4" unchecked required>Satisfied</td>
       <td><input type="radio" name="t20" value="3" unchecked required>Neutral</td>
       <td><input type="radio" name="t20" value="2" unchecked required>Slightly Dissatisfied</td>
       <td><input type="radio" name="t20" value="-2" unchecked required>Dissatisfied</td>
</tr>
</table>
  <center><strong>Comments(Max 200 characters)</strong><input type="text" name="Comments" style="width:1000px; margin:0px auto; display:block;" required></center>
 

<br>
    <input type="submit" name="submit" style="margin:0px auto; display:block;">
    </form>
    
      
    </body>
</html>
