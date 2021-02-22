<form action="practical.php" method="post">
<select name="staff">
<?php
    $sec=$_SESSION['sec'];
    $sub=$_SESSION['sub'];
    $batch=$_SESSION['batch'];
    $scon1=mysqli_connect('localhost','root','','login');
    $scon=mysqli_connect('localhost','root','',$batch);
$res=mysqli_query($scon,"Select staffID from staffdetails where subjectcode='$sub' and section='$sec'");
    while($row=mysqli_fetch_array($res)){
    $staff=$row['staffID'];
    $res=mysqli_query($scon,"select staff_name from admin where staff_id='$staff'");
    $row1=mysqli_fetch_array($res);
    $name=$row1['staff_name'];  
    ?>
    <option value="<?php echo $staff,"-",$name ?>"><?php echo $staff,"-",$name ?></option>
        
  <?php  }
?>
</select>
</form>