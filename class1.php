<?php
session_start();
require "dbconnect.php";
if(isset($_SESSION['admin']))
{
    if(isset($_POST['submit']))
    {
    $section=$_POST['sec'];
    $batch=$_POST['batch'];
    $sem=$_POST['sem'];
    $yr=$_POST['acayear'];  
    $dept=$_POST['dept'];
    
    $res=mysqli_query($scon,"select subcode,staffID from staffdetails where batch='$batch' and year='$yr'and sec='$section' and dept='$dept' and subcode IN (select subcode from subdetails where sem='$sem' and dept='$dept')");
?>
<style>table td{
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
<script>
             function printDiv(divName,divName1) {
     var printContents = document.getElementById(divName).innerHTML;
    var printContents1 = document.getElementById(divName1).innerHTML;
    var printcontent=printContents1+printContents;
     var originalContents = document.body.innerHTML;            
     document.body.innerHTML = printcontent;
                 
     window.print();

//    document.getElementsByClassName("box").style.display = 'none';
     document.body.innerHTML = originalContents;
}
        

</script>

 <div align="center" id="printableArea1">
    <img src="college.jpg" width="700px" height="140px">
<br/>
<b>Date: <b><?php echo date("d/m/Y");?></b><br/>

<center><p style="font-size:25px;"><strong>Department of </strong><?php echo $dept;?></p></center>
</div>
<!--<p style="text-align: center; font-size:28px">-->
    <br><a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br>
<div align="center" id="printableArea">
<br><br>
<center>
<p style="font-size:20px;"><strong>BATCH : </strong><?php echo $batch;?>&nbsp;&nbsp;
    <strong>YEAR:</strong><?php echo $yr;?>&nbsp;&nbsp;
<strong>SEMESTER:</strong><?php echo $sem;?>&nbsp;&nbsp;
<strong>SECTION:</strong><?php echo $section;?></p></center>
<p>&nbsp;</p><table>
<tbody>
<tr>
<td width="300">
<p><strong>Subject Code</strong></p>
</td>
<td width="300">
<p><strong>Subject Name</strong></p>
</td>
<td width="300">
<p><strong>Staff Name</strong></p>
</td>
<td width="300">
<p><strong>Performance</strong></p>
</td>
</tr>
<?php
//if(isset($_SESSION['admin']))
//{
    /*if(isset($_POST['submit']))
    {
    $section=$_POST['sec'];
   // $db=$_POST['batch'];
   $db=$_POST['batch'];
    $yr=$_POST['acayear'];
    $dept=$_POST['dept'];
    $scon=mysqli_connect('localhost','root','',$db);
    $res=mysqli_query($scon,"select subjectcode,staffID from staffdetails where year='$yr'and section='$section' and dept='$dept'");*/
         while($row1=mysqli_fetch_assoc($res))
    {
        $code=$row1['subcode'];
        $staffid=$row1['staffID'];
        $res2=mysqli_query($scon,"select staff_name from admin where staff_id='$staffid'");
        $row2=mysqli_fetch_array($res2);
        $name=$row2['staff_name'];
        if($batch==2016)
            $db1=2013;
        else
            $db1=2017;
            $sub=mysqli_query($scon,"select subname from subdetails where subcode='$code' and reg='$db1'");
            $rrr=mysqli_fetch_array($sub);
            $subname=$rrr['subname'];
            if($_POST['type']=="theory"){

        $res1=mysqli_query($scon,"select AVG(t1),AVG(t2),AVG(t3),AVG(t4),AVG(t5),AVG(t6),AVG(t7),AVG(t8),AVG(t9),AVG(t10),AVG(t11),AVG(t12),AVG(t13),AVG(t14),AVG(t15),AVG(t16),AVG(t17),AVG(t18),AVG(t19),AVG(t20) from theory where sub_code='$code' and staff_id='$staffid' and section='$section' and (dept='1' or dept='$dept') and batch='$batch'");
        $row=mysqli_fetch_array($res1);
        $percent=$row['AVG(t1)']+$row['AVG(t2)']+$row['AVG(t3)']+$row['AVG(t4)']+$row['AVG(t5)']+$row['AVG(t6)']+$row['AVG(t7)']+$row['AVG(t8)']+$row['AVG(t9)']+$row['AVG(t10)']+$row['AVG(t11)']+$row['AVG(t12)']+$row['AVG(t13)']+$row['AVG(t14)']+$row['AVG(t15)']+$row['AVG(t16)']+$row['AVG(t17)']+$row['AVG(t18)']+$row['AVG(t19)']+$row['AVG(t20)'];
        if($percent==0.0)
            continue; 
    }
             else
             {
                 $res1=mysqli_query($scon,"select AVG(l1),AVG(l2),AVG(l3),AVG(l4),AVG(l5),AVG(l6),AVG(l7),AVG(l8),AVG(l9),AVG(l10)from lab where sub_code='$code' and staff_id='$staffid' and section='$section' and batch='$batch' and (dept='1' or dept='$dept')");
        $row=mysqli_fetch_array($res1);
 $percent=($row['AVG(l1)']+$row['AVG(l2)']+$row['AVG(l3)']+$row['AVG(l4)']+$row['AVG(l5)']+$row['AVG(l6)']+$row['AVG(l7)']+$row['AVG(l8)']+$row['AVG(l9)']+$row['AVG(l10)'])*2.0;
        if($percent==0.0)
            continue; 

             }
        ?>
    <tr>
        <td><?php echo $code; ?></td>
        <td><?php echo $subname; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo number_format($percent,2); ?></td>
    </tr>
    <?php
    }
        ?>
         </tbody>
    </table></div><br><br><br>
     <div align="center">
    <button class="btn btn-primary" onclick="printDiv('printableArea','printableArea1')" value="print a div!">Save as PDF</button>
</div>
    <?php
    }
}
?>