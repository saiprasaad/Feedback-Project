<?php
require 'dbconnect.php';
if(isset($_POST['action']))
{

    if($_POST['query']!='')
    {
    $output = '';
    $inp=$_POST['query'];
    $res=mysqli_query($scon,"Select * from admin where staff_id like '$inp%'");
    while($row = mysqli_fetch_array($res))
  {
      $a=$row["staff_id"]." ".$row["staff_name"];
      $output .= '<p>'.$a.'</p>';
  }
  echo $output;
}
}


?>