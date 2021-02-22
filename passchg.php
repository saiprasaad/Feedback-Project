<?php
session_start();
require "dbconnect.php";
if(isset($_POST['submit']))
{
$roll=$_SESSION['student'];
$old=$_POST['old'];
$new=$_POST['new'];
$res=mysqli_query($scon,"SELECT * from student where RollNo='$roll'");
$row=mysqli_fetch_array($res);
$old1=$row['password'];
if($old1==$old)
{
    if(mysqli_query($scon,"Update student set password='$new' where RollNo='$roll'"))
    echo '<script type="text/javascript">alert("Successfully Changed Password");</script>';
header('Location:logout.php');
}
else
{
    echo '<script type="text/javascript">alert("Invalid Old Password");</script>';
}
}
?>
<style>
        .btn{min-width:285px;}
        .user{
    margin-left:41%;
    height:700px;
    width:600px;
    margin-top:200px;
    font-size:15px;
}
    </style>
<div class="user">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     
    <form action="passchg.php" method="post">
        <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">    
               <label>Old Password</label>
               <input type="password" class='form-control' name="old">
            </div>
          </div>
        </div>
           <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
            <label>New Password</label>
               <input type="password" class='form-control' name="new">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9">
            <div class="form-group">
            <button class="btn btn-success" name="submit">Change</button>
            </div>
          </div>
        </div>
          </div>
        </div>
</form>
    </div>