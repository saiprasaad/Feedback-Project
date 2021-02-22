<?php
session_start();

$_SESSION['fuck']=-1;
    
if(isset($_POST['submit']))
{
    require 'dbconnect.php';
    $subcode=$_POST['subcode'];
     $subname=$_POST['subname'];
     $type=$_POST['type'];
     $sem=$_POST['sem'];
     $reg=$_POST['reg'];
     $dept=$_POST['dept'];
     $ugpg=$_POST['ugpg'];
    if(mysqli_query($scon,"insert into subdetails values('$subcode','$subname','$type','3','$sem','$reg','$dept','$ugpg')"))
    {
        $_SESSION['fuck']=1;
        header("Location: hodopen.php");
            exit;
        
    }
    else
    {
         $_SESSION['fuck']=0;
         header("Location: hodopen.php");
            exit;
    }
    
}
?>
<!DOCTYPE html>
<html>
 <head>
     
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <style>
    body {
    text-align: center;
}
form {
    
        margin-top: 40px;
    
    width:500px;
    display: inline-block;
}
    </style>
   
    
        <h1 style="text-align:center">Add Subjects</h1>
<body>
    
<form action="addsubject.php" method="post">
    <div class="py-5 d-inline-block">&nbsp;</div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Subject Code</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="staticEmail" name="subcode">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Subject Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" name="subname">
    </div>
  </div>
    <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Type</label>
    <div class="col-sm-10">
        <select name="type" class="form-control">
            <option value="select" selected disabled>--Select--</option>
        <option value="THEORY">Theory</option>
        <option value="LAB">Lab</option>
        </select>
      
    </div>
  </div>
    
     <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Semester</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="inputPassword" name="sem">
    </div>
  </div>
     <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Regulation</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="inputPassword" name="reg">
    </div>
  </div>
     <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Department</label>
    <div class="col-sm-10">
        <select class="form-control" name="dept">
    <option value="" disabled selected>Select Department</option>
    <option value="CSE">CSE</option>
    <option value="MECH">MECH</option>
    <option value="ECE">ECE</option>
    <option value="EEE">EEE</option>
    <option value="IT">IT</option>
    <option value="CHEMICAL">CHEM</option>
    <option value="CIVIL">CIVIL</option>
    <option value="ICE">ICE</option>
    <option value="EIE">EIE</option>
    <option value="BIO">BIOTECH</option>
            <option value='CI'>CI</option>
            <option value='PS'>PS</option>
            <option value='SE'>SE</option>
            <option value='CS'>CS</option>
            <option value='ME'>ME</option>
            <option value='PE'>PE</option>
            <option value='AE'>AE</option>
            <option value='M.B.A'>M.B.A</option>
            <option value='MBA-INT'>MBA-INT</option>
            <option value='MCA'>MCA</option>
          </select>
    </div>
  </div>
     <div class="form-group row">
         <label for="inputPassword" class="col-sm-2 col-form-label" name="ugpg">UG/PG</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="ugpg" id="exampleRadios2" value="UG">
  <label class="form-check-label" for="exampleRadios2">
    UG
  </label>
  <input class="form-check-input" type="radio"  style="margin-left:20px;" name="ugpg" id="exampleRadios2" value="PG">
  <label class="form-check-label" for="exampleRadios2">
    PG
  </label>
  </div>
    </div>
    <button class="btn btn-success" name="submit" value="submit">SUBMIT</button>
</form>
</body>
</html>