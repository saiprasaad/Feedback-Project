<?php
session_start();
if(isset($_SESSION['hod'])=='')
{
 header("Location: index.php");exit;}?>
<html>
    <style>
        #dept{
            margin-top:100px;
/*            margin-left: 800px;*/
        }
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

        .ptag{
            margin-left:570px;
     margin-bottom: 30px;
        }
    </style>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <img src="college.jpg" width="1000px" height="170px"><br>
        <br><br>
        <center>
            <p style="font-size:18px"><strong>Date Of Feedback:<?php echo date("d/m/Y");?></strong></p><br>
                    <p style="font-size:18px"><strong>Academic Year:2019</strong></p></center><br>
                    
        </div>
      <a style="float:left; font-size:20px;" href="hodopen.php">Home</a><br><br>
    <form action="hoddepartwise.php" method="post">
   <div class="row" style="margin-left:500">
      <div class="col-lg-12">
          <!--          <a href="open.php" style="float:left; text-decoration:none; font-size:20px;">Back</a><br>-->
<!--<form action="open.php" method="post">-->
                    <div class="row">
            <div class="col-lg-3">
            <div class="form-group">
<label><strong>TYPE</strong></label>
                <select name="type" id="type" class="form-control">
                    <option value=""selected="true" disabled="disabled">--Select--</option>
    <option value="THEORY">Theory</option>
    <option value="LAB">Lab</option>
        </select>
                </div>
            </div>

        </div>
           <div class="row">
            <div class="col-lg-3">
            <div class="form-group">
<label><strong>SEMESTER</strong></label>
                <select name="sem" id="type" class="form-control">
                    <option value=""selected="true" disabled="disabled">--Select--</option>
<!--
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
-->
            <option value="odd">Odd</option>
            <option value="even">Even</option>
                </select>
                </div>
            </div>

        </div>
                 </div>
        </div>
              <br><br>
       <div align="center">
        <button type="submit" name="submit" class="btn btn-danger">Get Info</button>
           </div>
       <br><br><br>
        <div align="center" id="printableArea">
            <br><br>
    
<?php
    require "dbconnect.php";

        if(isset($_POST['submit'])){
    $dept1=$_SESSION['hod'];
                $type=$_POST['type'];
            $stype=$_POST['sem'];
            
//            console.log($rang);
//                echo $type;
            ?>
        <center><strong><p style="font-size:22px"><?php echo "Department:",$dept1;?></p></strong></center>
        <br><br><br>
            
            <?php
            if($dept1=="CSE")
    $sql = "select * from admin WHERE dept='$dept1' order by priority";
            else
    $sql = "select * from admin WHERE dept='$dept1'";
  $res = mysqli_query($scon,$sql);   
  ?>
            <table>
        <tr>
    <th>Batch</th>
    <th>StaffID</th>
    <th>Staff Name</th>
    <th>Department</th>
	<th>Sem</th>
    <th>Subject Code</th>
    <th>Subject Name</th>
    <th>Section</th>
    <th>Performance</th>
    </tr>
    <?php    
  while($list = mysqli_fetch_assoc($res)){
    $category = $list['staff_id'];
      $username=$list['staff_name'];
    if($stype=='odd')
$sql1="select * from staffdetails where staffID = '$category' and subcode IN(select subcode from subdetails) and (sem='1' or sem='3' or sem='5' or sem='7')";
      else
$sql1="select * from staffdetails where staffID = '$category' and subcode IN(select subcode from subdetails) and (sem='2' or sem='4' or sem='6' or sem='8')";
    $res1=mysqli_query($scon,$sql1);
      while($list1=mysqli_fetch_assoc($res1))
      {
//          session_start();
		$sem=$list1['sem'];
          $bat=$list1['batch'];
          $sec=$list1['sec'];
          $sub=$list1['subcode'];
          $de=$list1['dept'];
          $sid=$list1['staffID'];
          $sql2="select type,subname from subdetails where subcode='$sub' and dept='$de' and type='$type'";
         $res2=mysqli_query($scon,$sql2);
        $row2=mysqli_fetch_array($res2);
          $suname=$row2['subname'];
          $ty=$row2['type'];
//            echo $ty;
          if($type=="THEORY")
          {
$res3=mysqli_query($scon,"select AVG(t1),AVG(t2),AVG(t3),AVG(t4),AVG(t5),AVG(t6),AVG(t7),AVG(t8),AVG(t9),AVG(t10),AVG(t11),AVG(t12),AVG(t13),AVG(t14),AVG(t15),AVG(t16),AVG(t17),AVG(t18),AVG(t19),AVG(t20) from theory where sub_code='$sub' and staff_id='$category' and section='$sec' and batch='$bat'");
      $row3=mysqli_fetch_array($res3);
        
      $percent=($row3['AVG(t1)']+$row3['AVG(t2)']+$row3['AVG(t3)']+$row3['AVG(t4)']+$row3['AVG(t5)']+$row3['AVG(t6)']+$row3['AVG(t7)']+$row3['AVG(t8)']+$row3['AVG(t9)']+$row3['AVG(t10)']+$row3['AVG(t11)']+$row3['AVG(t12)']+$row3['AVG(t13)']+$row3['AVG(t14)']+$row3['AVG(t15)']+$row3['AVG(t16)']+$row3['AVG(t17)']+$row3['AVG(t18)']+$row3['AVG(t19)']+$row3['AVG(t20)']);
          }
          else
          {
              $res3=mysqli_query($scon,"select AVG(l1),AVG(l2),AVG(l3),AVG(l4),AVG(l5),AVG(l6),AVG(l7),AVG(l8),AVG(l9),AVG(l10)from lab where sub_code='$sub' and staff_id='$category' and section='$sec' and batch='$bat'");
    $row3=mysqli_fetch_array($res3); $percent=($row3['AVG(l1)']+$row3['AVG(l2)']+$row3['AVG(l3)']+$row3['AVG(l4)']+$row3['AVG(l5)']+$row3['AVG(l6)']+$row3['AVG(l7)']+$row3['AVG(l8)']+$row3['AVG(l9)']+$row3['AVG(l10)'])*2;
          }
          if($percent==0.0)
          continue;
          ?>
<!--          <option value="<?php echo $percent?>"><?php echo $ty,"-",$suname,"-",$de,"-",$bat,"-",$sec,"-",$sid,"-",$username,"-",$sub,"-",$percent?></option>-->
        <tr>
            <td width="70px"><?php echo $bat;?></td>
            <td width="70px"><?php echo $sid;?></td>
            <td width="370px"><?php echo $username;?></td>
            <td width="140px"><?php echo $de;?></td>
		<td width="70px"><?php echo $sem; ?></td>
            <td width="140px"><?php echo $sub;?></td>
            <td width="470px"><?php echo $suname;?></td>
            <td width="120px"><?php echo $sec;?></td>
            <td><?php echo number_format($percent,2);?></td>
        </tr>
           <?php
      }
      ?>
             
                   
<!--           <option value="hi">Hi</option>-->
       <?php 
  }
            ?></table><br><br><br>

            <?php
        }
?>
              <br>
        </div>
        <div align="center" class="box">
       <button class="btn btn-primary" onclick="printDiv('printableArea','printableArea1')" value="print a div!">Save as PDF</button>
       </div>
        </form>
</html>

