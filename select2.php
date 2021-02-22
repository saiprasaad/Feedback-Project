<?php// if(isset($_SESSION['admin'])=="")
    //{
      //  header("Location: index.php");
       // exit;
    //}
?>

<?php
session_start();
$bat=$_SESSION['batch'];
require "dbconnect.php";
//$scon=mysqli_connect('localhost','root','',$_SESSION['batch']);
$staff1=$_GET['staffid'];
    $type=$_GET['type'];
//    $flag=1;
//    if($_SESSION['batch']=="batch_17" || $_SESSION['batch']=="batch_18")
//    $bat="batch_17";
//    else
//    $bat="batch_16";
//    $scon1=mysqli_connect('localhost','root','',$bat);
//    if($type=="yes")
//    $flag=0;
    $staff2=explode("-",$staff1);
    $staff=$staff2[0]; 
    $_SESSION['name']=$staff2[1]; 
  $sql = "SELECT * FROM `staffdetails` WHERE staffID='$staff' and subcode IN (select subcode from subdetails where type='$type')";
  $res = mysqli_query($scon,$sql);
?>
<html>
<body>
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
  border-collapse: collapse;
  border-spacing: 10px;  
}
</style>
    <div align="center">
        <img src="college.jpg" width="700px" height="170px"><br>
        
<!--        <a href="open.php">Home</a>-->
        <a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br>
<table>
    
    <tr>
        <th colspan="6">Name of the faculty :<?php echo $_SESSION['name']; ?></th>
    </tr>
    <tr>
        <td width="180px"><strong>Subject code</strong></td>
        <td width="180px"><strong>Subject name</strong></td>
        <td width="180px"><strong>Semester</strong></td>
        <td width="180px"><strong>Department</strong></td>
        <td width="180px"><strong>Section</strong></td>
        <td width="180px"><strong>Performance</strong></td>
    </tr>
    <?php 
  while($list = mysqli_fetch_assoc($res)){
    $category = $list['staffID'];
    $username=$list['subcode'];
    $section=$list['sec'];
    $dp=$list['dept'];
      $res2=mysqli_query($scon,"select * from subdetails where subcode='$username'");
      $row2=mysqli_fetch_array($res2);
      if($type=='LAB'){
      $res1=mysqli_query($scon,"select AVG(l1),AVG(l2),AVG(l3),AVG(l4),AVG(l5),AVG(l6),AVG(l7),AVG(l8),AVG(l9),AVG(l10)from lab where sub_code='$username' and staff_id='$category' and section='$section' and batch='$bat' and (dept='1' or dept='$dp')");
    $row=mysqli_fetch_array($res1); $percent=($row['AVG(l1)']+$row['AVG(l2)']+$row['AVG(l3)']+$row['AVG(l4)']+$row['AVG(l5)']+$row['AVG(l6)']+$row['AVG(l7)']+$row['AVG(l8)']+$row['AVG(l9)']+$row['AVG(l10)'])*2;
    }
    else{
      $res1=mysqli_query($scon,"select AVG(t1),AVG(t2),AVG(t3),AVG(t4),AVG(t5),AVG(t6),AVG(t7),AVG(t8),AVG(t9),AVG(t10),AVG(t11),AVG(t12),AVG(t13),AVG(t14),AVG(t15),AVG(t16),AVG(t17),AVG(t18),AVG(t19),AVG(t20) from theory where sub_code='$username' and staff_id='$category' and section='$section' and batch='$bat' and (dept='1' or dept='$dp')");
      $row=mysqli_fetch_array($res1);
      $percent=($row['AVG(t1)']+$row['AVG(t2)']+$row['AVG(t3)']+$row['AVG(t4)']+$row['AVG(t5)']+$row['AVG(t6)']+$row['AVG(t7)']+$row['AVG(t8)']+$row['AVG(t9)']+$row['AVG(t10)']+$row['AVG(t11)']+$row['AVG(t12)']+$row['AVG(t13)']+$row['AVG(t14)']+$row['AVG(t15)']+$row['AVG(t16)']+$row['AVG(t17)']+$row['AVG(t18)']+$row['AVG(t19)']+$row['AVG(t20)']);
    }
    if($percent ==0.0)
    continue;
?>
    
    <tr>
    <td><?php echo $username; ?></td><td><?php echo $row2['subname']; ?></td><td><?php echo $row2['sem']; ?></td>
<td><?php echo $dp; ?></td><td><?php echo $section ?></td><td><?php echo number_format($percent,2); ?></td></tr><br><br>
    <?php } ?></table>
        </div>
    <br><br>
    <div align="center">
    <button class="but" onclick="myFunction()">Save as PDF</button></div>
</body>
</html>