<?php
require 'fpdf.php';
require 'dbconnect.php';
session_start();
$dept=$_POST['dept'];
    $type1=$_POST['type'];
    $batch=$_POST['batch'];

class mypage extends FPDF
{
    function header()
    {
        global $dept,$batch;
        $this->Image("college.jpg",12,8);
        $this->Ln(40);
        $this->setFont('Arial','B',12);
        $this->cell(100,10,'BATCH:',0,0,'R');
        $this->setFont('Arial','',12);
        $this->cell(180,10,$batch,0,1,'L');
        $this->setFont('Arial','B',12);
        $this->cell(99,10,'DEPT:',0,0,'R');
        $this->setFont('Arial','',12);
        $this->cell(180,10,$dept,0,1,'L');
        $this->setFont('Arial','B',9);
        $this->cell(17,5,'StaffID',1,0,'L');
        $this->cell(50,5,'StaffName',1,0,'L');
        $this->cell(10,5,'Sem',1,0,'L');
        $this->cell(15,5,'SubCode',1,0,'L');
        $this->cell(80,5,'Subject Name',1,0,'L');
        $this->cell(8,5,'Sec',1,0,'L');
        $this->cell(12,5,'Marks',1,1,'L');
        
    }
    function content()
    {
        global $scon,$dept,$batch,$type1;
        $sql="Select * from staffdetails where dept='$dept' and batch='$batch' order by performance desc";
    $res=mysqli_query($scon,$sql);
        while($list=mysqli_fetch_assoc($res))
    {
        $staffid=$list['staffID'];
        $subcode=$list['subcode'];
        $section=$list['sec'];
        $res1=mysqli_query($scon,"Select subname,type,sem from subdetails where subcode='$subcode' and dept='$dept'");
        $ty=mysqli_fetch_array($res1);
        $type=$ty['type'];
        $subname=$ty['subname'];
        $sem=$ty['sem'];
        $res1=mysqli_query($scon,"Select staff_name from admin where staff_id='$staffid'");
        $row2=mysqli_fetch_array($res1);
        $staffname=$row2['staff_name'];
        if($type1=="THEORY")
        {
            $res1=mysqli_query($scon,"select AVG(t1),AVG(t2),AVG(t3),AVG(t4),AVG(t5),AVG(t6),AVG(t7),AVG(t8),AVG(t9),AVG(t10),AVG(t11),AVG(t12),AVG(t13),AVG(t14),AVG(t15),AVG(t16),AVG(t17),AVG(t18),AVG(t19),AVG(t20) from theory where sub_code='$subcode' and staff_id='$staffid' and section='$section' and batch='$batch' and (dept='1' or dept='$dept')");
            $row=mysqli_fetch_array($res1);
           $percent=$row['AVG(t1)']+$row['AVG(t2)']+$row['AVG(t3)']+$row['AVG(t4)']+$row['AVG(t5)']+$row['AVG(t6)']+$row['AVG(t7)']+$row['AVG(t8)']+$row['AVG(t9)']+$row['AVG(t10)']+$row['AVG(t11)']+$row['AVG(t12)']+$row['AVG(t13)']+$row['AVG(t14)']+$row['AVG(t15)']+$row['AVG(t16)']+$row['AVG(t17)']+$row['AVG(t18)']+$row['AVG(t19)']+$row['AVG(t20)'];
if($percent==0.0)
continue;
            $this->setFont('Arial','',8);   
             $this->cell(17,5,$staffid,1,0,'L');
            $this->cell(50,5,$staffname,1,0,'L');
            $this->cell(10,5,$sem,1,0,'L');
            $this->cell(15,5,$subcode,1,0,'L');
            $this->cell(80,5,$subname,1,0,'L');
            $this->cell(8,5,$section,1,0,'L');
            $this->cell(12,5,number_format($percent,2),1,1,'L');
        
    }
            else
        {
            $res1=mysqli_query($scon,"select AVG(l1),AVG(l2),AVG(l3),AVG(l4),AVG(l5),AVG(l6),AVG(l7),AVG(l8),AVG(l9),AVG(l10)from lab where sub_code='$subcode' and staff_id='$staffid' and section='$section' and (dept='1' or dept='$dept')");
            $row=mysqli_fetch_array($res1);
            $percent=($row['AVG(l1)']+$row['AVG(l2)']+$row['AVG(l3)']+$row['AVG(l4)']+$row['AVG(l5)']+$row['AVG(l6)']+$row['AVG(l7)']+$row['AVG(l8)']+$row['AVG(l9)']+$row['AVG(l10)'])*2.0;
            if($percent==0.0)
                continue;
                $this->setFont('Arial','',8);
            $this->cell(17,5,$staffid,1,0,'L');
            $this->cell(50,5,$staffname,1,0,'L');
            $this->cell(10,5,$sem,1,0,'L');
            $this->cell(15,5,$subcode,1,0,'L');
            $this->cell(80,5,$subname,1,0,'L');
            $this->cell(8,5,$section,1,0,'L');
            $this->cell(12,5,number_format($percent,2),1,1,'L');
        
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

    $page=new mypage('P','mm','A4');
    $page->aliasNbPages();
$page->Addpage();
$page->content();
$page->output();
