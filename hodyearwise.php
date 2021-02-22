<?php
session_start();?>
<html>
<title>Select batch</title>
<style>
.user{
    margin-left:37%;
    height:600px;
    width:600px;
    margin-top:130px;
}
</style>
<body>
     <div align="center">
    <img src="college.jpg" width="1000px" height="140px"></div>
<br><br>

      <a style="float:left; font-size:20px;" href="hodopen.php">Home</a><br><br>

<br><br>

<div class="user">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<form action="yearwiseres.php" method="post">
<div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label><strong>Batch</strong></label>
              <select name="batch" class="form-control">
              <option value="2016">2016-2020</option>
              <option value="2017">2017-2021</option>
              <option value="2018">2018-2022</option>
              <option value="2019">2019-2023</option>

              </select>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label><strong>Dept</strong></label>
                <select name='dept' class="form-control"><?php
	$temp=$_SESSION['hod'];
                echo '<option value="'.$temp.'">'.$temp.'</option>';?></select>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label><strong>Type</strong></label>
              <select name="type" class="form-control">
              <option value="THEORY">Theory</option>
              <option value="LAB">Lab</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
           <div class="col-lg-6">
              <div class="form-group">
          <button type="submit" name="login" class="form-control btn btn-lg btn-success">Get Info</button>
          <?php if(isset($errMSG)) echo '<script type="text/javascript">alert("Invalid userID or password");</script>'; ?>
             </div> 
           </div>
        </div>
          
    </div>
  </div>
</form>
</div>
</body>
</html>



