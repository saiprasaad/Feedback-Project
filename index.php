<?php
session_start();
require "dbconnect.php";
if(isset($_POST['login']))
{ 
    if(isset($_SESSION['student']))
    {
        header("Location: home.php");
        exit;
    }

    if(isset($_SESSION['staff']))
    {
        header("Location: staff.php");
        exit;
    }
    if(isset($_SESSION['admin']))
    {
        header("Location: open.php");
        exit;
    }
$errMSG='';
    $errMSG1='';
$id=$_POST["username"];
$password=$_POST["password"];
$selection=$_POST["group"];
/*if($selection=="staff")
{
    $res=mysqli_query($scon,"SELECT * FROM admin WHERE staff_id='$id'");
    $row=mysqli_fetch_array($res);
    if($row['password']==$password)
    {   
        $_SESSION['staff']=$row['staff_id'];
        header("Location: staff.php");
    }
    else
        $errMSG="Invalid data <br>";
}*/
if($selection=="student")
{
    $d= date("Y/m/d");
//    echo $d;
    $flag=0;
    $res=mysqli_query($scon,"SELECT * FROM student WHERE RollNo='$id'");
    $row=mysqli_fetch_array($res);
//    echo $row['dept'];
//    if($row['dept']=="CSE" || $row['dept']=="IT")
//    {
//        if($d=="2020/11/09")
//        {
//            $flag=1;
////            echo 'hi';
//        }
//    }
//    else if($row['dept']=="EEE" || $row['dept']=="ECE")
//    {
//        if($d=="2020/11/10")
//        {
//            $flag=1;
////            echo 'hi';
//        }
//    }
//    if($row['dept']=="MECH" || $row['dept']=="EIE")
//    {
//        if($d=="2020/11/11")
//        {
//            $flag=1;
////            echo 'hi';
//        }
//    }
//    if($row['dept']=="BIO" || $row['dept']=="CHEMICAL" || $row['dept']=="CIVIL" || $row['dept']=="ICE")
//    {
//        if($d=="2020/11/12")
//        {
//            $flag=1;
////            echo 'hi';
//        }
//    }
    if($row['password']==$password)
    {   
         $_SESSION['student']=$row['RollNo'];
         $_SESSION['sec']=$row['sec'];
         $_SESSION['batch']=$row['batch'];
         $_SESSION['dept']=$row['dept'];
         $_SESSION['reg']=$row['RegNo'];
        $_SESSION['name']=$row['Student_Name'];
         header("Location: home.php");
    }
    else{
        $errMSG="Invalid data <br>";}
}
else if($selection=="admin")
{
    if($id=="admin" && $password=="feedback@admin123")
    {
        $_SESSION['admin']=$id;
        header("Location: open.php");
    }
    else
        $errMSG="Invalid data <br>";
}
    else if($selection=="hod")
    {
        $res=mysqli_query($scon,"select * from hod where user='$id'");
        $row=mysqli_fetch_array($res);
        if($row['pass']==$password)
        {
            $_SESSION['hod']=$row['dept'];
            $_SESSION['suc']=5;
            $_SESSION['fuck']=-1;
            header("Location: hodopen.php");
        }
        else
            $errMSG="Invalid data <br>";
    }
}
    
?>  
    
    

<html>
<title>Login</title>
<style>
.user{
    margin-left:40%;
    height:600px;
    width:600px;
    margin-top:130px;
}
</style>
<body>
     <div align="center">
    <img src="college.jpg" width="1000px" height="140px"></div>
<div class="user">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<form action="index.php" method="post">
<div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label style="font-size:20px;"><strong>Userid</strong></label>
              <input type="text" name="username" required class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label style="font-size:20px;"><strong>Password</strong></label>
                <input type="password" name="password" required class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
            <label style="font-size:20px;"><strong>Select</strong></label><br>
            <select name="group" class="form-control">
            <option value="student" >Student</option>   
            <option value="admin">Admin</option>
                <option value="hod">Head Of Dept</option>
                
            </select>
            </div>
          </div>
        </div>
        <div class="row">
           <div class="col-lg-6">
              <div class="form-group">
          <button type="submit" name="login" class="form-control btn btn-lg btn-success">Login</button>
          <?php if(isset($errMSG)) echo '<script type="text/javascript">alert("Invalid userID or password");</script>';  ?>
             </div> 
           </div>
        </div>
    </div>
  </div>
</form>
</div>
</body>
</html>


