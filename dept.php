<?php
require 'fpdf.php';
require 'dbconnect.php';
class mypage extends FPDF
{
    function header()
    {
        global $yr,$name,$sem,$code,$dept,$sec,$sub,$id,$batch;
        $this->Image("college.jpg",12,8);
        $this->Ln(40);
        $this->setFont('Arial','B',12);
        $this->cell(0,10,'Student Feedback on Teacher (Theory)',0,1,'C');
        $this->setFont('Arial','B',10);
        $this->cell(30,5,'Academic Year',1,0,'L');
        $this->setFont('Arial','',10);
        $this->cell(74,5,$yr,1,0,'L');
        $this->setFont('Arial','B',10);
        $this->cell(40,5,'Name of the Faculty',1,0,'L');
        $this->setFont('Arial','',10);
        $this->cell(54,5,$name,1,1,'L');
        $this->setFont('Arial','B',10);
        $this->cell(30,5,'Course Name',1,0,'L');
        $this->setFont('Arial','',8);
        $this->cell(74,5,$sub,1,0,'L');
        $this->setFont('Arial','B',10);
        $this->cell(40,5,'Semester',1,0,'L');
        $this->setFont('Arial','',10);
        $this->cell(54,5,$sem,1,1,'L');
        $this->setFont('Arial','B',10);
        $this->cell(30,5,'Course Code',1,0,'L');
        $this->setFont('Arial','',10);
        $this->cell(74,5,$code,1,0,'L');
        $this->setFont('Arial','B',10);
        $this->cell(40,5,'Date Of Feedback',1,0,'L');
        $this->setFont('Arial','',10);
        $this->cell(54,5,date("Y/m/d"),1,1,'L');
        $this->setFont('Arial','B',8);
        $this->cell(30,5,'Handling Department',1,0,'L');
        $this->setFont('Arial','',10);
        $this->cell(74,5,$dept,1,0,'L');
        $this->setFont('Arial','B',10);
        $this->cell(40,5,'Section',1,0,'L');
        $this->setFont('Arial','',10);
        $this->cell(54,5,$sec,1,1,'L');
    }
    function content1($scon)
    {
         global $yr,$name,$sem,$code,$dept,$sec,$sub,$id,$batch;
        $i=1;
        $res1=mysqli_query($scon,"select comments from theory where sub_code='$code' and staff_id='$id' and section='$sec' and batch='$batch'");
        
//        $page=new mypage('P','mm','A4');
//$page->SetLeftMargin(5);
        $this->aliasNbPages();
          $this->Addpage();
        $this->setFont('Arial','B',12);
        $this->cell(200,10,'COMMENTS',0,1,'C');
        while($row1=mysqli_fetch_assoc($res1))
        {
        $co=$row1['comments'];
//        $this->setFont('Arial',"",10);
//        $this->cell(8,5,$i,0,1,'L');    
        $this->setFont('Arial',"",9);
        $this->cell(200,5,$i.". ".$co,0,1,'L');
            $i=$i+1;
        }
    }
    function content($scon)
    {
        global $yr,$repty,$name,$sem,$code,$dept,$sec,$sub,$id,$batch,$sum1,$sum2,$sum3,$sum4,$sum5;
        $this->Ln(15);
        $res=mysqli_query($scon,"select COUNT(t1),AVG(t1),AVG(t2),AVG(t3),AVG(t4),AVG(t5),AVG(t6),AVG(t7),AVG(t8),AVG(t9),AVG(t10),AVG(t11),AVG(t12),AVG(t13),AVG(t14),AVG(t15),AVG(t16),AVG(t17),AVG(t18),AVG(t19),AVG(t20) from theory where sub_code='$code' and staff_id='$id' and section='$sec' and batch='$batch'");
        $row=mysqli_fetch_array($res);
        $ct=$row['COUNT(t1)'];
        $this->setFont('Arial','B',8);
        $this->cell(8,5,'SL',1,0,'L');
        $this->cell(133,5,'Feedback against the following statements',1,0,'C');
        $this->cell(13,5,'Average',1,0,'L');
        $this->cell(19,5,'Submissions',1,0,'L');
        $this->cell(5,5,'5',1,0,'L');
        $this->cell(5,5,'4',1,0,'L');
        $this->cell(5,5,'3',1,0,'L');
        $this->cell(5,5,'2',1,0,'L');
        $this->cell(5,5,'-2',1,1,'L');
        $this->setFont('Arial','',8);
        $this->cell(8,7,'1',1,0,'L');
        $this->Cell(133,7,"Inform about course outcomes (CO), program outcomes (PO's) and does the course delivery meets CO's",1,0,'L');
        $this->setFont('Arial','',9);       
        $this->cell(13,7,number_format($row['AVG(t1)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t1',5),1,0,'L');
        $this->cell(5,7,$this->count1('t1',4),1,0,'L');
        $this->cell(5,7,$this->count1('t1',3),1,0,'L');
        $this->cell(5,7,$this->count1('t1',2),1,0,'L');
        $this->cell(5,7,$this->count1('t1',-2),1,1,'L');

        $this->cell(8,7,'2',1,0,'L');
        $this->Cell(133,7,"Preparedness for handling the class",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t2)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t2',5),1,0,'L');
        $this->cell(5,7,$this->count1('t2',4),1,0,'L');
        $this->cell(5,7,$this->count1('t2',3),1,0,'L');
        $this->cell(5,7,$this->count1('t2',2),1,0,'L');
        $this->cell(5,7,$this->count1('t2',-2),1,1,'L');

        $this->cell(8,7,'3',1,0,'L');
        $this->Cell(133,7,"Engages the classes regularly and maintains discipline",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t3)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t3',5),1,0,'L');
        $this->cell(5,7,$this->count1('t3',4),1,0,'L');
        $this->cell(5,7,$this->count1('t3',3),1,0,'L');
        $this->cell(5,7,$this->count1('t3',2),1,0,'L');
        $this->cell(5,7,$this->count1('t3',-2),1,1,'L');

        $this->cell(8,7,'4',1,0,'L');
        $this->Cell(133,7,"Speaks clearly and audibly",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t4)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t4',5),1,0,'L');
        $this->cell(5,7,$this->count1('t4',4),1,0,'L');
        $this->cell(5,7,$this->count1('t4',3),1,0,'L');
        $this->cell(5,7,$this->count1('t4',2),1,0,'L');
        $this->cell(5,7,$this->count1('t4',-1),1,1,'L');

        $this->cell(8,7,'5',1,0,'L');
        $this->Cell(133,7,"Writes and draw legibly",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t5)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t5',5),1,0,'L');
        $this->cell(5,7,$this->count1('t5',4),1,0,'L');
        $this->cell(5,7,$this->count1('t5',3),1,0,'L');
        $this->cell(5,7,$this->count1('t5',2),1,0,'L');
        $this->cell(5,7,$this->count1('t5',-2),1,1,'L');

        $this->cell(8,7,'6',1,0,'L');
        $this->Cell(133,7,"Explains clearly and effectively the concepts with appropriate examples",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t6)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t6',5),1,0,'L');
        $this->cell(5,7,$this->count1('t6',4),1,0,'L');
        $this->cell(5,7,$this->count1('t6',3),1,0,'L');
        $this->cell(5,7,$this->count1('t6',2),1,0,'L');
        $this->cell(5,7,$this->count1('t6',-2),1,1,'L');


        $this->cell(8,7,'7',1,0,'L');
        $this->Cell(133,7,"Teach effectively suiting the student level of understanding",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t7)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t7',5),1,0,'L');
        $this->cell(5,7,$this->count1('t7',4),1,0,'L');
        $this->cell(5,7,$this->count1('t7',3),1,0,'L');
        $this->cell(5,7,$this->count1('t7',2),1,0,'L');
        $this->cell(5,7,$this->count1('t7',-2),1,1,'L');

        $this->cell(8,7,'8',1,0,'L');
        $this->Cell(133,7,"Covers the syllabus completely at appropriate pace",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t8)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t8',5),1,0,'L');
        $this->cell(5,7,$this->count1('t8',4),1,0,'L');
        $this->cell(5,7,$this->count1('t8',3),1,0,'L');
        $this->cell(5,7,$this->count1('t8',2),1,0,'L');
        $this->cell(5,7,$this->count1('t8',-2),1,1,'L');

        $this->cell(8,7,'9',1,0,'L');
        $this->Cell(133,7,"Ensures student participation in learning and problem solving in the class",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t9)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t9',5),1,0,'L');
        $this->cell(5,7,$this->count1('t9',4),1,0,'L');
        $this->cell(5,7,$this->count1('t9',3),1,0,'L');
        $this->cell(5,7,$this->count1('t9',2),1,0,'L');
        $this->cell(5,7,$this->count1('t9',-2),1,1,'L');


        $this->cell(8,7,'10',1,0,'L');
        $this->Cell(133,7,"Encourages questioning/ raising doubts by students and answer them well",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t10)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t10',5),1,0,'L');
        $this->cell(5,7,$this->count1('t10',4),1,0,'L');
        $this->cell(5,7,$this->count1('t10',3),1,0,'L');
        $this->cell(5,7,$this->count1('t10',2),1,0,'L');
        $this->cell(5,7,$this->count1('t10',-2),1,1,'L');


        $this->cell(8,7,'11',1,0,'L');
        $this->Cell(133,7,"Motivate students by identifying their strength/ weakness and providing right level of guidance",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t11)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t11',5),1,0,'L');
        $this->cell(5,7,$this->count1('t11',4),1,0,'L');
        $this->cell(5,7,$this->count1('t11',3),1,0,'L');
        $this->cell(5,7,$this->count1('t11',2),1,0,'L');
        $this->cell(5,7,$this->count1('t11',-2),1,1,'L');


        $this->cell(8,7,'12',1,0,'L');
        $this->Cell(133,7,"Use of modern ICT tools (LCD/ Webinar/ Multimedia presentation/ NPTEL videos etc.,.)",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t12)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t12',5),1,0,'L');
        $this->cell(5,7,$this->count1('t12',4),1,0,'L');
        $this->cell(5,7,$this->count1('t12',3),1,0,'L');
        $this->cell(5,7,$this->count1('t12',2),1,0,'L');
        $this->cell(5,7,$this->count1('t12',-2),1,1,'L');


        $this->cell(8,7,'13',1,0,'L');
        $this->Cell(133,7,"Upload course materials in the web portal at appropriate time",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t13)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t13',5),1,0,'L');
        $this->cell(5,7,$this->count1('t13',4),1,0,'L');
        $this->cell(5,7,$this->count1('t13',3),1,0,'L');
        $this->cell(5,7,$this->count1('t13',2),1,0,'L');
        $this->cell(5,7,$this->count1('t13',-2),1,1,'L');


        $this->cell(8,7,'14',1,0,'L');
        $this->Cell(133,7,"Effectiveness of the course material uploaded",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t14)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t14',5),1,0,'L');
        $this->cell(5,7,$this->count1('t14',4),1,0,'L');
        $this->cell(5,7,$this->count1('t14',3),1,0,'L');
        $this->cell(5,7,$this->count1('t14',2),1,0,'L');
        $this->cell(5,7,$this->count1('t14',-2),1,1,'L');


        $this->cell(8,7,'15',1,0,'L');
        $this->Cell(133,7,"Provides helpful information for preparing and writing examination",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t15)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t15',5),1,0,'L');
        $this->cell(5,7,$this->count1('t15',4),1,0,'L');
        $this->cell(5,7,$this->count1('t15',3),1,0,'L');
        $this->cell(5,7,$this->count1('t15',2),1,0,'L');
        $this->cell(5,7,$this->count1('t15',-2),1,1,'L');


        $this->cell(8,7,'16',1,0,'L');
        $this->Cell(133,7,"Prompt in evaluating and returning answer scripts, assignment sheets",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t16)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t16',5),1,0,'L');
        $this->cell(5,7,$this->count1('t16',4),1,0,'L');
        $this->cell(5,7,$this->count1('t16',3),1,0,'L');
        $this->cell(5,7,$this->count1('t16',2),1,0,'L');
        $this->cell(5,7,$this->count1('t16',-2),1,1,'L');


        $this->cell(8,7,'17',1,0,'L');
        $this->Cell(133,7,"Provide feedback on performance improvement while distributing answer scripts",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t17)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t17',5),1,0,'L');
        $this->cell(5,7,$this->count1('t17',4),1,0,'L');
        $this->cell(5,7,$this->count1('t17',3),1,0,'L');
        $this->cell(5,7,$this->count1('t17',2),1,0,'L');
        $this->cell(5,7,$this->count1('t17',-2),1,1,'L');

        $this->cell(8,7,'18',1,0,'L');
        $this->Cell(133,7,"Fairness in evaluating answer scripts",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t18)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t18',5),1,0,'L');
        $this->cell(5,7,$this->count1('t18',4),1,0,'L');
        $this->cell(5,7,$this->count1('t18',3),1,0,'L');
        $this->cell(5,7,$this->count1('t18',2),1,0,'L');
        $this->cell(5,7,$this->count1('t18',-2),1,1,'L');


        $this->cell(8,7,'19',1,0,'L');
        $this->Cell(133,7,"Courteous and unbiased in dealing with students",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t19)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t19',5),1,0,'L');
        $this->cell(5,7,$this->count1('t19',4),1,0,'L');
        $this->cell(5,7,$this->count1('t19',3),1,0,'L');
        $this->cell(5,7,$this->count1('t19',2),1,0,'L');
        $this->cell(5,7,$this->count1('t19',-2),1,1,'L');

        $this->cell(8,7,'20',1,0,'L');
        $this->Cell(133,7,"Offers assistance and counseling to the students beyond regular classes",1,0,'L');
        $this->cell(13,7,number_format($row['AVG(t20)'],2),1,0,'L');
        $this->cell(19,7,$ct,1,0,'L');
        $this->cell(5,7,$this->count1('t20',5),1,0,'L');
        $this->cell(5,7,$this->count1('t20',4),1,0,'L');
        $this->cell(5,7,$this->count1('t20',3),1,0,'L');
        $this->cell(5,7,$this->count1('t20',2),1,0,'L');
        $this->cell(5,7,$this->count1('t20',-2),1,1,'L');


        $this->setFont('Times','B',12);
       
        $percent=$row['AVG(t1)']+$row['AVG(t2)']+$row['AVG(t3)']+$row['AVG(t4)']+$row['AVG(t5)']+$row['AVG(t6)']+$row['AVG(t7)']+$row['AVG(t8)']+$row['AVG(t9)']+$row['AVG(t10)']+$row['AVG(t11)']+$row['AVG(t12)']+$row['AVG(t13)']+$row['AVG(t14)']+$row['AVG(t15)']+$row['AVG(t16)']+$row['AVG(t17)']+$row['AVG(t18)']+$row['AVG(t19)']+$row['AVG(t20)'];
        $this->cell(8,10,'21',1,0,'L');
        $this->Cell(133,10,"Percentage",1,0,'L');
        $this->cell(13,10,number_format($percent,2),1,0,'L');
        $this->cell(19,10,' - ',1,0,'L');
        $this->setFont('Times','B',7);
        $this->cell(5,10,$sum1,1,0,'L');
        $this->cell(5,10,$sum2,1,0,'L');
        $this->cell(5,10,$sum3,1,0,'L');
        $this->cell(5,10,$sum4,1,0,'L');
        $this->cell(5,10,$sum5,1,1,'L');
        if($repty=="yes")
        $this->content1($scon);

    }

    function count1($t,$i)
   {
     global $id,$code,$sec,$scon,$batch,$sum1,$sum2,$sum3,$sum4,$sum5;
     
     $res=mysqli_query($scon,"select COUNT('$t') as ct from theory where $t='$i' and sub_code='$code' and staff_id='$id' and section='$sec' and batch='$batch'");
     $row2=mysqli_fetch_assoc($res);
     if($i==5)
     {
         $sum1+=$row2["ct"];
     }
     else if($i==4)
     {
        $sum2+=$row2["ct"];
     }
     else if($i==3)
     {
        $sum3+=$row2["ct"];
     }
     else if($i==2)
     {
        $sum4+=$row2["ct"];
     }
     else if($i==-2)
     {
        $sum5+=$row2["ct"];
     }
     return $row2["ct"];
     
   }

    function footer()
    {
        $this->setY(-10);
        $this->setFont('Arial','',8);
        $this->cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
    }
    
}
$repty=$_POST['report'];
$dep=$_POST['dept'];
$yr=$_POST['year'];
$semty=$_POST['semty'];

$page=new mypage('P','mm','A4');
$page->SetLeftMargin(5);
$query=mysqli_query($scon,"select * from admin where dept='$dep' order by priority");
while($row=mysqli_fetch_assoc($query))
{
    $name=$row['staff_name'];
    $id=$row['staff_id'];
    $query2=mysqli_query($scon,"select sem,batch,dept,sec,subcode,year,performance from staffdetails where type='THEORY'and staffID='$id' and year='$yr' and sem='$semty' and performance is NOT NULL");
    while($row2=mysqli_fetch_assoc($query2))
    {
        $sum1=0;
        $sum2=0;
        $sum3=0;
        $sum4=0;
        $sum5=0;
        $sem=$row2['sem'];
        $batch=$row2['batch'];
        $sec=$row2['sec'];
        $yr=$row2['year'];
        $code=$row2['subcode'];
        $dept=$row2['dept'];
        if($row2['performance']== 0)
        continue;
        $res=mysqli_query($scon,"select * from subdetails where subcode='$code'");
        $row1=mysqli_fetch_array($res);
        $sub=$row1['subname'];
        if($sec==" ")
           break;
         $page->aliasNbPages();
          $page->Addpage();
         $page->content($scon);
        
    }

}
$page->output();

