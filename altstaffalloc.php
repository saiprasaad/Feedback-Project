<?php

if(isset($_POST['insert'])){
    require 'dbconnect.php';

    $batch=$_POST['batch'];
    $sem=$_POST['sem'];
    $yr=$_POST['yr'];
    $dept=$_POST['dept'];
    $type=$_POST['typ'];
    $sec=$_POST['sec'];
    if($sem%2==0)
    $semtype="EVEN";
    else
    $semtype="ODD";
    $count=$_POST['count'];
    $i=0;
    while($i<$count){

        $s="subcode".$i;
        $st="staff".$i;
        $subcode=$_POST["$s"];
        $staff=$_POST["$st"];
        $a=explode("+",$staff);
        foreach($a as $value)
        {
             
             if(!mysqli_query($scon,"insert into staffdetails (batch,dept,sem,sec,subcode,staffID,year,type,semtype,performance) values('$batch','$dept','$sem','$sec','$subcode','$value','$yr','$type','$semtype',0)"))
             {echo "Some error at inserting:",$subcode,$value;}
        }
        $i++;


    }


    echo "Sucessssfullll!!!!";
    exit;
}


?>
<form id="form" action="altstaffalloc.php" method="post">
Count: <input type="number" id="ct" name="count">
<button type="button" onclick="fun()">Ok</button>
<br><br>
Batch: <input type="text" name="batch"><br>
Type : <input type="text" name="typ"><br>
Dept : <input type="text" name="dept"><br>
Sem : <input type="number" name="sem"><br>
Sec : <input type="text" name="sec"><br>
Year : <input type="number" name="yr"><br><br>


</form> 
<script>

function fun() {
    /*Getting the number of text fields*/
    var no = document.getElementById("ct").value;
    /*Generating text fields dynamically in the same form itself*/
    for(var i=0;i<no;i++) {

        var subcode = document.createElement("input");
        subcode.type = "text";
        subcode.value = "";
        subcode.placeholder="subcode";
        subcode.name = "subcode"+i;
        var staff = document.createElement("input");
        staff.type = "text";
        staff.value = "";
        staff.name = "staff"+i;
        staff.placeholder="staffID";
        console.log(staff.name);
        document.getElementById('form').appendChild(subcode);
        document.getElementById('form').appendChild(staff)
        document.getElementById('form').appendChild(document.createElement("br"));
    }

   var sub=document.createElement("input");
   sub.type = "submit";
    sub.value = "submit";
    sub.name = "insert";
    document.getElementById('form').appendChild(sub)
}
</script>