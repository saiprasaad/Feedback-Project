<html>
    <script>
        var subvalues={
            2016:['A','B','C','D'],
            2017:['A','B','C']
        }
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
            batch=value;
            year=academyear-value;

            if(academyear == "2019" && year == 3){

                var secoptions = "";
                for (categoryId in subvalues[batch]) {
                    secoptions += "<option>" + subvalues[batch][categoryId] + "</option>";
                }
                var semval="7";
                var semval1="8";
                document.getElementById("sec").innerHTML = secoptions;
                var semOptions = "";
                semOptions += "<option>" + semval + "</option>";
                semOptions += "<option>" + semval1 + "</option>";
                document.getElementById("sem").innerHTML = semOptions;
                document.getElementById("sec").innerHTML = secoptions;

            }

            else if(year==3){

                var secoptions = "";
                for (categoryId in subvalues[2017]) {
                    secoptions += "<option>" + subvalues[2017][categoryId] + "</option>";
                }
                var semval="7";
                var semval1="8";
                document.getElementById("sec").innerHTML = secoptions;
                var semOptions = "";
                semOptions += "<option>" + semval + "</option>";
                semOptions += "<option>" + semval1 + "</option>";
                document.getElementById("sem").innerHTML = semOptions;
                document.getElementById("sec").innerHTML = secoptions;
                
            }


            else if(year==2){

                var secoptions = "";
                for (categoryId in subvalues[2017]) {
                    secoptions += "<option>" + subvalues[2017][categoryId] + "</option>";
                }
                var semval="5";
                var semval1="6";
                document.getElementById("sec").innerHTML = secoptions;
                var semOptions = "";
                semOptions += "<option>" + semval + "</option>";
                semOptions += "<option>" + semval1 + "</option>";
                document.getElementById("sem").innerHTML = semOptions;
                document.getElementById("sec").innerHTML = secoptions;
                
            }

            else if(year==1){

                var secoptions = "";
                for (categoryId in subvalues[2017]) {
                    secoptions += "<option>" + subvalues[2017][categoryId] + "</option>";
                }
                var semval="3";
                var semval1="4";
                document.getElementById("sec").innerHTML = secoptions;
                var semOptions = "";
                semOptions += "<option>" + semval + "</option>";
                semOptions += "<option>" + semval1 + "</option>";
                document.getElementById("sem").innerHTML = semOptions;
                document.getElementById("sec").innerHTML = secoptions;

            }

            else if(year==0){

                var secoptions = "";
                for (categoryId in subvalues[2017]) {
                    secoptions += "<option>" + subvalues[2017][categoryId] + "</option>";
                }
                var semval="1";
                var semval1="2";
                document.getElementById("sec").innerHTML = secoptions;
                var semOptions = "";
                semOptions += "<option>" + semval + "</option>";
                semOptions += "<option>" + semval1 + "</option>";
                document.getElementById("sem").innerHTML = semOptions;
                document.getElementById("sec").innerHTML = secoptions;


            }

        }


   
    </script>
<body>
<form method="post" action="class1.php">
    <div align="center">
    <img src="college.jpg" width="1000px" height="140px"></div>
      <a href="open.php" style="float:right; text-decoration:none; font-size:20px;">Home</a><br>
<fieldset>
    <legend style="text-align:center; margin-left:100px; font-size:30px;">CLASS DETAILS</legend>
    <div align="center">
        <br><br>
        <strong>Academic Year</strong>
   <select name="acayear" id="acayear" onChange="acyear(this.value);">
    <option value="" disabled selected>Select Academic Year</option>
    <option value="2019">2019-20</option>
       <option value="2020">2020-21</option>
    </select><br><br>
        <strong>Batch</strong>
    <select name="batch" id="batch" onChange="yearfn(this.value);">
    <option value="" disabled selected>Select Batch</option>
    <option value="2016">2016-20</option>
    <option value="2017">2017-21</option>
    <option value="2018">2018-22</option>
    <option value="2019">2019-23</option>
</select><br><br>
        <strong>Semester</strong>
           <select name="sem" id="sem" onChange="semfn(this.value);">
    <option value="" disabled selected>Select semester</option>
</select><br><br>

    
        <strong>Section</strong>
<select name="sec" id="sec">
     <option value="sec" disabled selected>Select Section</option>
    </select><br><br>
        <strong>Type</strong>
        <select name="type" id="type">
     <option value="theory">Theory</option>
      <option value="lab" >Practicals</option>
    </select><br><br>

        <strong>Department</strong>
<select name="dept" id="dept">
    <option value="" disabled selected>Select Department</option>
    <option value="CSE">CSE</option>
    <option value="MECH">MECH</option>
    <option value="ECE">ECE</option>
    <option value="EEE">EEE</option>
    <option value="IT">IT</option>
    <option value="CHEMICAL">CHEM</option>
    <option value="CIVIL">CIVIL</option>
    <option value="ICE">ICE</option>
    <option value="EIE">EIE</option>
    <option value="BIO">BIOTECH</option>
<option value="M.C.A">M.C.A</option>
<option value="M.B.A">M.B.A</option>
<option value='CI'>CI</option>
<option value='PS'>PS</option>
<option value='SE'>SE</option>
<option value='CS'>CS</option>
<option value='ME'>ME</option>
<option value='PE'>PE</option>
<option value='AE'>AE</option>
        <option value='MBA-INT'>MBA-INT</option>
        </select>
        <br>
        <br>
        <br>
        <br>
    <input type="submit" name="submit"><br><br>
        </div>
</fieldset>
</form>
</body>
</html>
