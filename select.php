
<div align="center">
    <img src="college.jpg" width="1000px" height="170px"></div><br><br>
  <a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br><br>
    
    <form action="select.php" method="post">
        <fieldset>
        <legend style="text-align:center; margin-left:100px; font-size:30px;">Subject Wise Details</legend>
        <br><br>
    
        <div align="center">
            <strong>Select Batch</strong>
    <select name="batch">
    <option value="2016">2016</option>
   <option value="2017">2017</option>
    <option value="2018">2018</option>
<option value="2019">2019</option>
    
</select>
            <br><br><br>
            <div align="center">
            <strong>Select Dept</strong>
    <select name="dept">
    <option value="CSE">CSE</option>
   <option value="ECE">ECE</option>
    <option value="EEE">EEE</option>
        <option value="IT">IT</option>
<option value="CHEMICAL">CHEMICAL</option>
<option value="MECH">MECHANICAL</option>
<option value="CIVIL">CIVIL</option>
<option value="EIE">EIE</option>
<option value="BIO">BIOTECH</option>
<option value="ICE">ICE</option>
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
                </select><br><br><br>
<strong>Select sem</strong>
<select name="sem">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select><br><br><br>
                <strong>Select Type</strong>
                <select name="type">
    <option value="THEORY">Theory</option>
    <option value="LAB">Practical</option>
    </select>
                <br><br><br>
        
     <button type="submit" onclick="unhide();">Get Staff Details</button>
            </div>
            
            <br><br><br>
        
     </form>
<form action="select1.php" method="get">
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
$_SESSION['dept']=$dept1;
    $t=$_POST['type'];
    $_SESSION['type']=$t;
    $sem=$_POST['sem'];
    $_SESSION['sem']=$sem;
  echo $sem;
if($dept1=='M.B.A' && $sem==3)
{
$sql = "select staff_id,staff_name from admin WHERE Staff_id IN(select DISTINCT StaffID from mbastaffdetails)";
}
else
{
  $sql = "select staff_id,staff_name from admin WHERE Staff_id IN(select DISTINCT StaffID from staffdetails where dept='$dept1' and batch='$ba' and type='$t' and sem='$sem')";
}
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
    
    
    
    
  <input type="submit" name="submit">
            </div>
    </div>
        </fieldset>
    </form>
