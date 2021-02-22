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
    </style>
<table>
    <tr>
    <th>Department</th>
    <th>Batch</th>
    <th>Dept</th>
    <th>90-99</th>
    <th>80-89</th>
    <th>70-79</th>
    <th>60-69</th>
    <th>50-59</th>
    <th>40-49</th>
    <th>30-39</th>
    <th>20-29</th>
    <th>10-19</th>
    <th>Total Count</th>
    </tr>
    <?php
    $count=0;
    require 'dbconnect.php';
    $res=mysqli_query($scon,"select distinct dept from staffdetails");
    
    while($row=mysqli_fetch_assoc($res))
    {
        $dept=$row['dept'];
        echo $dept;echo "<br>";
        $res1=mysqli_query($scon,"SELECT DISTINCT dept from admin where staff_id in (select staffID from staffdetails where dept='$dept' and batch=2016 and subcode IN (select subcode from subdetails where type='THEORY'))");
        $res10=($scon,"SELECT count(DISTINCT) dept from admin where staff_id in (select staffID from staffdetails where dept='$dept' and batch=2016 and subcode IN (select subcode from subdetails where type='THEORY'))");
        while($row1=mysqli_fetch_assoc($res1))
        {
            $count++;
            $dept1=$row1['dept'];
            echo $dept1;echo  "<br>";
            $percent=100;
            echo 2016;
            echo "<br>";
            while($percent > 10)
            {
            $res2=mysqli_query($scon,"select count(*) as ct from staffdetails WHERE staffID in (SELECT DISTINCT staff_id from admin where dept='$dept1' and staff_id in (select staffID from staffdetails where dept='$dept')) AND performance >= '$percent'-10 and performance <'$percent' and dept='$dept' and subcode IN (select subcode from subdetails where type='THEORY')and batch=2016");
                $percent-=10;
                $row4=mysqli_fetch_array($res2);
                $c=$row4['ct'];
                echo $c;echo "<br>";
            }
        }
        $res1=mysqli_query($scon,"SELECT DISTINCT dept from admin where staff_id in (select staffID from staffdetails where dept='$dept' and batch=2017 and subcode IN (select subcode from subdetails where type='THEORY'))");
        while($row1=mysqli_fetch_assoc($res1))
        {
            $count++;
            $dept1=$row1['dept'];
            echo $dept1;echo  "<br>";
            $percent=100;
            echo 2017;
            echo "<br>";
            while($percent > 10)
            {
            $res2=mysqli_query($scon,"select count(*) as ct from staffdetails WHERE staffID in (SELECT DISTINCT staff_id from admin where dept='$dept1' and staff_id in (select staffID from staffdetails where dept='$dept')) AND performance >= '$percent'-10 and performance <'$percent' and dept='$dept' and subcode IN (select subcode from subdetails where type='THEORY')and batch=2017");
                $percent-=10;
                $row4=mysqli_fetch_array($res2);
                $c=$row4['ct'];
                echo $c;echo "<br>";
            }
        }
        $res1=mysqli_query($scon,"SELECT DISTINCT dept from admin where staff_id in (select staffID from staffdetails where dept='$dept' and batch=2018 and subcode IN (select subcode from subdetails where type='THEORY'))");
        while($row1=mysqli_fetch_assoc($res1))
        {
            $count++;
            $dept1=$row1['dept'];
            echo $dept1;echo  "<br>";
            $percent=100;
            echo 2018;
            echo "<br>";
            while($percent > 10)
            {
            $res2=mysqli_query($scon,"select count(*) as ct from staffdetails WHERE staffID in (SELECT DISTINCT staff_id from admin where dept='$dept1' and staff_id in (select staffID from staffdetails where dept='$dept')) AND performance >= '$percent'-10 and performance <'$percent' and dept='$dept' and subcode IN (select subcode from subdetails where type='THEORY')and batch=2018");
                $percent-=10;
                $row4=mysqli_fetch_array($res2);
                $c=$row4['ct'];
                echo $c;echo "<br>";
            }
        }
    }
        ?>
    </table>
</html>