<?php
session_start();
if(isset($_SESSION['student'])=="")
{
    header("Location: index.php");exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        .btn{min-width:300px;}
        .user{
    margin-left:41%;
    height:600px;
    width:600px;
    margin-top:130px;
}
    </style>
<head>
    <title> part1 </title>  
    </head>
    <div align="center">
    <img src="college.jpg" width="1000px" height="170px"></div>
    <a href="passchg.php" style="float:left; text-decoration:none; font-size:20px;">Change Password</a><br>
     <a href="logout.php" style="float:right; text-decoration:none; font-size:20px;">Logout</a><br>
<div style="font-size:25px">
<p>Welcome <?php echo $_SESSION['name']?></p>
</div> 
    <div class="user">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     
    <form>
        <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">    
                 <button class="btn btn-success"><a style="text-decoration: none; color:wheat; font-size:200%" href="selection1.php" >FEEDBACK FORM(THEORY)</a></button>
            </div>
          </div>
        </div>
           <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
               <button class="btn btn-success" width="100px"><a href="selection2.php" style="text-decoration: none;
                   color:wheat; font-size:200%">FEEDBACK FORM(PRACTICAL)</a></button>
            </div>
          </div>
        </div>
         
        
          </div>
        </div>
  
    
</form>
    </div>
</html>