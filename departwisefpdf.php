<?php
require 'dbconnect.php'; 
require 'fpdf.php';


 class dept extends fpdf{
     function header()
     {
         global $dept1;
        $this->Image("college.jpg",12,8);
        $this->ln(40);
      
     }
     function content()
     {
         global $dept1,$type,$gtype,$stype,$scon,$i,$year;
          $this->setFont('Arial','B',10);
         $this->cell(201,5,$dept1.'(UG)',1,1,'C');
         $this->setFont('Arial','B',8);
         $this->cell(7,5,'S.no',1,0,'L');
        $this->cell(12,5,'Batch',1,0,'L');
        $this->cell(15,5,'StaffID',1,0,'L');
        $this->cell(45,5,'StaffName',1,0,'L');
        $this->cell(15,5,'H.Dept',1,0,'L');
        $this->cell(10,5,'Sem',1,0,'L');
        $this->cell(20,5,'SubCode',1,0,'L');
        $this->cell(60,5,'Subject Name',1,0,'L');
        $this->cell(7,5,'Sec',1,0,'L');
        $this->cell(10,5,'Score',1,1,'L');

         $this->setFont('Arial','B',6);
         $res=mysqli_query($scon,"select * from admin where dept='$dept1' order by priority");
         while($list=mysqli_fetch_array($res))
         {
            $category = $list['staff_id'];
            $username=$list['staff_name'];
            if($stype=='ODD')      
              $sql1="select * from staffdetails where staffID = '$category' and semtype='ODD'  and type='$type' and subcode IN (select subcode from subdetails where ugpg='UG') and year='$year'";
            else
              $sql1="select * from staffdetails where staffID = '$category' and semtype='EVEN' and type='$type' and subcode IN(select subcode from subdetails where ugpg='UG') and year='$year'";
            $res1=mysqli_query($scon,$sql1);
            while($list1=mysqli_fetch_array($res1))
            {
               $sem=$list1['sem'];
               $bat=$list1['batch'];
               $sec=$list1['sec'];
               $sub=$list1['subcode'];
               $de=$list1['dept'];
               $sql2="select subname from subdetails where subcode='$sub' and dept='$de'";
               $res2=mysqli_query($scon,$sql2);
              $row2=mysqli_fetch_array($res2);
              $suname=$row2['subname'];

              if($type=="THEORY")
              {
             $res3=mysqli_query($scon,"select AVG(t1),AVG(t2),AVG(t3),AVG(t4),AVG(t5),AVG(t6),AVG(t7),AVG(t8),AVG(t9),AVG(t10),AVG(t11),AVG(t12),AVG(t13),AVG(t14),AVG(t15),AVG(t16),AVG(t17),AVG(t18),AVG(t19),AVG(t20) from theory where sub_code='$sub' and staff_id='$category' and section='$sec' and batch='$bat'");
          $row3=mysqli_fetch_array($res3);
          $percent=($row3['AVG(t1)']+$row3['AVG(t2)']+$row3['AVG(t3)']+$row3['AVG(t4)']+$row3['AVG(t5)']+$row3['AVG(t6)']+$row3['AVG(t7)']+$row3['AVG(t8)']+$row3['AVG(t9)']+$row3['AVG(t10)']+$row3['AVG(t11)']+$row3['AVG(t12)']+$row3['AVG(t13)']+$row3['AVG(t14)']+$row3['AVG(t15)']+$row3['AVG(t16)']+$row3['AVG(t17)']+$row3['AVG(t18)']+$row3['AVG(t19)']+$row3['AVG(t20)']);
              }
              else
              {
                  $res3=mysqli_query($scon,"select AVG(l1),AVG(l2),AVG(l3),AVG(l4),AVG(l5),AVG(l6),AVG(l7),AVG(l8),AVG(l9),AVG(l10)from lab where sub_code='$sub' and staff_id='$category' and section='$sec' and batch='$bat'");
        $row3=mysqli_fetch_array($res3); $percent=($row3['AVG(l1)']+$row3['AVG(l2)']+$row3['AVG(l3)']+$row3['AVG(l4)']+$row3['AVG(l5)']+$row3['AVG(l6)']+$row3['AVG(l7)']+$row3['AVG(l8)']+$row3['AVG(l9)']+$row3['AVG(l10)'])*2;
            }
            $i++;    
            if($percent==0)
                continue;
            $this->cell(7,5,$i,1,0,'L');
            $this->cell(12,5,$bat,1,0,'L');
            $this->cell(15,5,$category,1,0,'L');
            $this->cell(45,5,$username,1,0,'L');
            $this->cell(15,5,$de,1,0,'L');
            $this->cell(10,5,$sem,1,0,'L');
            $this->cell(20,5,$sub,1,0,'L');
            $this->cell(60,5,$suname,1,0,'L');
            $this->cell(7,5,$sec,1,0,'L');
            $this->cell(10,5,number_format($percent,2),1,1,'L');
        
         }


     }
     }
     function content1()
     {
      global $dept1,$type,$gtype,$stype,$scon,$i,$year;
       $this->ln(40);
        $this->setFont('Arial','B',10);
         $this->cell(201,5,$dept1.'(PG)',1,1,'C');
         $this->setFont('Arial','B',8);
         $this->cell(7,5,'S.no',1,0,'L');
        $this->cell(12,5,'Batch',1,0,'L');
        $this->cell(15,5,'StaffID',1,0,'L');
        $this->cell(45,5,'StaffName',1,0,'L');
        $this->cell(15,5,'H.Dept',1,0,'L');
        $this->cell(10,5,'Sem',1,0,'L');
        $this->cell(20,5,'SubCode',1,0,'L');
        $this->cell(60,5,'Subject Name',1,0,'L');
        $this->cell(7,5,'Sec',1,0,'L');
        $this->cell(10,5,'Score',1,1,'L');

         

         $this->setFont('Arial','B',6);
         $res=mysqli_query($scon,"select * from admin where dept='$dept1' order by priority");
         while($list=mysqli_fetch_array($res))
         {
            $category = $list['staff_id'];
            $username=$list['staff_name'];
            if($stype=='ODD')      
              $sql1="select * from staffdetails where staffID = '$category' and semtype='ODD'  and type='$type' and subcode IN (select subcode from subdetails where ugpg='PG') and year='$year'";
            else
              $sql1="select * from staffdetails where staffID = '$category' and semtype='EVEN' and type='$type' and subcode IN(select subcode from subdetails where ugpg='PG') and year='$year'";
            $res1=mysqli_query($scon,$sql1);
            while($list1=mysqli_fetch_array($res1))
            {
               $sem=$list1['sem'];
               $bat=$list1['batch'];
               $sec=$list1['sec'];
               $sub=$list1['subcode'];
               $de=$list1['dept'];
               $sql2="select subname from subdetails where subcode='$sub' and dept='$de'";
               $res2=mysqli_query($scon,$sql2);
              $row2=mysqli_fetch_array($res2);
              $suname=$row2['subname'];

              if($type=="THEORY")
              {
             $res3=mysqli_query($scon,"select AVG(t1),AVG(t2),AVG(t3),AVG(t4),AVG(t5),AVG(t6),AVG(t7),AVG(t8),AVG(t9),AVG(t10),AVG(t11),AVG(t12),AVG(t13),AVG(t14),AVG(t15),AVG(t16),AVG(t17),AVG(t18),AVG(t19),AVG(t20) from theory where sub_code='$sub' and staff_id='$category' and section='$sec' and batch='$bat'");
          $row3=mysqli_fetch_array($res3);
          $percent=($row3['AVG(t1)']+$row3['AVG(t2)']+$row3['AVG(t3)']+$row3['AVG(t4)']+$row3['AVG(t5)']+$row3['AVG(t6)']+$row3['AVG(t7)']+$row3['AVG(t8)']+$row3['AVG(t9)']+$row3['AVG(t10)']+$row3['AVG(t11)']+$row3['AVG(t12)']+$row3['AVG(t13)']+$row3['AVG(t14)']+$row3['AVG(t15)']+$row3['AVG(t16)']+$row3['AVG(t17)']+$row3['AVG(t18)']+$row3['AVG(t19)']+$row3['AVG(t20)']);
              }
              else
              {
                  $res3=mysqli_query($scon,"select AVG(l1),AVG(l2),AVG(l3),AVG(l4),AVG(l5),AVG(l6),AVG(l7),AVG(l8),AVG(l9),AVG(l10)from lab where sub_code='$sub' and staff_id='$category' and section='$sec' and batch='$bat'");
        $row3=mysqli_fetch_array($res3); $percent=($row3['AVG(l1)']+$row3['AVG(l2)']+$row3['AVG(l3)']+$row3['AVG(l4)']+$row3['AVG(l5)']+$row3['AVG(l6)']+$row3['AVG(l7)']+$row3['AVG(l8)']+$row3['AVG(l9)']+$row3['AVG(l10)'])*2;
            }
            $i++;    
            if($percent==0)
                continue;
            $this->cell(7,5,$i,1,0,'L');
            $this->cell(12,5,$bat,1,0,'L');
            $this->cell(15,5,$category,1,0,'L');
            $this->cell(45,5,$username,1,0,'L');
            $this->cell(15,5,$de,1,0,'L');
            $this->cell(10,5,$sem,1,0,'L');
            $this->cell(20,5,$sub,1,0,'L');
            $this->cell(60,5,$suname,1,0,'L');
            $this->cell(7,5,$sec,1,0,'L');
            $this->cell(10,5,number_format($percent,2),1,1,'L');
        
         }


     }
     }
        function footer()
        { 
            $this->setY(-10);
            $this->setFont('Arial','',8);
            $this->cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
        }
        

 }
$dept1=$_POST['dp'];
 $type=$_POST['type'];
 $gtype=$_POST['ugpg'];
 $stype=$_POST['sem'];
$year=$_POST['academicyear'];
//echo $stype;

 $page=new dept('P','mm','A4');
$page->SetLeftMargin(5);
$page->aliasNbPages();
$page->Addpage();
$page->content();
$page->content1();
$page->Output();
?>
