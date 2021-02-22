    <?php
session_start();
require 'dbconnect.php';
if(isset($_SESSION['admin'])=="")
  {
    header("Location: index.php");exit;
  }
//if(isset())
//{
//    $staff=$_GET['staffdetails'];
//    $staff1=explode("-",$staff);
    //$scon=mysqli_connect('localhost','root','',$_SESSION['batch']);
    $staffid=$_SESSION['staffid'];$i=1;
    $subcode=$_SESSION['subcode'];
    $bat=$_SESSION['batch'];
    $sec=$_SESSION['sec'];
    $dp=$_SESSION['dept'];
    $res=mysqli_query($scon,"select COUNT(t1),AVG(t1),AVG(t2),AVG(t3),AVG(t4),AVG(t5),AVG(t6),AVG(t7),AVG(t8),AVG(t9),AVG(t10),AVG(t11),AVG(t12),AVG(t13),AVG(t14),AVG(t15),AVG(t16),AVG(t17),AVG(t18),AVG(t19),AVG(t20) from theory where sub_code='$subcode' and staff_id='$staffid' and section='$sec' and batch='$bat' and (dept='$dp' or dept='1')");
    $row=mysqli_fetch_array($res);
    $res=mysqli_query($scon,"select * from subdetails where subcode='$subcode'");
    $row1=mysqli_fetch_array($res);
    $name=$row1['subname'];
    $sem=$row1['sem'];
   $percent=$row['AVG(t1)']+$row['AVG(t2)']+$row['AVG(t3)']+$row['AVG(t4)']+$row['AVG(t5)']+$row['AVG(t6)']+$row['AVG(t7)']+$row['AVG(t8)']+$row['AVG(t9)']+$row['AVG(t10)']+$row['AVG(t11)']+$row['AVG(t12)']+$row['AVG(t13)']+$row['AVG(t14)']+$row['AVG(t15)']+$row['AVG(t16)']+$row['AVG(t17)']+$row['AVG(t18)']+$row['AVG(t19)']+$row['AVG(t20)'];

   $upd=mysqli_query($scon,"update staffdetails set performance='$percent' where staffID='$staffid' and subcode='$subcode' and batch='$bat' and dept='$dp' and sec='$sec'");
   function count1($t,$i)
   {
     global $staffid,$subcode,$sec,$scon,$bat,$dp;
     $res=mysqli_query($scon,"select COUNT('$t') as ct from theory where $t='$i' and sub_code='$subcode' and staff_id='$staffid' and section='$sec' and batch='$bat' and (dept='$dp' or dept='1')");
     $row2=mysqli_fetch_assoc($res);
     return $row2["ct"];
     
   }
function test($i) // To Sum the count of score per cell
{
    $sum=0;
   $sum+= count1('t1',$i);   
//    echo count1('t1',$i);
    $sum+= count1('t2',$i);   
    $sum+= count1('t3',$i);  
 $sum+= count1('t4',$i);   
    $sum+= count1('t5',$i); 
    $sum+=count1('t6',$i);   
   
    $sum+=count1('t7',$i);   
    $sum+= count1('t8',$i);   
    $sum+= count1('t9',$i);   
    $sum+= count1('t10',$i);  
    $sum+= count1('t11',$i);   
    $sum+=count1('t12',$i);   
    $sum+= count1('t13',$i);   
    $sum+= count1('t14',$i);   
    $sum+=count1('t15',$i);   
 $sum+= count1('t16',$i);   
 $sum+= count1('t17',$i);   
$sum+=count1('t18',$i);   
 $sum+= count1('t19',$i);   
 $sum+= count1('t20',$i);   
 echo $sum;
    echo " ";
}

?>

<!DOCTYPE html>
<html>
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
/*

.abc{
            page-break-before: always;
        }
*/

    </style><script>
    
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
    
    <script type="text/javascript">
    
    
</script>


<body>
    <div align="center" id="printableArea1">
    <img src="college.jpg" width="700px" height="90px"></div>
    <a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br>
