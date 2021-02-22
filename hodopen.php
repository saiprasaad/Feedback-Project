<?php
session_start();
if(isset($_SESSION['hod'])=="")
{
    header("Location: logout.php");exit;
}
if($_SESSION['suc']==1)
    echo '<script type ="text/javascript">alert("Staff details recorded :)");</script>';
if($_SESSION['suc']==0)
    echo '<script type ="text/javascript">alert("Error :)");</script>';
if($_SESSION['fuck']==1)
{   
    $_SESSION['fuck']=-1;
    echo '<script type="text/javascript">alert("Submssion Successful");</script>';
     
}
if($_SESSION['fuck']==0)
{
    $_SESSION['fuck']=-1;
    echo '<script type="text/javascript">alert("Submssion Failed");</script>';
}
?>
<?php
$_SESSION['suc']=5; ?>
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
     <a href="logout.php" style="float:right; text-decoration:none; font-size:20px;">Logout</a><br>
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
                 <button class="btn btn-success"><a style="text-decoration: none; color:wheat; font-size:200%" href="dynamic_alloc.php">Staff Allocation</a></button>
            </div>
          </div>
        </div>
         
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
               <button class="btn btn-success" width="100px"><a href="view.php" style="text-decoration: none;
                   color:wheat; font-size:200%">View Staff Details</a></button>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
               <button class="btn btn-success" width="100px"><a href="hoddepartwise.php" style="text-decoration: none;
                   color:wheat; font-size:200%">Department Wise</a></button>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
               <button class="btn btn-success" width="100px"><a href="hodyearwise.php" style="text-decoration: none;
                   color:wheat; font-size:200%">Batch Wise</a></button>
            </div>
          </div>
        </div>

          </div>
        </div>
  
    
</form>
    </div>
</html>