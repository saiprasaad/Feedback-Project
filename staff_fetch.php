<?php
require 'dbconnect.php';


    $output = '';
    $output .= '<p class="h3 py-2">SELECT STAFF</p>';
  
    if(isset($_POST['action']))
    {
        $cur=$_POST['query'];
        $res=mysqli_query($scon,"Select * from admin where staff_name like '%$cur%'");
    }
    else
    {
        $res=mysqli_query($scon,"Select * from admin");
    }
    
    while($row = mysqli_fetch_array($res))
  {
      $a=$row["staff_id"]." ".$row["staff_name"];
   $output .=  '<div class="radio pl-2">
        <input type="radio" id="staffid" value="'.$row["staff_id"].'" name="staffid" >
        <label for="inlineRadio2">'.$a.'</label>
      </div>';
  }
  echo $output;


?>