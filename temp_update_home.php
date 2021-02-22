<?php
require 'dbconnect.php';
$sem=$_GET['sem'];
$dept=$_GET['dept'];
$yr=$_GET['year'];
$batch=$_GET['batch'];

    echo $sem;

    echo $dept;

    echo $yr;

    echo $batch;
$res=mysqli_query($scon,"select * from subdetails where reg=2017 and sem='$sem' and dept='$dept' and  type='LAB'");
?>
<form action="temp_update_restaff" method="post">
<?php
    $i=0;
while($row=mysqli_fetch_array($res))
{
    $staff="staff".$i;
    echo $row['subcode']," ",$row['subname'];
    ?>
    <input type="text" name="<?php echo $staff; ?>"><br>
    
<?php
    $i++;
}

?>
    <input type="text" name="details" value="<?php echo $sem,"*",$dept,"*",$yr,"*",$batch; ?>">
    <input type="submit">
    </form>