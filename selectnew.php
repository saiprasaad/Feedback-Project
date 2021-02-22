
<div align="center">
    <img src="college.jpg" width="1000px" height="170px"></div><br><br>
  <a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br>
    
    <form action="selectnew.php" method="post">
        <fieldset>
        <legend style="text-align:center; margin-left:100px; font-size:30px;">
            Individual Performance Details</legend>
        <br><br>
    
        <div align="center">
            <strong>Select Batch</strong>
    <select name="batch">
    <option value="2016">2016-2020</option>
   <option value="2017">2017-2021</option>
    <option value="2018">2018-2022</option>
    <option value="2019">2019-2023</option>    
</select>
            <br><br><br>
            <div align="center">
            <strong>Select DEPT</strong>
    <select name="dept">
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
<option value="M.C.A">M.C.A</option>
<option value="M.B.A">M.B.A</option>

<option value='CI'>CI</option>
<option value='PS'>PS</option>
<option value='SE'>SE</option>
<option value='CS'>CS</option>
<option value='ME'>ME</option>
<option value='PE'>PE</option>
<option value='AE'>AE</option>
        <option value='MBA-INT'>MBA-INT</option>
     </select>
                <br><br><br>
        
     <button type="submit" onclick="unhide();">Get Staff Details</button>
            </div>
            
            <br><br><br>
        
     </form>
<form action="select2.php" method="get">
     <div class="staff" id="staff">
    <div align="center">
       
<select name="staffid" id="staffid" >
<?php 
session_start();
if(isset($_SESSION['admin'])=="")
    {
        header("Location: index.php");
        exit;
    }
require "dbconnect.php";
//  $scon=mysqli_connect('localhost','root','',$_SESSION['batch']);  
  //$dept1=$_SESSION['depart'];
    $dept1=$_POST['dept'];
  $ba=$_POST['batch'];
    $_SESSION['batch']=$ba;
  $sql = "select staff_id,staff_name from admin WHERE Staff_id IN(select DISTINCT StaffID from staffdetails where dept='$dept1' and batch='$ba')";
  $res = mysqli_query($scon,$sql);
  while($list = mysqli_fetch_assoc($res)){
    $category = $list['staff_id'];
      $username=$list['staff_name'];
    //$username=$list['StaffName'];
      //$html="<html>"
    //$options = $list['options'];
?>

<option value="<?php echo $category,"-",$username?>"><?php echo $category,"-",$username?></option>


<?php 
  }
?>
    </select>
    
    
    
    <select name="type">
    <option value="THEORY">Theory</option>
    <option value="LAB">Practical</option>
    </select>
  <input type="submit" name="submit">
            </div>
    </div>
        </fieldset>
    </form>
