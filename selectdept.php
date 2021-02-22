<?php
session_start();
if(isset($_SESSION['admin'])=="")
  {
    header("Location: index.php");exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Depart result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
    <script>
        function load()
        {
            document.getElementById("my").innerHTML="Loading....";
            //document.getElementById("my").disabled=true;
        }
    </script>
</head>
<body>

<div align="center" id="printableArea1">
    <img src="college.jpg" width="1000px" height="120px"></div>
    <a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br>
<div class="container w-25 py-5">

            <form action="dept.php" method="post">
            <div class="form-group py-3">
                <label for="deptt">Select Department</label>
                <select class="form-control" name="dept">
                    <option value="CSE">CSE</option>
<option value="ECE">ECE</option>
<option value="EEE">EEE</option>
<option value="IT">IT</option>
<option value="CHEMICAL">CHEMICAL</option>
<option value="MECH">MECHANICAL</option>
<option value="CIVIL">CIVIL</option>
<option value="EIE">EIE</option>
<option value="BIO">BIOTECH</option>
<option value="ICE">ICE</option>
<option value="MATHS">MATHS</option>
<option value="ENGLISH">ENGLISH</option>
<option value="PHYSICS">PHYSICS</option>
<option value="CHEMISTRY">CHEMISTRY</option>
<option value="M.B.A">MBA AND MBA-INT</option>
                </select>
                
            </div>
            <div class="form-group py-3">
                <label for="year">Select Academic Year </label>
                <select class="form-control" name="year">
                    <option value="2019">2019-20</option>
                    <option value="2020">2020-21</option>
                    <option value="2021">2021-22</option>
                </select>
            </div>
                  <div class="form-group py-3">
                <label for="deptt">Select Sem</label>
                <select class="form-control" name="semty">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
                
            </div>
                <div class="form-group py-3">
                <label for="year">Select Type of Report</label>
                <select class="form-control" name="report">
                    <option value="yes">With comments</option>
                    <option value="no">Without comments</option>
                </select>
            </div>
            <button type="submit" onclick="load()" class="btn btn-primary btn-block text-center" id="my">Submit</button>
        </form>

</div>
    
</body>
</html>