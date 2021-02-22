<?php
session_start();
require 'dbconnect.php';
if(isset($_SESSION['admin'])=="")
  {
    header("Location: index.php");exit;
  }
    $staffid=$_SESSION['staffid'];
    $subcode=$_SESSION['subcode'];
    $dp=$_SESSION['dept'];
    $sec=$_SESSION['sec'];$i=1;
    $res=mysqli_query($scon,"select count(l1),AVG(l1),AVG(l2),AVG(l3),AVG(l4),AVG(l5),AVG(l6),AVG(l7),AVG(l8),AVG(l9),AVG(l10) from lab where sub_code='$subcode' and staff_id='$staffid' and section='$sec' and dept='$dp'");
    $row=mysqli_fetch_array($res);
     $res=mysqli_query($scon,"select * from subdetails where subcode='$subcode'");
    $row1=mysqli_fetch_array($res);
    $name=$row1['subname'];
    $sem=$row1['sem'];
    $percent=($row['AVG(l1)']+$row['AVG(l2)']+$row['AVG(l3)']+$row['AVG(l4)']+$row['AVG(l5)']+$row['AVG(l6)']+$row['AVG(l7)']+$row['AVG(l8)']+$row['AVG(l9)']+$row['AVG(l10)'])*2;
    function count1($t,$i)
    {
      global $staffid,$subcode,$sec,$scon;
      $res=mysqli_query($scon,"select COUNT('$t') as ct from lab where $t='$i' and sub_code='$subcode' and staff_id='$staffid' and section='$sec'");
      $row2=mysqli_fetch_assoc($res);
      return $row2["ct"];
      
    }
function test($i) // To Sum the count of score per cell
{
    $sum=0;
   $sum+= count1('l1',$i);   
//    echo count1('t1',$i);
    $sum+= count1('l2',$i);   
    $sum+= count1('l3',$i);  
 $sum+= count1('l4',$i);   
    $sum+= count1('l5',$i); 
    $sum+=count1('l6',$i);   
   
    $sum+=count1('l7',$i);   
    $sum+= count1('l8',$i);   
    $sum+= count1('l9',$i);   
    $sum+= count1('l10',$i);  
      
 echo $sum;
    echo " ";
}

?>
<!DOCTYPE html>
<html>
      <script>
    
             function printDiv() {
//                 var button = document.getElementById('show_button')
//    button.style.visibility = 'hidden';
//        //Print the page content
//        window.print()
//        button.style.visibility = 'visible';

                 window.print();
//                       }
             }
    </script>

    <style>
        table td{
  border: 3px solid black;
}
        table th{
  border: 3px solid black;
}

table {
  border-collapse: collapse;
  border-spacing: 10px;  
}
        @media print  
{
    
    #show_button {
    display: none;
  }
    #xyz{
          display: none;
    }
    .abcd{
        page-break-before: always;
    }
}
    </style>
    <head>
        <meta charset="utf-8">
        <title>Review</title>
    </head>    
    <body>
         <div align="center" id="printableArea1">
    <img src="college.jpg" width="1000px" height="170px"></div>
    
<!--
        <div align="right">
    <strong><a style="text-decoration:none" href="logout.php">Logout</a></strong></div><br>a
-->
        <div id="xyz"><a href="open.php" style="float:left; text-decoration:none; font-size:20px;">Home</a></div><br>
        
    
<!--
            
            <label><strong>STAFF-ID:</strong><?php echo $staffid;?></label>&nbsp;&nbsp;<label><strong>STAFF NAME:</strong><?php echo $_SESSION['name'];?></label>&nbsp;&nbsp;
            <label><strong>SUBJECT CODE:</strong><?php echo $subcode;?></label>&nbsp;&nbsp;
            <label><strong>SECTION:</strong><?php echo $sec;?></label>
            </center><br>
