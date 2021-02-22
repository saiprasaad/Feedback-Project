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

            <form action="inter1.php" method="post">
            
            <div class="form-group py-3">
                <label for="year">Select Year </label>
                <select class="form-control" name="year">
                    <option value="2019">2019-20</option>
                    <option value="2020">2020-21</option>
                    <option value="2021" disabled>2021-22</option>
                </select>
            </div>
                  <div class="form-group py-3">
                <label for="deptt">Select Sem</label>
                <select class="form-control" name="semty">
                    <option value="ODD">ODD</option>
                    <option value="EVEN">EVEN</option>
                </select>
                
            </div>
                <div class="form-group py-3">
                <label for="year">Select Type of Report</label>
                <select class="form-control" name="report">
                    <option value="one">Overall Dept Performance 1</option>
                    <option value="two">Overall Dept Performance 2</option>
                    <option value="three">Overall Dept Performance 3</option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block text-center" id="my">Submit</button>
        </form>

</div>
    
</body>
</html>