<?php 
require "dbconnect.php"; 

session_start();
if(isset($_SESSION['admin'])=="")
    {
        header("Location: index.php");
        exit;
    }?>
<html>
<title>SubmissionInfo</title>
<style>
    table td{
/*        width: 10px;*/
  border: 3px solid black;
  text-align:center;
}
        table th{
  border: 3px solid black;
}

table {
  border-collapse: collapse;
  border-spacing: 5px;  
  width:70%
}
</style>
<br><br>
  <a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br><br>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <div style="margin-top:100px">
<table align="center">
<tr>
<th rowspan="3">Department</th>
    <th colspan="3">Batch 2019</th>
<th colspan="3">Batch 2018</th>
<th colspan="3">Batch 2017</th>
<!--<th colspan="4">Batch 2016</th>-->
    
</tr>    
<tr>
<th colspan="3">Semester 3</th>
<th colspan="3">Semester 5</th>
<th colspan="3">Semester 7</th>
<!--<th colspan="4">Semester 8</th>-->
</tr>
<tr>
<th>A</th>
<th>B</th>
<th>C</th>
<th>A</th>
<th>B</th>
<th>C</th>
<th>A</th>
<th>B</th>
<th>C</th>
<!--
<th>A</th>
<th>B</th>
<th>C</th>
-->
</tr>
<?php 
$res1=mysqli_query($scon,"Select distinct dept from student");
while($list=mysqli_fetch_array($res1))
{
  $dept=$list['dept'];
?>
<tr>
<td><?php echo $dept;?></td>
    
    
    
    
    
    <?php
    $res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and batch=2019 and sec='A'");
    $row1=mysqli_fetch_array($res);
$count1=$row1['ct'];
$res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and flag!='' and batch=2019 and sec='A'");
$row=mysqli_fetch_array($res);
$count=$row['ct'];
if($count > 0)
echo "<td><i class='material-icons' style='color:green;font-size:40px;'>check</i>$count/$count1</td>";
else
    echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
    $res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and batch=2019 and sec='B'");
    $row1=mysqli_fetch_array($res);
$count1=$row1['ct'];
$res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and flag!='' and batch=2019 and sec='B'");
$row=mysqli_fetch_array($res);
$count=$row['ct'];
if($count > 0)
echo "<td><i class='material-icons' style='color:green; font-size:40px;'>check</i>$count/$count1</td>";
else
echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
    $res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and batch=2019 and sec='C'");
    $row1=mysqli_fetch_array($res);
$count1=$row1['ct'];
$res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and flag!='' and batch=2019 and sec='C'");
$row=mysqli_fetch_array($res);
$count=$row['ct'];
if($count > 0)
echo "<td><i class='material-icons' style='color:green;font-size:40px;'>check</i>$count/$count1</td>";
else
    echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
//    echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
 ?>   
    
    
    
    
    
    
    
    
<?php
    $res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and batch=2018 and sec='A'");
    $row1=mysqli_fetch_array($res);
$count1=$row1['ct'];
$res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and flag!='' and batch=2018 and sec='A'");
$row=mysqli_fetch_array($res);
$count=$row['ct'];
if($count > 0)
echo "<td><i class='material-icons' style='color:green;font-size:40px;'>check</i>$count/$count1</td>";
else
    echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
    $res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and batch=2018 and sec='B'");
    $row1=mysqli_fetch_array($res);
$count1=$row1['ct'];
$res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and flag!='' and batch=2018 and sec='B'");
$row=mysqli_fetch_array($res);
$count=$row['ct'];
if($count > 0)
echo "<td><i class='material-icons' style='color:green; font-size:40px;'>check</i>$count/$count1</td>";
else
echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
    $res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and batch=2018 and sec='C'");
    $row1=mysqli_fetch_array($res);
$count1=$row1['ct'];
$res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and flag!='' and batch=2018 and sec='C'");
$row=mysqli_fetch_array($res);
$count=$row['ct'];
if($count > 0)
echo "<td><i class='material-icons' style='color:green;font-size:40px;'>check</i>$count/$count1</td>";
else
    echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
//    echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
$res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and batch=2017 and sec='A'");
    $row1=mysqli_fetch_array($res);
$count1=$row1['ct'];

$res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and flag!='' and batch=2017 and sec='A'");
$row=mysqli_fetch_array($res);
$count=$row['ct'];
if($count > 0)
echo "<td><i class='material-icons' style='color:green;font-size:40px;'>check</i>$count/$count1</td>";
else
    echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
    $res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and batch=2017 and sec='B'");
    $row1=mysqli_fetch_array($res);
$count1=$row1['ct'];

$res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and flag!='' and batch=2017 and sec='B'");
$row=mysqli_fetch_array($res);
$count=$row['ct'];
if($count > 0)
echo "<td><i class='material-icons' style='color:green;font-size:40px;'>check</i>$count/$count1</td>";
else
    echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
    
    $res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and batch=2017 and sec='C'");
    $row1=mysqli_fetch_array($res);
$count1=$row1['ct'];

$res=mysqli_query($scon,"SELECT COUNT(*) as ct from student where dept='$dept' and flag!='' and batch=2017 and sec='C'");
$row=mysqli_fetch_array($res);
$count=$row['ct'];
if($count > 0)
echo "<td><i class='material-icons' style='color:green;font-size:40px;'>check</i>$count/$count1</td>";
else
    echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";
//    echo "<td><i class='material-icons' style='color:red;font-size:40px;'>close</i></td>";

}
?>
</table>
</div>
</html>