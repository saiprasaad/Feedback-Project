<html>
<title>YearWiseResult</title>
<style>table td{
  border: 1px solid black;
  text-align:left;
}
        table th{
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  border-spacing: 10px;  
}
    </style>
 <script>
function myFunction() {
    
  window.print();
//document.getElementById("ah").style.display:'none';
}
</script>
<div align="center">
<img src="college.jpg" width="700px" height="170px"></div>
<a href='yearwise.php' style="float:left; text-decoration:none; font-size:20px;">Back</a>

<?php
require "dbconnect.php";
session_start();

if(isset($_SESSION['admin']))
  echo "<a href='open.php' style='float:right; text-decoration:none; font-size:20px;'>Home</a><br><br>";
else
echo "<a href='hodopen.php' style='float:right; text-decoration:none; font-size:20px;'>Home</a><br><br>";

if(isset($_SESSION['admin'])|| isset($_SESSION['hod'])){
if(isset($_POST['login']))
{
    $dept=$_POST['dept'];
    $type1=$_POST['type'];
    $batch=$_POST['batch'];
    $sql="Select * from staffdetails where dept='$dept' and batch='$batch' order by performance desc";
    $res=mysqli_query($scon,$sql);
    ?>
    <div align="center">
<p style="font-size:20px;"><strong>BATCH:</strong><?php echo $batch;?>&nbsp;&nbsp;
    <strong>DEPT:</strong><?php echo $dept;?>&nbsp;&nbsp;
</div>
<div align="center">
<table>
<tr>
<td width="100">
<p><strong>Staff ID</strong></p>
</td>
<td width="300">
<p><strong>Staff Name</strong></p>
</td>
<td width="100">
<p><strong>Semester</strong></p>
</td>
<td width="100">
<p><strong>Subject Code</strong></p>
</td>
<td width="400">
<p><strong>Subject Name</strong></p>
</td>
<td width="100">
<p><strong>Section</strong></p>
</td>
<td width="100">
<p><strong>Performance</strong></p>
</td>
</tr>
    <?php
    while($list=mysqli_fetch_assoc($res))
    {
        $staffid=$list['staffID'];
        $subcode=$list['subcode'];
        $section=$list['sec'];
        $res1=mysqli_query($scon,"Select subname,type,sem from subdetails where subcode='$subcode' and dept='$dept'");
        $ty=mysqli_fetch_array($res1);
        $type=$ty['type'];
        $subname=$ty['subname'];
        $sem=$ty['sem'];
        $res1=mysqli_query($scon,"Select staff_name from admin where staff_id='$staffid'");
        $row2=mysqli_fetch_array($res1);
        $staffname=$row2['staff_name'];
       // $res1=mysqli_query($scon,"Select staff_name from admin where staffID in (Select staffID from staffdetails where dept='$dept' and batch='$batch')
        if($type1=="THEORY")
        {
            $res1=mysqli_query($scon,"select AVG(t1),AVG(t2),AVG(t3),AVG(t4),AVG(t5),AVG(t6),AVG(t7),AVG(t8),AVG(t9),AVG(t10),AVG(t11),AVG(t12),AVG(t13),AVG(t14),AVG(t15),AVG(t16),AVG(t17),AVG(t18),AVG(t19),AVG(t20) from theory where sub_code='$subcode' and staff_id='$staffid' and section='$section' and batch='$batch' and (dept='1' or dept='$dept')");
            $row=mysqli_fetch_array($res1);
           $percent=$row['AVG(t1)']+$row['AVG(t2)']+$row['AVG(t3)']+$row['AVG(t4)']+$row['AVG(t5)']+$row['AVG(t6)']+$row['AVG(t7)']+$row['AVG(t8)']+$row['AVG(t9)']+$row['AVG(t10)']+$row['AVG(t11)']+$row['AVG(t12)']+$row['AVG(t13)']+$row['AVG(t14)']+$row['AVG(t15)']+$row['AVG(t16)']+$row['AVG(t17)']+$row['AVG(t18)']+$row['AVG(t19)']+$row['AVG(t20)'];
          if($percent==0.0)
          continue;
           ?><tr>
          <td><?php echo $staffid;?></td>
          <td><?php echo $staffname;?></td>
          <td><?php echo $sem;?></td>
          <td><?php echo $subcode;?></td>
          <td><?php echo $subname;?></td>
          <td><?php echo $section;?></td>
          <td><?php echo number_format($percent,2);?></td></tr>
           <?php 
        }
        else
        {
            $res1=mysqli_query($scon,"select AVG(l1),AVG(l2),AVG(l3),AVG(l4),AVG(l5),AVG(l6),AVG(l7),AVG(l8),AVG(l9),AVG(l10)from lab where sub_code='$subcode' and staff_id='$staffid' and section='$section' and (dept='1' or dept='$dept')");
            $row=mysqli_fetch_array($res1);
            $percent=($row['AVG(l1)']+$row['AVG(l2)']+$row['AVG(l3)']+$row['AVG(l4)']+$row['AVG(l5)']+$row['AVG(l6)']+$row['AVG(l7)']+$row['AVG(l8)']+$row['AVG(l9)']+$row['AVG(l10)'])*2.0;
            if($percent==0.0)
                continue;
            ?>
            <tr>
          <td><?php echo $staffid;?></td>
          <td><?php echo $staffname;?></td>
          <td><?php echo $sem;?></td>
          <td><?php echo $subcode;?></td>
          <td><?php echo $subname;?></td>
          <td><?php echo $section;?></td>
          <td><?php echo number_format($percent,2);?></td></tr>
            
       <?php }

    }

}
}
?>
</table>
</div><br><br>
<div align="center">
    <button class="but" onclick="myFunction()">Save as PDF</button></div>
</html>