-->
            
        <div align="center" id="printableArea">
            <center><p style="font-size:20px"><strong>Student Feedback on Teacher(Practical)</strong></p></center><br>
           <center> <table id="table2">
        <tr>
            <th colspan="4">St. Joseph’s College Of Engineering OMR,Chennai-119</th>
        </tr>
        <tr>
            <td><strong>Academic year</strong></td>
            <td><?php echo $_SESSION['year']; ?></td>
            <td><strong>Name of the Faculty</strong></td>
            <td><?php echo $_SESSION['name'];?></td>
        </tr>
         <tr>
             <td><strong>Course Name</strong></td>
            <td><?php echo $name;?></td>
             <td><strong>Semester</strong></td>
            <td><?php echo $sem;?></td>
        </tr>
         <tr>
            <td><strong>Course Code</strong></td>
            <td><?php echo $subcode;?></td>
             <td><strong>Date of Feedback</strong></td>
            <td><?php echo date("d/m/Y");?></td>
        </tr>
    </table></center><br><br>
            <div align="center" style="font-size:20px;">
        <strong>Section:</strong><?php echo $sec ?>
        </div><br>
        <center><table cellspacing="20" height="500">
            <th>S.NO</th><th>Feedback against the
 following statements</th><th>Average</th>  <th>Total<br>submissions</th>
    <th>5</th> <th>4</th> <th>3</th> <th>2</th> <th>-2</th>     
        <tr required><td width="50">1.</td><td width="400">Inform about course outcomes (CO),program outcomes (POs) and does
the course delivery meets COs</td>
            <td><?php echo number_format($row['AVG(l1)'],2);?></td>
            <td><?php echo $row['count(l1)'];?></td>
  <td width="30"><?php echo count1('l1',5);   ?></td>
  <td width="30"><?php echo count1('l1',4);   ?></td>
  <td width="30"><?php echo count1('l1',3);   ?></td>
  <td width="30"><?php echo count1('l1',2);   ?></td>
  <td width="30"><?php echo count1('l1',-2);  ?></td>
            </tr>
            
        <tr required><td width="50">2.</td><td width="400">Preparedness for handling the class</td>
            <td><?php echo number_format($row['AVG(l2)'],2);?></td>
            <td><?php echo $row['count(l1)'];?></td>
  <td><?php echo count1('l2',5);   ?></td>
  <td><?php echo count1('l2',4);   ?></td>
  <td><?php echo count1('l2',3);   ?></td>
  <td><?php echo count1('l2',2);   ?></td>
  <td><?php echo count1('l2',-2);  ?></td></tr>
            
        <tr required><td width="50">3.</td><td width="400">Engages the classes regularly and maintains discipline</td>
            <td><?php echo number_format($row['AVG(l3)'],2);?></td>
            <td><?php echo $row['count(l1)'];?></td>
  <td><?php echo count1('l3',5);   ?></td>
  <td><?php echo count1('l3',4);   ?></td>
  <td><?php echo count1('l3',3);   ?></td>
  <td><?php echo count1('l3',2);   ?></td>
  <td><?php echo count1('l3',-2);  ?></td></tr>
            
        <tr required><td width="50">4.</td><td width="400">Helping the students in conducting the experiments through demonstrations</td>
            <td><?php echo number_format($row['AVG(l4)'],2);?></td>
            <td><?php echo $row['count(l1)'];?></td>
  <td><?php echo count1('l4',5);   ?></td>
  <td><?php echo count1('l4',4);   ?></td>
  <td><?php echo count1('l4',3);   ?></td>
  <td><?php echo count1('l4',2);   ?></td>
  <td><?php echo count1('l4',-2);  ?></td></tr>
            
        <tr required><td width="50">5.</td><td width="400">Help the students to explore the area of study involved in the experiment</td>
            <td><?php echo number_format($row['AVG(l5)'],2);?></td>
            <td><?php echo $row['count(l1)'];?></td>
  <td><?php echo count1('l5',5);   ?></td>
  <td><?php echo count1('l5',4);   ?></td>
  <td><?php echo count1('l5',3);   ?></td>
  <td><?php echo count1('l5',2);   ?></td>
  <td><?php echo count1('l5',-2);  ?></td></tr>
            
        <tr required><td width="50">6.</td><td width="400">Takes interest in conducting viva for clear understanding of the experiment</td>
            <td><?php echo number_format($row['AVG(l6)'],2);?></td>
            <td><?php echo $row['count(l1)'];?></td>
  <td><?php echo count1('l6',5);   ?></td>
  <td><?php echo count1('l6',4);   ?></td>
  <td><?php echo count1('l6',3);   ?></td>
  <td><?php echo count1('l6',2);   ?></td>
  <td><?php echo count1('l6',-2);  ?></td></tr>
            
        
        <tr required><td width="50">7.</td><td width="400">Regular checking of the laboratory observation/ records</td>
            <td><?php echo number_format($row['AVG(l7)'],2);?></td>
            <td><?php echo $row['count(l1)'];?></td>
  <td><?php echo count1('l7',5);   ?></td>
  <td><?php echo count1('l7',4);   ?></td>
  <td><?php echo count1('l7',3);   ?></td>
  <td><?php echo count1('l7',2);   ?></td>
  <td><?php echo count1('l7',-2);  ?></td></tr>
            
        <tr required><td width="50">8.</td><td width="400">Provides helpful information for preparing and writing examination</td>
            <td><?php echo number_format($row['AVG(l8)'],2);?></td>
            <td><?php echo $row['count(l1)'];?></td>
  <td><?php echo count1('l8',5);   ?></td>
  <td><?php echo count1('l8',4);   ?></td>
  <td><?php echo count1('l8',3);   ?></td>
  <td><?php echo count1('l8',2);   ?></td>
  <td><?php echo count1('l8',-2);  ?></td></tr>
            
        <tr required><td width="50">9.</td><td width="400">Prompt and fairness in evaluating experiments results</td><td><?php echo number_format($row['AVG(l9)'],2);?></td>
        <td><?php echo $row['count(l1)'];?></td>
  <td><?php echo count1('l9',5);   ?></td>
  <td><?php echo count1('l9',4);   ?></td>
  <td><?php echo count1('l9',3);   ?></td>
  <td><?php echo count1('l9',2);   ?></td>
  <td><?php echo count1('l9',-2);  ?></td></tr>
            
            
        <tr required><td width="50">10.</td><td width="400">Courteous and unbiased in dealing with students</td><td><?php echo number_format($row['AVG(l10)'],2);?></td>
        <td><?php echo $row['count(l1)'];?></td>
  <td><?php echo count1('l10',5);   ?></td>
  <td><?php echo count1('l10',4);   ?></td>
  <td><?php echo count1('l10',3);   ?></td>
  <td><?php echo count1('l10',2);   ?></td>
  <td><?php echo count1('l10',-2);  ?></td></tr>
            

            <tr>
    <td width="90"></td>
    <td width="400"><strong>Percentage</strong></td>
       <td><strong><?php echo number_format($percent,2);?></strong></td>
                <td></td>
 <td>  <?php  test(5); ?> </td>
    <td>  <?php  test(4); ?> </td>
    <td>  <?php  test(3); ?> </td>
    <td>  <?php  test(2); ?> </td>
    <td>  <?php  test(-2); ?> </td>
    

