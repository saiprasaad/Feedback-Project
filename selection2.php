<?php
session_start();
if(isset($_SESSION['error']))
{
    echo '<script type="text/javascript">alert("You have already submitted response for the selected subject!!");</script>';
}
if(isset($_SESSION['success']))
{
    unset($_SESSION['success']);
    echo '<script type="text/javascript">alert("Response recorded");</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Form without tables</title>
<style type="text/css">
form{
display: inline-block;
}
body {
    text-align: center;
}
    select{
    margin-left:30px;
     margin-bottom: 30px;
}
label{
margin-left:10px
}

</style>
</head>
<script>
        var academyear; 
        var year;
        var batch;
        var sem;
        function acyear(value)
        {
            
            academyear=value;
        }

        function yearfn(value)
        {
            year=value;
            if(academyear=="2019")
              {
               if(year=="1")
                   {
                   batch="batch_17";
                       var semval="1";
                       var semval1="2";
                       var semOptions = "";
                       semOptions +="<option> </option>";
//                semOptions += "<option>" + semval1 + "</option>";
                semOptions += "<option>" + semval + "</option>";
            document.getElementById("sem").innerHTML = semOptions;
                   }
                if(year=="2")
                   {
                   batch="batch_17";
                       var semval="3";
                       var semval1="4";
                       var semOptions = "";
                       semOptions +="<option> </option>";
//                semOptions += "<option>" + semval1 + "</option>";
                semOptions += "<option>" + semval + "</option>";
            document.getElementById("sem").innerHTML = semOptions;
                   }
                if(year=="3")
                   {
                   batch="batch_17";
                       var secoptions = "";
                       var semval="5";
                       var semval1="6";
                       var semOptions = "";
                semOptions +="<option> </option>";
//                semOptions += "<option>" + semval1 + "</option>";
                semOptions += "<option>" + semval + "</option>";
                        document.getElementById("sem").innerHTML = semOptions;
                   }
                if(year=="4")
                   {
                   batch="batch_16";
                       var semval="7";
                       var semval1="8";
                       var semOptions = "";
                       semOptions +="<option> </option>";
//                semOptions += "<option>" + semval1 + "</option>";
                semOptions += "<option>" + semval+ "</option>";
            document.getElementById("sem").innerHTML = semOptions;
                    }
               }
            
        }
    function acname(value)
        {
            
            acname=value;
        }
                  
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  
<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "sem")
   {
    result = 'state';
   }
   else if (action == "state")
   {
    result = 'staff';
   }
   $.ajax({
    url:"fetch1.php",
    method:"POST",
    data:{action:action, query:query },
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>

<body>

     <div align="center">
    <img src="college.jpg" width="1000px" height="170px"></div>
    <button class="btn btn-warning" margin-left:100px; style="float:right;"><a href="logout.php" style="float:right; text-decoration:none; font-size:20px;">Logout</a></button>
    <br><br>
<form action="intermediate1.php" method="post">

  <div class="container" style="width:400px;">
  <label> Select academic year</label>
      <select name="acayear" id="acayear"  required onChange="acyear(this.value);" class="form-control action">
    <option value="">Select Academic Year</option>
    <option value="2019">2020-21</option>
    </select><br />
    <label> Select your year</label>
       <select name="year" id="year" onChange="yearfn(this.value);" class="form-control action" required >
    <option value="">Select Year</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select><br />
<label> Select Semester</label>
       <select name="country" id="sem" class="form-control action" required >
    <option value="">Select Semester</option>
   </select>
   <br />
   <label> Select Subject</label>
   <select name="state" id="state" class="form-control action" required >
    <option value="">Select Subject</option>
   </select>
      <br/>
      <label>Select Staff Name</label>
      <select name="staff" id="staff" class="form-control action" required >
      <option value="">Select Name</option></select>
   <br />
    </div>
    <input type="submit">
</form>
    <br><br>
    <div style="margin-left:-90px;">
    <button class="btn btn-primary"> <a href="opening.php" style="color:wheat;">Back</a></button></div>
</body>
</html>