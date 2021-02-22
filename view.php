<?php 
 session_start();
$dept=$_SESSION['hod'];
 ?>
<html>
<head>
<title>View staff</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.Contain{
    margin-left:100px;
    margin-top:50px;
}
.mainn{
    margin-left:250px;
    margin-top:50px;
}
    table {
  border-collapse: collapse;
  border-spacing: 10px;  
}      
table td{
  border: 3px solid black;
}
        table th{
  border: 3px solid black;
}
</style>
<body>

    <h3><a href="logout.php" style="float:right; font-size:25px; font-color:red";><b>Logout</b></a></h3>
    <h3><a href="hodopen.php" style="float:left; font-size:25px; font-color:red";><b>Back</b></a></h3>
<div class='mainn'>
<form action="view.php" method="post">
<div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-2">
            <div class="form-group">
              <label><strong>Select Batch & Semester</strong></label>
              </div></div>
              <?php 
              if($dept=='M.B.A'){
              ?>
              <div class="col-lg-3">
            <div class="form-group">
              <select name="dep" class="form-control">

                  <option value="" disabled selected>Select Dept</option>
              <option value="M.B.A">MBA</option>
              <option value="MBA-INT">MBA-INT</option>
              </select>
            </div></div><?php }
            ?>
              <div class="col-lg-3">
            <div class="form-group">
              <select name="batch" class="form-control">
                  <option value="" disabled selected>Select Batch</option>
              <option value="2016">2016-2020</option>
              <option value="2017">2017-2021</option>
              <option value="2018">2018-2022</option>
             <option value="2019">2019-2023</option>
              </select>
            </div></div>

<div class="col-lg-3">
            <div class="form-group">
              <select name="sem" class="form-control">
                  <option value="" disabled selected>Select Semester</option>
              <option value="1">1</option>
<option value="2">2</option>

<option value="3">3</option>

<option value="4">4</option>

<option value="5">5</option>

<option value="6">6</option>

<option value="7">7</option>

<option value="8">8</option>


              </select>
            </div></div>

            <div class="col-lg-3">
            <div class="form-group">  
            <button class="btn btn-success" width="150px" name="sub" style="text-decoration: none;
                 font-size:120%">Get Info</button>
            </div>
        </div>


        </div>
    </div>
    </div>
    </form>

</div>
<?php

require "dbconnect.php";
if(isset($_POST['sub']))
{
$dept=$_SESSION['hod'];
//echo $dept;
$batch=$_POST['batch'];
if($dept=='M.B.A')
$dept=$_POST['dep'];
$sem=$_POST['sem'];
?>

<div class="Contain">
<?php
echo "<strong>BATCH  :  </strong>".$batch;echo "<br>";
 $res=mysqli_query($scon,"select sem,staffID,subcode from staffdetails where batch='$batch' and dept='$dept' and sec='A' and sem='$sem'");
 echo "<p style='margin-left:450px'>SECTION : A</p><br>";
 ?>

 <table>
<th>Subcode</th>
<th width="200px">Subject Name</th>
<th>Staff Name</th>
<?php
 while($row=mysqli_fetch_array($res))
    {
        $subcode=$row['subcode'];
        $staff=$row['staffID'];
        $res1=mysqli_query($scon,"select subname from subdetails where subcode='$subcode' and dept='$dept'");
        $row1=mysqli_fetch_array($res1);
        $res2=mysqli_query($scon,"select staff_name from admin where staff_id='$staff'");
        $row2=mysqli_fetch_array($res2);?>
        <tr>
        <td width=200> <?php echo $subcode; ?></td>
        <td width=500> <?php echo $row1['subname']; ?></td>
        <td width=400> <?php echo $row2['staff_name']; ?></td>
        </tr>
    <?php } ?>
    </table>
    <br>
    <?php
   $res=mysqli_query($scon,"select sem,staffID,subcode from staffdetails where batch='$batch' and dept='$dept' and sec='B' and sem='$sem'");
    
 echo "<p style='margin-left:450px'>SECTION : B</p><br>";
   ?>
   <table>
  <th>Subcode</th>
  <th width="200px">Subject Name</th>
  <th>Staff Name</th>
  <?php
   while($row=mysqli_fetch_array($res))
      {
          $subcode=$row['subcode'];
          $staff=$row['staffID'];
          $res1=mysqli_query($scon,"select subname from subdetails where subcode='$subcode' and dept='$dept'");
          $row1=mysqli_fetch_array($res1);
          $res2=mysqli_query($scon,"select staff_name from admin where staff_id='$staff'");
          $row2=mysqli_fetch_array($res2);?>
          <tr>
          <td width=200> <?php echo $subcode; ?></td>
          <td width=500> <?php echo $row1['subname']; ?></td>
          <td width=400> <?php echo $row2['staff_name']; ?></td>
          </tr>
      <?php } ?>
      </table>
   <br>
  <?php    $res=mysqli_query($scon,"select sem,staffID,subcode from staffdetails where batch='$batch' and dept='$dept' and sec='C' and sem='$sem'");

 echo "<p style='margin-left:450px'>SECTION : C</p><br>";
 ?>
 <table>
<th>Subcode</th>
<th width="200px">Subject Name</th>
<th>Staff Name</th>
<?php
 while($row=mysqli_fetch_array($res))
    {
        $subcode=$row['subcode'];
        $staff=$row['staffID'];
        $res1=mysqli_query($scon,"select subname from subdetails where subcode='$subcode' and dept='$dept'");
        $row1=mysqli_fetch_array($res1);
        $res2=mysqli_query($scon,"select staff_name from admin where staff_id='$staff'");
        $row2=mysqli_fetch_array($res2);?>
        <tr>
        <td width=200> <?php echo $subcode; ?></td>
        <td width=500> <?php echo $row1['subname']; ?></td>
        <td width=400> <?php echo $row2['staff_name']; ?></td>
        </tr>
    <?php } ?>
    </table>
       <br>
<?php 
    if($batch==2016)
    {
            $res=mysqli_query($scon,"select sem,staffID,subcode from staffdetails where batch='$batch' and dept='$dept' and sec='D' and sem='$sem'");

 echo "<p style='margin-left:450px'>SECTION : D</p><br>";
 ?>
 <table>
<th>Subcode</th>
<th width="200px">Subject Name</th>
<th>Staff Name</th>
<?php
 while($row=mysqli_fetch_array($res))
    {
        $subcode=$row['subcode'];
        $staff=$row['staffID'];
        $res1=mysqli_query($scon,"select subname from subdetails where subcode='$subcode' and dept='$dept'");
        $row1=mysqli_fetch_array($res1);
        $res2=mysqli_query($scon,"select staff_name from admin where staff_id='$staff'");
        $row2=mysqli_fetch_array($res2);?>
        <tr>
        <td width=200> <?php echo $subcode; ?></td>
        <td width=500> <?php echo $row1['subname']; ?></td>
        <td width=400> <?php echo $row2['staff_name']; ?></td>
        </tr>
    <?php } ?>
    </table><?php
    }

 }?>
</div>
</body>
</html>