<!--    <br><a href="open.php">Home</a>-->
<!--    <div id="xyz"><a href="open.php" style="float:left; text-decoration:none; font-size:20px;">Home</a></div><br>-->
<form action="select.php" method="post">
<!--
     
     <div align="right">
    <strong><a id="ah" style="text-decoration:none;" href="logout.php">Logout</a></strong></div><br>
-->
    <div align="center" id="printableArea">
   <center><p style="font-size:18px"><strong>Student Feedback on Teacher(Theory)</strong></p></center>

    <table id="table2" height="50" width="1000">
        
        <tr>
            <td><strong>Academic year</strong></td>
            <td>2019</td>
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
        <tr>
            <td><strong>Department:</strong></td>
            <td><?php echo $_SESSION['dept'];?></td>
            <td><strong>Section:</strong></td>
            <td><?php echo $sec;?></td>
        </tr>
    </table><br>
<table cellspacing="13" height="1000">
<tr>
 <th>S.No</th>
    <th>Feedback against the following statements</th>
    <th >Average</th>
    <th>submissions</th>
    <th>5</th> <th>4</th> <th>3</th> <th>2</th> <th>-2</th>
</tr>
<tr>
  <td width="50">1</td>
    <td width="670">Inform about course outcomes (CO), program outcomes (PO's) and does the course delivery meets CO's</td>
  <td><?php echo number_format($row['AVG(t1)'],2);?></td>
  <td><?php echo $row['COUNT(t1)'];?></td>
  <td width="50"><?php echo count1('t1',5);   ?></td>
  <td width="50"><?php echo count1('t1',4);   ?></td>
  <td width="50"><?php echo count1('t1',3);   ?></td>
  <td width="50"><?php echo count1('t1',2);   ?></td>
  <td width="50"><?php echo count1('t1',-2);  ?></td>
    </tr>
<tr>
    <td width="90">2</td>
    <td width="400">Preparedness for handling the class</td>
    <td><?php echo number_format($row['AVG(t2)'],2);?></td>
    <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t2',5);   ?></td>
  <td><?php echo count1('t2',4);   ?></td>
  <td><?php echo count1('t2',3);   ?></td>
  <td><?php echo count1('t2',2);   ?></td>
  <td><?php echo count1('t2',-2);   ?></td>
</tr>
<tr>
    <td width="90">3</td>
    <td width="400">Engages the classes regularly and maintains discipline</td>
       <td><?php echo number_format($row['AVG(t3)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t3',5);   ?></td>
  <td><?php echo count1('t3',4);   ?></td>
  <td><?php echo count1('t3',3);   ?></td>
  <td><?php echo count1('t3',2);   ?></td>
  <td><?php echo count1('t3',-2);   ?></td>
</tr>
    <tr>
    <td width="90">4</td>
    <td width="400">Speaks clearly and audibly</td>
       <td><?php echo number_format($row['AVG(t4)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t4',5);   ?></td>
  <td><?php echo count1('t4',4);   ?></td>
  <td><?php echo count1('t4',3);   ?></td>
  <td><?php echo count1('t4',2);   ?></td>
  <td><?php echo count1('t4',-2);   ?></td>
</tr>
    <tr>
    <td width="90">5</td>
    <td width="400">Writes and draw legibly</td>
       <td><?php echo number_format($row['AVG(t5)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t5',5);   ?></td>
  <td><?php echo count1('t5',4);   ?></td>
  <td><?php echo count1('t5',3);   ?></td>
  <td><?php echo count1('t5',2);   ?></td>
  <td><?php echo count1('t5',-2);   ?></td>
</tr>
    <tr>
    <td width="90">6</td>
    <td width="400">Explains clearly and effectively the concepts with appropriate examples</td>
       <td><?php echo number_format($row['AVG(t6)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t6',5);   ?></td>
  <td><?php echo count1('t6',4);   ?></td>
  <td><?php echo count1('t6',3);   ?></td>
  <td><?php echo count1('t6',2);   ?></td>
  <td><?php echo count1('t6',-2);   ?></td>
</tr>
    <tr>
    <td width="90">7</td>
    <td width="400">Teach effectively suiting the student level of understanding</td>
       <td><?php echo number_format($row['AVG(t7)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t7',5);   ?></td>
  <td><?php echo count1('t7',4);   ?></td>
  <td><?php echo count1('t7',3);   ?></td>
  <td><?php echo count1('t7',2);   ?></td>
  <td><?php echo count1('t7',-2);   ?></td>
</tr>
        <tr>
    <td width="90">8</td>
    <td width="400">Covers the syllabus completely at appropriate pace</td>
       <td><?php echo number_format($row['AVG(t8)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t8',5);   ?></td>
  <td><?php echo count1('t8',4);   ?></td>
  <td><?php echo count1('t8',3);   ?></td>
  <td><?php echo count1('t8',2);   ?></td>
  <td><?php echo count1('t8',-2);   ?></td>
</tr>
    <tr>
    <td width="90">9</td>
    <td width="400">Ensures student participation in learning and problem solving in the class</td>
       <td><?php echo number_format($row['AVG(t9)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t9',5);   ?></td>
  <td><?php echo count1('t9',4);   ?></td>
  <td><?php echo count1('t9',3);   ?></td>
  <td><?php echo count1('t9',2);   ?></td>
  <td><?php echo count1('t9',-2);   ?></td>
</tr>
    <tr>
    <td width="90">10</td>
    <td width="400">Encourages questioning/ raising doubts by students and answer them well</td>
       <td><?php echo number_format($row['AVG(t10)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t10',5);   ?></td>
  <td><?php echo count1('t10',4);   ?></td>
  <td><?php echo count1('t10',3);   ?></td>
  <td><?php echo count1('t10',2);   ?></td>
  <td><?php echo count1('t10',-2);   ?></td>
</tr>
    <tr>
    <td width="90">11</td>
    <td width="400">Motivate students by identifying their strength/ weakness and providing right level of guidance</td>
       <td><?php echo number_format($row['AVG(t11)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t11',5);   ?></td>
  <td><?php echo count1('t11',4);   ?></td>
  <td><?php echo count1('t11',3);   ?></td>
  <td><?php echo count1('t11',2);   ?></td>
  <td><?php echo count1('t11',-2);   ?></td>
</tr>
    <tr>
    <td width="90">12</td>
    <td width="400">Use of modern ICT tools (LCD/ Webinar/ Multimedia presentation/ NPTEL videos etc.,.)</td>
       <td><?php echo number_format($row['AVG(t12)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t12',5);   ?></td>
  <td><?php echo count1('t12',4);   ?></td>
  <td><?php echo count1('t12',3);   ?></td>
  <td><?php echo count1('t12',2);   ?></td>
  <td><?php echo count1('t12',-2);   ?></td> 
</tr>
    <tr>
    <td width="90">13</td>
    <td width="400">Upload course materials in the web portal at appropriate time</td>
       <td><?php echo number_format($row['AVG(t13)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t13',5);   ?></td>
  <td><?php echo count1('t13',4);   ?></td>
  <td><?php echo count1('t13',3);   ?></td>
  <td><?php echo count1('t13',2);   ?></td>
  <td><?php echo count1('t13',-2);   ?></td>
</tr>
    <tr>
    <td width="90">14</td>
    <td width="400">Effectiveness of the course material uploaded</td>
    <td><?php echo number_format($row['AVG(t14)'],2);?></td>
    <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t14',5);   ?></td>
  <td><?php echo count1('t14',4);   ?></td>
  <td><?php echo count1('t14',3);   ?></td>
  <td><?php echo count1('t14',2);   ?></td>
  <td><?php echo count1('t14',-2);   ?></td>
</tr>
    <tr>
    <td width="90">15</td>
    <td width="400">Provides helpful information for preparing and writing examination</td>
       <td><?php echo number_format($row['AVG(t15)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t15',5);   ?></td>
  <td><?php echo count1('t15',4);   ?></td>
  <td><?php echo count1('t15',3);   ?></td>
  <td><?php echo count1('t15',2);   ?></td>
  <td><?php echo count1('t15',-2);   ?></td>
</tr>
    <tr>
    <td width="90">16</td>
    <td width="400">Prompt in evaluating and returning answer scripts, assignment sheets</td>
       <td><?php echo number_format($row['AVG(t16)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t16',5);   ?></td>
  <td><?php echo count1('t16',4);   ?></td>
  <td><?php echo count1('t16',3);   ?></td>
  <td><?php echo count1('t16',2);   ?></td>
  <td><?php echo count1('t16',-2);   ?></td>
</tr>
<tr>
    <td width="90">17</td>
    <td width="400">Provide feedback on performance improvement while distributing answer scripts</td>
       <td><?php echo number_format($row['AVG(t17)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t17',5);   ?></td>
  <td><?php echo count1('t17',4);   ?></td>
  <td><?php echo count1('t17',3);   ?></td>
  <td><?php echo count1('t17',2);   ?></td>
  <td><?php echo count1('t17',-2);   ?></td>
</tr>
    <tr>
    <td width="90">18</td>
    <td width="400">Fairness in evaluating answer scripts</td>
       <td><?php echo number_format($row['AVG(t18)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t18',5);   ?></td>
  <td><?php echo count1('t18',4);   ?></td>
  <td><?php echo count1('t18',3);   ?></td>
  <td><?php echo count1('t18',2);   ?></td>
  <td><?php echo count1('t18',-2);   ?></td>
</tr>
    <tr>
    <td width="90">19</td>
    <td width="400">Courteous and unbiased in dealing with students</td>
       <td><?php echo number_format($row['AVG(t19)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t19',5);   ?></td>
  <td><?php echo count1('t19',4);   ?></td>
  <td><?php echo count1('t19',3);   ?></td>
  <td><?php echo count1('t19',2);   ?></td>
  <td><?php echo count1('t19',-2);   ?></td>
</tr>
<tr>
    <td width="90">20</td>
    <td width="400">Offers assistance and counseling to the students beyond regular classes</td>
       <td><?php echo number_format($row['AVG(t20)'],2);?></td>
       <td><?php echo $row['COUNT(t1)'];?></td>
  <td><?php echo count1('t20',5);   ?></td>
  <td><?php echo count1('t20',4);   ?></td>
  <td><?php echo count1('t20',3);   ?></td>
  <td><?php echo count1('t20',2);   ?></td>
  <td><?php echo count1('t20',-2);   ?></td>
</tr>
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
</table>
     </div>
<br>
    <div align="center"  class="abcd" id="printableArea4">
   <center><p style="font-size:20px"><strong>Student Feedback on Teacher(Theory)</strong></p></center>

    <table id="table3">
        <tr>
            <td><strong>Academic year</strong></td>
            <td>2019</td>
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
    <p style="font-size:20px">
            <u><strong>COMMENTS</strong></u></p><br>
        <?php
        $res=mysqli_query($scon,"select comments from theory where sub_code='$subcode' and staff_id='$staffid' and section='$sec' and (dept='$dp' or dept='1')");
        while($list = mysqli_fetch_assoc($res)){
            $comment=$list['comments'];
        ?>
        <label><?php echo $i,".",$comment ?></label><br>
        <?php $i++;}?>
    </div><br>
   <div align="center">
<!--
    <button onclick="printDiv('printableArea','printableArea1','printableArea2')" value="print a div!">Save as PDF</button>
    <button onclick="getElementById('hidden-div').style.display = 'block'; this.style.display = 'none'">Save As Pdf</button>-->
       <button id="show_button" onclick="printDiv();">Save as Pdf</button>
</div></form>

</body>
</html>
