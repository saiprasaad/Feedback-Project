<?php
require "dbconnect.php";
require "fpdf.php";
class page extends FPDF
{
    function content()
    {
        global $de,$scon,$bat;
        $res1=mysqli_query($scon,"select * from student where dept='$de' and flag='' and batch='$bat' order by sec");
        if(mysqli_num_rows($res1)==0)
            return;
        $this->addpage();
        $i=1;
        $this->setFont('Arial','B',12);
        $this->cell(0,10,$de,0,1,'C');
        $this->cell(10,10,"S.NO",1,0,'C');
        $this->cell(30,10,"ROLL NO",1,0,'C');
        $this->cell(50,10,"REGISTER NUMBER",1,0,'C');
        $this->cell(100,10,"NAME",1,1,'C');
//        $res1=mysqli_query($scon,"select * from student where dept='$de' and flag='' and batch='$bat'");
        while($row1=mysqli_fetch_array($res1))
        {
        $this->setFont('Arial',"",10);
        $this->cell(10,10,$i,1,0,'C');    
        $this->cell(30,10,$row1['RollNo'],1,0,'C');
        $this->cell(50,10,$row1['RegNo'],1,0,'C');
        $this->cell(100,10,$row1['Student_Name'],1,1,'C');
        $i++;
        }
    }   
    
}
$pg=new page('P','mm','A4');
$res=mysqli_query($scon,"select distinct dept from subdetails where ugpg='ug'");
// while($row=mysqli_fetch_array($res))
// {
    // $de=$row['dept'];
    // $pg->content();
// }
$de=$_GET['dept'];
$bat=$_GET['batch'];
$pg->content();
$pg->output();




?>