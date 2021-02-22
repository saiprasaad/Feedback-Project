<?php
session_start();
require 'dbconnect.php';
$output = '';
$batch=$_POST['batch'];
$sec=$_POST['sec'];
$sem=$_POST['sem'];
$dept=$_SESSION['hod'];
if($sec=="default" || $sem=="default" || $batch=="default")
{
    echo '<p>Please Select Semester , Section and Batch to load the staff</p>';
    exit;
}
else
{
$res=mysqli_query($scon,"Select * from staffdetails where sem='$sem' and dept='$dept' and sec='$sec' and batch='$batch'");

$output .= '<div class="col-lg-12"><p class="h3 text-center">Staff Details</p>';
$output .='<br>';
while($row = mysqli_fetch_array($res))
{
    $id=$row['staffID'];
    $staffQuery=mysqli_query($scon,"select staff_name from admin where staff_id='$id'");
    $staff_row=mysqli_fetch_array($staffQuery);
    $staffname=$staff_row['staff_name'];
    $a=$row["subcode"]." - ".$staffname." - ".$row["staffID"];
    $output .= '<p class="py-1 h5 text-dark">'.$a.'</p>';
}
$output.='</div>';
echo $output;
}
    

?>