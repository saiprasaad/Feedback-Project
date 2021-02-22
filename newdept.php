<html>
    <script>
        function prr()
        {
            window.print();
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
    </style>
    <title>Report</title>
<br><br>
 <a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br>
    <div align="center">
        <br>
        <h2>Report</h2><br><br>
    <table cellspacing="2px">
    <tr>
        <th>Department</th>
        <th>>=95</th>
        <th>90-94</th>
        <th>85-89</th>
        <th>80-84</th>
        <th>75-79</th>
        <th>70-74</th>
        <th>65-69</th>
        <th>60-64</th>
        <th>55-59</th>
        <th>50-54</th>
        <th>40-49</th>
        <th>0-39</th>
        <th>Total Count</th>
    </tr>
    <?php 
        require 'dbconnect.php';
        session_start();
      $year=$_SESSION['year1'];
       $semty=$_SESSION['sem1'];
        $res1=mysqli_query($scon,"SELECT distinct dept FROM staffdetails where dept in(select dept from subdetails where ugpg='UG')");
        $count1=0;
            while($row=mysqli_fetch_assoc($res1))
            {
                $dept=$row['dept'];?>
        <tr>
            <td><?php echo $dept;?></td>
            
            <?php 
            
                $count1=0;
                $percent=100;
                //echo $dept;echo "<br>";
                
            
                while($percent >= 55){
            $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and performance >= '$percent'-5 and performance < '$percent' and semtype='$semty' and year='$year'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
        
        <?php 
                    
                }
                 $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and performance >= 40 and performance < 50 and semtype='$semty' and year='$year'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    // $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
        <?php 
        $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and performance >= 0 and performance < 40 and semtype='$semty' and year='$year'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    // $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
                <td><?php echo $count1; ?></td></tr>
      
               
        
        
        
        
        
        
        
        </tr><?php
        
    }
        ?>
    </table><br>
    </div>
</html>