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
  <a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br><br>

    <div align="center">
        <br>
        <h2>Report</h2><br><br>
        
    <table cellspacing="2px">
    <tr>
        <th>Department</th>
         <th>batch</th>
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

       if(isset($_SESSION['admin'])=="")
  {
    header("Location: index.php");exit;
  }
       

           $semtype=$_SESSION['sem1'];
            $yr=    $_SESSION['year1'];
        $res1=mysqli_query($scon,"SELECT distinct dept FROM staffdetails where dept in(select dept from subdetails where ugpg='UG')");
        $count1=0;
            while($row=mysqli_fetch_assoc($res1))
            {
                $dept=$row['dept'];?>
        <tr>
            <td rowspan="5"><?php echo $dept;?></td>
            <tr>
                <td>2016</td>
            <?php 
            
                $count1=0;
                $percent=100;
                //echo $dept;echo "<br>";
                
            
                while($percent >= 55){
            $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and batch=2016 and performance >= '$percent'-5 and performance < '$percent' and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
        
        <?php 
                    
                }
                 $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and batch=2016 and performance >= 40 and performance < 50 and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    // $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
        <?php 
        $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and batch=2016 and performance >0 and performance < 40 and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    // $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
                <td><?php echo $count1; ?></td></tr>
        <tr>
            <td>2017</td>
<!--                 <td>2017</td>-->
            <?php
                $count1=0;
                $percent=100;
                while($percent >=55){
            $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept' and subcode in (select subcode from subdetails where type='THEORY') and batch=2017 and performance >= '$percent'-5 and performance < '$percent' and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
                    //echo $count;echo "<br>";
                    $percent-=5;?>
                <td><?php echo $count;?></td>
        
        <?php 
                    
                }
$res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and batch=2017 and performance >= 40 and performance < 50 and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    // $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
        <?php 
        $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and batch=2017 and performance >0 and performance < 40 and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    // $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
                <td><?php echo $count1; ?></td></tr><tr>
                 <td>2018</td>
            <?php
                $count1=0;
                  $percent=100;
                while($percent >=55){
            $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept' and subcode in (select subcode from subdetails where type='THEORY') and batch=2018 and performance >= '$percent'-5 and performance < '$percent' and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
                    //echo $count;echo "<br>";
                    $percent-=5;?>
                <td><?php echo $count;?></td>
        
        <?php 
                    
                }
$res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and batch=2018 and performance >= 40 and performance < 50 and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    // $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
        <?php 
        $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and batch=2018 and performance >0 and performance < 40 and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    // $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
                <td><?php echo $count1; ?></td></tr>
        
        
        
        
        
        <tr>
                <td>2019</td>
            <?php 
            
                $count1=0;
                $percent=100;
                //echo $dept;echo "<br>";
                
            
                while($percent >=55){
            $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and batch=2019 and performance >= '$percent'-5 and performance < '$percent' and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
        
        <?php 
                    
                }
$res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and batch=2019 and performance >= 40 and performance < 50 and semtype='$semtype' and year='$yr'");
                    $row5=mysqli_fetch_array($res);
                    $count=$row5['ct'];
                    $count1+=$count;
//                    echo $count;echo "<br>";
                    // $percent-=5;
                        ?>
        <td><?php echo $count;?></td>
        <?php 
        $res=mysqli_query($scon,"select count(*) as ct from staffdetails where dept='$dept'  and subcode in (select subcode from subdetails where type='THEORY') and batch=2019 and performance >0 and performance < 40 and semtype='$semtype' and year='$yr'");
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
    <button onclick="prr()">Save as PDF</button>
    </div>
</html>