</tr>
    </table></center>
        </div>
        <br>
            <div align="center"  class="abcd" id="printableArea4">
   <center><p style="font-size:20px"><strong>Student Feedback on Teacher(Theory)</strong></p></center>

    <table id="table3">
        <tr>
            <th colspan="4">St. Joseph's College Of Engineering OMR,Chennai-119</th>
        </tr>
        <tr>
            <td><strong>Academic year</strong></td>
            <td><?php echo $_SESSION['year']; ?></td>
            <td><strong>Name of the Faculty</strong></td>
            <td><?php echo $_SESSION['name'];?></td>
        </tr>
         <tr>
             <td><strong>Course Name</strong></td>
            <td><?php echo $name;?></td>
             <td><strong>Semester</strong></td>
            <td><?php echo $sem;?></td>
        </tr>
         <tr>
            <td><strong>Course Code</strong></td>
            <td><?php echo $subcode;?></td>
             <td><strong>Date of Feedback</strong></td>
            <td><?php echo date("d/m/Y");?></td>
        </tr>
        </table></div><br>
        <div align="center" style="font-size:20px;">
	  <strong>Department:</strong><?php echo $_SESSION['dept'];?>
        <strong>Section:</strong><?php echo $sec ?>
        </div>
            <div id="printableArea2" style="margin-left:130px">
                
                <br><br>
                    <u><strong>COMMENTS</strong></u><br><br>
        <?php
        $res=mysqli_query($scon,"select comments from lab where sub_code='$subcode' and staff_id='$staffid' and section='$sec'");
        while($list = mysqli_fetch_assoc($res)){
            $comment=$list['comments'];
        ?>
        <label><?php echo $i,".",$comment ?></label><br>
        <?php $i++;}?>
            
                </div>
        <br>
       <div align="center">
     <button id="show_button" onclick="printDiv();">Save as Pdf</button></div>
        </form>

     </body>
</html>
