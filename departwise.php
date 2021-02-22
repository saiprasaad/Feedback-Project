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
<!--                    <p style="font-size:18px"><strong>Academic Year:2019</strong></p>-->
         </center><br>
                    
        </div>
      <a style="float:right; font-size:20px;" href="open.php">Home</a><br><br>
    <form action="departwisefpdf.php" method="post">
   <div class="row" style="margin-left:600px">
      <div class="col-lg-12">
<div class="row">
            <div class="col-lg-3">
            <div class="form-group">
<label><strong>ACADEMIC YEAR</strong></label>
                <select name="academicyear" id="academicyear" class="form-control">
    <option value=""selected="true" disabled="disabled">--Select--</option>
    <option value="2019">2019-20</option>
    <option value="2020">2020-21</option>
    <option value="2021">2021-22</option>
        </select>
                </div>

              </div>

        </div>

          <div class="row">
            <div class="col-lg-3">
            <div class="form-group">
<label><strong>UG/PG</strong></label>
                <select name="ugpg" id="ugpg" class="form-control" onChange="ugpgfn(this.value)";>
    <option value=""selected="true" disabled="disabled">--Select--</option>
    <option value="UG">UG</option>
    <option value="PG">PG</option>
        </select>
                </div>

              </div>

        </div>
           
<!--          <a href="open.php" style="float:left; text-decoration:none; font-size:20px;">Back</a><br>-->
<!--<form action="open.php" method="post">-->
          
        <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label><strong>DEPT</strong></label>
                <select name="dp" id='dept1' class="form-control">
                    <option value=""selected="true" disabled="disabled">--Select--</option>
                    <script>
            var ty;
         function ugpgfn(value)
        {
            ty=value;
//            console.log(ty);
               if(ty=="UG")
                   {
                   
//                       var semval="1";
//                       var semval1="2";
                       var tyOptions = "";
                       tyOptions +="<option> </option>";
               tyOptions += "<option value='CSE'>" + "CSE" + "</option>";
                     tyOptions += "<option value='IT'>" + "IT" + "</option>";
                       tyOptions += "<option value='EEE'>" + "EEE" + "</option>";
                       tyOptions += "<option value='EIE'>" + "EIE" + "</option>";
                       tyOptions += "<option value='ECE'>" + "ECE" + "</option>";
                       tyOptions += "<option value='MECH'>" + "MECH" + "</option>";
                       tyOptions += "<option value='BIO'>" + "BIO" + "</option>";
                       tyOptions += "<option value='ICE'>" + "ICE" + "</option>";
                       tyOptions += "<option value='CHEMICAL'>" + "CHEMICAL" + "</option>";
                       tyOptions += "<option value='CIVIL'>" + "CIVIL" + "</option>";
                       tyOptions += "<option value='MATHS'>" + "MATHS" + "</option>";
                       tyOptions += "<option value='ENGLISH'>" + "ENGLISH" + "</option>";
                       tyOptions += "<option value='CHEMISTRY'>" + "CHEMISTRY" + "</option>";
                       tyOptions += "<option value='PHYSICS'>" + "PHYSICS" + "</option>";
              //  semOptions += "<option>" + semval1 + "</option>";
            document.getElementById("dept1").innerHTML = tyOptions;
                   }
            else
                {
                    var tyOptions = "";
                       tyOptions +="<option> </option>";
               tyOptions += "<option value='M.B.A'>" + "MBA" + "</option>";
                     tyOptions += "<option value='M.C.A'>" + "MCA" + "</option>";
                       tyOptions += "<option value='CI'>" + "CI" + "</option>";
                       tyOptions += "<option value='PS'>" + "PS" + "</option>";
                       tyOptions += "<option value='SE'>" + "SE" + "</option>";
                       tyOptions += "<option value='CS'>" + "CS" + "</option>";
                       tyOptions += "<option value='ME'>" + "ME" + "</option>";
                       tyOptions += "<option value='PE'>" + "PE" + "</option>";
                       tyOptions += "<option value='AE'>" + "AE" + "</option>";
                       tyOptions += "<option value='MBA-INT'>" + "MBA-INT   " + "</option>";
              //  semOptions += "<option>" + semval1 + "</option>";
            document.getElementById("dept1").innerHTML = tyOptions;
                }
        }
                  </script>

                   
                  </select>
                    
              </div>
            </div>
          </div>
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

            <option value="ODD">Odd</option>
            <option value="EVEN">Even</option>
                </select>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-lg-3">
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-danger btn-block">Get Info</button>
                </div>
            </div>

        </div>




                 </div>
        </div>
             
       <br><br><br>
        <div align="center" id="printableArea">
            <br><br>
    
<?php
    require "dbconnect.php";
        if(isset($_POST['submit'])){
    $dept1=$_POST['dept1'];
                $type=$_POST['type'];
            $gtype=$_POST['ugpg'];
            $stype=$_POST['sem'];
            
//            console.log($rang);
//                echo $type;
            ?>
        <center><strong><p style="font-size:22px"><?php echo "Department:",$dept1;?></p></strong></center>
        <br><br><br>
            <center><p style="font-size:24px">UG</p></center><br><br><br>
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
$sql1="select * from staffdetails where staffID = '$category' and subcode IN(select subcode from subdetails where ugpg='UG') and (sem='1' or sem='3' or sem='5' or sem='7')";
      else
$sql1="select * from staffdetails where staffID = '$category' and subcode IN(select subcode from subdetails where ugpg='UG') and (sem='2' or sem='4' or sem='6' or sem='8')";
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
    $dept1=$_POST['dept1'];
                $type=$_POST['type'];
            $gtype=$_POST['ugpg'];
            $stype=$_POST['sem'];
//                echo $type;
            ?>
        <center>
            <p style="font-size:24px">PG</p><br><br><br><?php
           
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
$sql1="select * from staffdetails where staffID = '$category' and subcode IN(select subcode from subdetails where ugpg='PG') and (sem='1' or sem='3' or sem='5' or sem='7')";
else
    $sql1="select * from staffdetails where staffID = '$category' and subcode IN(select subcode from subdetails where ugpg='PG') and (sem='2' or sem='4' or sem='6' or sem='8')";
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
//          if($percent==0.0)
//          continue;
       
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
            ?></table>

            <?php
        }
?>
              <br>
        </div>
        
        </form>
</html>
