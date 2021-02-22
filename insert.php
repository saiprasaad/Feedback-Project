<?php
session_start();

 
?>



<html>
<body>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .col-md-12
    {
        margin-left: 270px;
        margin-top:100px;
}
    body{
        background-color:deepskyblue;
    }
    label{
        font-size: 20px;
    }
    .sub{
        margin-left:100px;
    }
</style>
    <form action="insert.php" method="post">
<div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label><strong>Batch</strong></label>
                
              <select name="batch" class="form-control">
                  <option value="" disabled selected>Select Batch</option>
              <option value="2016">2016-2020</option>
              <option value="2017">2017-2021</option>
              <option value="2018">2018-2022</option>
             <option value="2019">2019-2023</option>
              </select>
          
            </div>
          </div>
            <div class="col-md-2">
            <div class="form-group">
              <label><strong>Semester</strong></label>
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
          
                
            </div>
          </div>
            <div class="col-md-2">
            <div class="form-group">
              <label><strong>Department</strong></label>
              <select name="dept" class="form-control">
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

              </select>
          
            </div>
          </div>
            <div class="col-md-2">
            <div class="form-group">
              <label><strong>Section</strong></label>
              <select name="sec" class="form-control">
                <option value="" disabled selected>Select Section</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              </select>
          
            </div>
          </div>
        </div>
          <div class="row"><br><br>
              <button style="margin-left:480px" type="submit" name="sub" class="btn btn-lg btn-danger">Get Info</button>
          </div>
    </div>
    </div>
        </form>
        <?php if(isset($_POST['sub'])){
    $batch=$_POST['batch'];
    $dept=$_POST['dept'];
    $sec=$_POST['sec'];
    $sem=$_POST['sem'];


  echo '<script type="text/javascript">alert("For Multiple staffs use + (Example TCS01+TCS02)");</script>';
  ?>
    <form action="staffalloc.php" method="post">
    <div class="sub">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Batch :<?php echo $batch; ?></label>
</div>
                    </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Section :<?php echo $sec; ?></label>
</div>
                    </div>
                   <div class="col-lg-4">
                    <div class="form-group">
                        <label>Department :<?php echo $dept; ?></label>
</div>
                    </div> 
                    
                </div>
                
                
                <div class="row">
                <div class="col-lg-2">
                    <div class="form-group">
                        <label>Subcode</label>
</div>
                    </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Subject Name</label>
</div>
                    </div>
                   <div class="col-lg-3">
                    <div class="form-group">
                        <label>StaffID</label>
</div>
                    </div> 
                    
                </div>
    <?php 
    require 'dbconnect.php';

    
    if($batch==2016)
        $reg=2013;
    else
        $reg=2017;
    $res=mysqli_query($scon,"select * from subdetails where dept='$dept' and sem='$sem' and reg='$reg'");
    
                +
                    $_SESSION['count']=0;
                $i=0;
    while($row=mysqli_fetch_assoc($res))
    {
        $subcode="sub".$i;
        $staff="staff".$i;
        $i++;
        $_SESSION['count']=$i;
     ?> 
    <input type="hidden" name="info" value="<?php echo $dept,"-",$sec,"-",$batch,"-",$sem; ?>">
    <div class="row">
    <div class="col-lg-2">
    <div class="form-group">
    <input type="text" name="<?php echo $subcode; ?>" value="<?php echo $row['subcode']; ?>" class="form-control" readonly>
    </div>
    </div>
       <div class="col-lg-6">
           <div class="form-group">
           <label><?php echo $row['subname']; ?></label>
        
           </div>
        </div> 
        <div class="col-lg-3">
            <div class="form-group">
        <input type="text" name="<?php echo $staff;?>" class="form-control">  
        </div>
       </div>
    </div>  
    
  <?php  } ?>
    
    </div>
            <br>
          <center>  <button type="submit" name="staffalloc" class="btn btn-lg btn-success">SUBMIT</button></center>
            
    </div>
    </div>
    </form>
    
   <?php } ?> 
</body>
</html>