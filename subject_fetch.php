<script> 
$(document).ready(function(){  
      $('#buttonid').click(function(){  
           var subcode = $("#subcodeid").val();  
           $.ajax({  
                url:"staff_fetch.php",  
                method:"POST", 
               data:{subcode:subcode},
                success:function(data){  
                     $('#sample').html(data);  
                }  
           });  
      });  
 });
</script>

<?php
require 'dbconnect.php';
session_start();
if(isset($_POST['sec']))
{

    $output = '';
    $batch=$_POST['batch'];
    $temp=intdiv($batch-2017,4);
    $reg=2017+(4*$temp);
    $sec=$_POST['sec'];
    $sem=$_POST['sem'];
    $dept=$_SESSION['hod'];
    $res=mysqli_query($scon,"Select * from subdetails where sem='$sem' and dept='$dept' and reg='$reg'");
    $output .= '<p class="h3" style="margin-bottom:30px">CHOOSE SUBJECTS</p>';
    while($row = mysqli_fetch_array($res))
  {
      $a=$row["subcode"]." ".$row["subname"];
    
   $output .=  '<div class="radio pl-2">
        <input type="radio" id="subcodeid" value="'.$row["subcode"].'" name="subcode" >
        <label for="inlineRadio2">'.$a.'</label>
      </div>';
       
  }
    $output.='<a href="addsubject.php">Click to add new subject if not present</a><br>';
    $output .='<button type="button" class=" py-2 btn btn-md btn-primary" id="buttonid" data-toggle="modal" data-target="#myModal">Load Staff
</button>';
  echo $output;
}


?>