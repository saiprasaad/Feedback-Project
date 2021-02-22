<html>
     <script>
function myFunction() {
    
  window.print();
//document.getElementById("ah").style.display:'none';
}
</script>
<style>
table td{
    border: 1px solid black;
}
table th{
    border: 1px solid black;
}
table {
    border-collapse:collapse;
    border-spacing:5px;
}
</style>
     <div align="center">
         <img src="college.jpg" width="1000px" height="170px"></div><br>
    <a href="open.php">Home</a>
    <fieldset>
        <legend style="text-align:center; margin-left:100px; font-size:30px;">BATCH DETAILS</legend><br><br><br>
<div align="center">
<form action="overalllab.php" method='post'>
    <strong >Year</strong>
    <select name="year">
    <option value="2019">2019</option>
    </select>
     <strong>Batch</strong>
    
<select name="batch">
   
<option value="2016">2016-2020</option>
<option value="2017">2017-2021</option>
<option value="2018">2018-2022</option>
</select><br><br>
     <strong>Department</strong>
<select name="dept">
    
<option value="CSE">CSE</option>
<option value="ECE">ECE</option>
<option value="EEE">EEE</option>
<option value="IT">IT</option>
<option value="CHEMICAL">CHEMICAL</option>
<option value="MECH">MECHANICAL</option>
<option value="CIVIL">CIVIL</option>
<option value="EIE">EIE</option>
<option value="BIO">BIOTECH</option>
</select><br><br><br>
<button type="submit" name="bat">Get Info</button>
<!--<a href="select.php" style="margin-left:250px;">View Individual Performance</a>-->
</form>
    </div>
</fieldset>
</html>
<?php
require 'dbconnect.php';
session_start();
if(isset($_SESSION['admin'])=="")
    {
        header("Location: index.php");
        exit;
    }
if(isset($_POST['bat']))
{
    if($_POST['batch']==2016)
    $batch=2013;
    else
    $batch=2017;
    //if($_POST['batch']=='batch_18' || $_POST['batch']=='batch_17' )
    //$bat="batch_17";
    //else
    //$bat="batch_16";
    ?>
<center><strong><p style="font-size:25px;"><?php echo $_POST['batch'];?></p></strong></center>
    <?php
    $dept=$_POST['dept'];
    $year=$_POST['batch'];
    //$_SESSION['depart']=$dept;
    //$scon=mysqli_connect('localhost','root','',$_SESSION['batch']);
    //$scon1=mysqli_connect('localhost','root','',$bat);
    $res=mysqli_query($scon,"select * from staffdetails where dept='$dept' and batch='$year'");
    ?>
    <br><br>
<div align="center">
    <table>
    <tr>
    <th>Semester</th>
    <th>Subject Code</th>
    <th>Subject Name</th>
    <th>Staff ID</th>
    <th>Staff Name</th>
    <th>Section</th>
    <th>Performance</th>
    </tr>
    <?php
    while($list=mysqli_fetch_assoc($res))
    {
        $subcode=$list['subcode'];
        $section=$list['sec'];
        $staff=$list['staffID'];
      $query="select staff_name from admin where staff_id='$staff'";
        $staffr=mysqli_query($scon,$query);
        $staffrr=mysqli_fetch_array($staffr);
        $staffname=$staffrr['staff_name'];
        $semdet=mysqli_query($scon,"select sem,subname from subdetails where subcode='$subcode' and reg='$batch'");
        $r=mysqli_fetch_array($semdet);
        $sem=$r['sem'];$name=$r['subname'];
        $res1=mysqli_query($scon,"select AVG(l1),AVG(l2),AVG(l3),AVG(l4),AVG(l5),AVG(l6),AVG(l7),AVG(l8),AVG(l9),AVG(l10)from lab where sub_code='$subcode' and staff_id='$staff' and section='$section' and batch='$year'");
        //$res2=mysqli_query($scon,"select AVG(l1),AVG(l2),AVG(l3),AVG(l4),AVG(l5),AVG(l6),AVG(l7),AVG(l8),AVG(l9),AVG(l10) from lab where sub_code='$subcode' and staff_id='$staff' and section='$section'");
        $row=mysqli_fetch_array($res1);
        //$row1=mysqli_fetch_array($res2);
        $percent=($row['AVG(l1)']+$row['AVG(l2)']+$row['AVG(l3)']+$row['AVG(l4)']+$row['AVG(l5)']+$row['AVG(l6)']+$row['AVG(l7)']+$row['AVG(l8)']+$row['AVG(l9)']+$row['AVG(l10)'])*2.0;
        //$percent1=(($row1['AVG(l1)']+$row1['AVG(l2)']+$row1['AVG(l3)']+$row1['AVG(l4)']+$row1['AVG(l5)']+$row1['AVG(l6)']+$row1['AVG(l7)']+$row1['AVG(l8)']+$row1['AVG(l9)']+$row1['AVG(l10)'])*2);
        if($percent==0.0)
        continue;
        else{
        ?>
        <tr>
        <td><?php echo $sem; ?></td>
        <td><?php echo $subcode; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $staff; ?></td>
        <td><?php echo $staffname; ?>   </td>
        <td><?php echo $section; ?></td>
        <td><?php echo $percent; ?></td>
        </tr>
        <?php }
       // else{
         ?>
         <!--<tr>
        <td><?php// echo $sem; ?></td>
        <td><?php //echo $subcode; ?></td>
        <td><?php //echo $name; ?></td>
        <td><?php //echo $staff; ?></td>
        <td><?php //echo $section; ?></td>
        <td><?php //echo $percent; ?></td>
        </tr>-->
    <?php  } 
}
?>
</table>
    <br><br>
    <div align="center">
     <button class="but" onclick="myFunction()">Save as PDF</button></div>
    </div>
