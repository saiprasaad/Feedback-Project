<?php
require "dbconnect.php";
session_start();
$rollno=$_SESSION['student'];
$sec=$_SESSION['sec'];
$batch=$_SESSION['batch'];
$dept=$_SESSION['dept'];
$reg=$_SESSION['reg'];
$name=$_SESSION['name'];
$res=mysqli_query($scon,"select * from sss_alloc where rollno='$rollno'");
$resnew=mysqli_query($scon,"select * from sss_alloc where rollno='$rollno'");
$theory_array=array();
$lab_array=array();
$i=0;
$j=0;
while($rownew=mysqli_fetch_array($resnew))
{
    $checkedin=$rownew['checkedin'];
    $subcode=$rownew['subcode'];
    $staffid=$rownew['staffid'];
    $res1new=mysqli_query($scon,"select distinct subname,type from subdetails where subcode='$subcode'");
    $row1new=mysqli_fetch_array($res1new);
    $subname=$row1new['subname'];
    $type=$row1new['type'];
    if($type=='THEORY')
    {
        $temp_arr=array($subcode,$subname,$staffid,$type,$checkedin);
        $theory_array[$i]=$temp_arr;
        $i++;
    }
    else
    {
        $temp_arr=array($subcode,$subname,$staffid,$type,$checkedin);
        $lab_array[$j]=$temp_arr;
        $j++;   
    }
    
}
//echo $theory_array;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 
</head>
<style>
    body{
/*
        background-image: linear-gradient(to right,#ad5389,#3c1053);
        background-image: linear-gradient(to right top, #f2e1f1, #f0e1ef, #ede1ed, #ebe0eb, #e9e0e9);
*/
        font-family: 'Josefin Sans', sans-serif;

        
    }

    .jumbotron{
        background-color: transparent;
        
    }

    .print {
        page-break-before: always;
        page-break-inside: avoid;
      }

      

  


    



</style>
<body class="bg-white">
    <div align="center">
        <img src="college.jpg" width="1000px" height="170px">
    </div>



       

   
     <div class="main py-3">
         <div class="container-fluid">


           <div class="row pt-2">

                <div class="col-lg-8">
                    <h2 class="display-5"> Welcome <?php echo ucwords(strtolower($name))." !!!"; ?> </h2>
                </div>

                <div class="col-lg-4 text-right">
                    <a href="logout.php"><button class="btn btn-red btn-md" type="submit">Logout</button></a>
                </div>
           
           
           </div>


            
            <div class="jumbotron animated bounceInDown">
                <h2 class="display-5">  THEORY </h2>
                <hr class="my-4">
                <p class="h4">Click on the respective subjects to provide feedback</p>
               
                <div class="row py-3 ">
                
                    <?php
                    foreach($theory_array as $theory_value)
                    {
                        $checkedin=$theory_value[4];
                        $subcode=$theory_value[0];
                        $staffid=$theory_value[2];
                         $subname=$theory_value[1];
                        $res2=mysqli_query($scon,"select staff_name from admin where staff_id='$staffid'");
                        $row2=mysqli_fetch_array($res2);
                        $staffname=$row2['staff_name'];
                            
                        if($checkedin==0){
                        ?>

                        <div class="col-lg-6 col-md-6 mb-4 ">
                            <div class="card gradient-card">
                                <div class="card-image">
                                    <a class="edit" data-toggle="modal" data-target="#editModal">
                                        <div class="text-dark d-flex h-100 mask young-passion-gradient">
                                            <div class="first-content align-self-center p-3">
                                            <h3 class="card-title"><?php echo $subname; ?></h3>
                                            <h3 class="card-title"><?php echo $staffname; ?></h3>
                                            <h5 class="card-title">Status : Incomplete <i class="far fa-clock"></i></h5>
                                            <input type="hidden" id="subcd" value="<?php echo $subcode; ?>">
                                            <input type="hidden" id="stfid" value="<?php echo $staffid; ?>">
                                            <input type="hidden" id="stf" value="<?php echo $staffname; ?>">
                                            <input type="hidden" id="sub" value="<?php echo $subname; ?>">
                                            </div> 
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php 
                        }
                        else
                        {
                        ?>

                        <div class="col-lg-6 col-md-6 mb-4 ">
                            <div class="card gradient-card">
                                <div class="card-image">
                                   
                                        <div class="text-dark d-flex h-100 mask dusty-grass-gradient">
                                            <div class="first-content align-self-center p-3">
                                            <h3 class="card-title"><?php echo $subname; ?></h3>
                                            <h3 class="card-title"><?php echo $staffname; ?></h3>
                                            <h5 class="card-title">Status : Completed <i class="far fa-check-circle"></i></h5>
                                            </div> 
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                    }
                    ?>
                    
                </div>

         </div>

             
                 
            <div class="jumbotron animated bounceInDown">
                <h2 class="display-5">  LABORATORY </h2>
                <hr class="my-4">
                <p class="h4">Click on the respective subjects to provide feedback</p>
               
                <div class="row py-3 ">
                
                    <?php
                    foreach($lab_array as $lab_value)
                    {
                        $checkedin=$lab_value[4];
                        $subcode=$lab_value[0];
                        $staffid=$lab_value[2];
                         $subname=$lab_value[1];
                        $res2=mysqli_query($scon,"select staff_name from admin where staff_id='$staffid'");
                        $row2=mysqli_fetch_array($res2);
                        $staffname=$row2['staff_name'];
                            
                        if($checkedin==0){
                        ?>

                        <div class="col-lg-6 col-md-6 mb-4 ">
                            <div class="card gradient-card">
                                <div class="card-image">
                                    <a class="editlab" data-toggle="modal" data-target="#editModallab">
                                        <div class="text-dark d-flex h-100 mask young-passion-gradient">
                                            <div class="first-content align-self-center p-3">
                                            <h3 class="card-title"><?php echo $subname; ?></h3>
                                            <h3 class="card-title"><?php echo $staffname; ?></h3>
                                            <h5 class="card-title">Status : Incomplete <i class="far fa-clock"></i></h5>
                                            <input type="hidden" id="subcd" value="<?php echo $subcode; ?>">
                                            <input type="hidden" id="stfid" value="<?php echo $staffid; ?>">
                                            <input type="hidden" id="stf" value="<?php echo $staffname; ?>">
                                            <input type="hidden" id="sub" value="<?php echo $subname; ?>">
                                            </div> 
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php 
                        }
                        else
                        {
                        ?>

                        <div class="col-lg-6 col-md-6 mb-4 ">
                            <div class="card gradient-card">
                                <div class="card-image">
                                   
                                        <div class="text-dark d-flex h-100 mask dusty-grass-gradient">
                                            <div class="first-content align-self-center p-3">
                                            <h3 class="card-title"><?php echo $subname; ?></h3>
                                            <h3 class="card-title"><?php echo $staffname; ?></h3>
                                            <h5 class="card-title">Status : Completed <i class="far fa-check-circle"></i></h5>
                                            </div> 
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                    }
                    ?>
                    
                </div>

         </div>
             
             
             
             
             
     </div>

    </div>





    <form  id="feedback_lab" action="feedback_submit_lab.php" method="post">

    <input type="hidden" id="subcode" name="subcode" >
    <input type="hidden" id="staffid" name="staffid" >

    
    <div class="modal fade right" id="editModallab" tabindex="-1" role="dialog" aria-labelledby="editModallab" aria-hidden="true" >

  
            <div class="modal-dialog modal-full-height modal-dialog-scrollable modal-bottom">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 id="su" class="modal-title w-50" id="myModalLabel"></h4>
                                <h4 id ="st" class="modal-title w-50" id="myModalLabel"></h4> 
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span> 
                                </button>
                                
                            </div>

                           

                            <div class="modal-body">
                                
                                
                            
                                <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">Sl.No</th>
                                    <th scope="col">Feedback against the following statements</th>
                                    <th scope="col" colspan="5">Select appropriate option against the statement</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <th scope="row">1</th>
                                        <td width="470">Inform about course outcomes (CO), program outcomes (PO's) and does the course delivery meets CO's</td>
                                       <td><input type="radio" name="1" value="5" required>     Strongly agree</td>
                                        <td><input type="radio" name="1" value="4" required> Agree</td>
                                        <td><input type="radio" name="1" value="3" required> Neutral</td>
                                        <td><input type="radio" name="1" value="2" required> Disagree</td>
                                        <td><input type="radio" name="1" value="-2" required> Strongly Disagree</td>
                                    </tr>
                                    
                                    <tr required> <th scope="row">2</th><td>Preparedness for handling the Practical classes</td>
                                        <td><input type="radio" name="2" value="5" required> Excellent</td>
                                        <td><input type="radio" name="2" value="4" required> Very Good</td>
                                        <td><input type="radio" name="2" value="3" required> Good</td>
                                        <td><input type="radio" name="2" value="2" required> Satisfied</td> 
                                        <td><input type="radio" name="2" value="-2" required> Not Satisfied</td>
                                    </tr>
                                    <tr required> <th scope="row">3</th><td>Engages the Lab classes regularly and maintains discipline</td>
                                         <td><input type="radio" name="3" value="5" required> Strongly agree</td>
                                         <td><input type="radio" name="3" value="4" required> Agree</td>
                                         <td><input type="radio" name="3" value="3" required> Neutral</td>
                                         <td><input type="radio" name="3" value="2" required> Generally disagree</td> 
                                         <td><input type="radio" name="3" value="-2" required> Disagree</td>
                                    </tr>
                                <tr required><th scope="row">4</th><td> Helps the students in conducting the experiments through demonstrations</td>
                                     <td><input type="radio" name="4" value="5" required> Always</td>
                                     <td><input type="radio" name="4" value="4" required> Often</td>
                                     <td><input type="radio" name="4" value="3" required> Sometimes</td>
                                     <td><input type="radio" name="4" value="2" required> Rare</td> 
                                     <td><input type="radio" name="4" value="-2" required> Never</td>
                                </tr>
                                <tr required><th scope="row">5</th><td>Helps the students to explore the topic of study involved in the experiment</td>
                                   <td><input type="radio" name="5" value="5" required> Always</td>
                                   <td><input type="radio" name="5" value="4" required> Often</td>
                                   <td><input type="radio" name="5" value="3" required> Sometimes</td>
                                   <td><input type="radio" name="5" value="2" required> Rare</td> 
                                   <td><input type="radio" name="5" value="-2" required> Never</td>
                                </tr>
                                <tr required><th scope="row">6</th><td>Takes interest in conducting viva for clear understanding of the experiment</td>
                                  <td><input type="radio" name="6" value="5" required> Always</td>
                                  <td><input type="radio" name="6" value="4" required> Often</td>
                                  <td><input type="radio" name="6" value="3" required> Sometimes</td>
                                  <td><input type="radio" name="6" value="2" required> Rare</td> 
                                  <td><input type="radio" name="6" value="-2" required> Never</td>
                                </tr>
        
                                <tr required><th scope="row">7</th><td>Regular checking of the laboratory observation/ records</td>
                                    <td><input type="radio" name="7" value="5" required> Always</td>
                                    <td><input type="radio" name="7" value="4" required> Often</td>
                                    <td><input type="radio" name="7" value="3" required> Sometimes</td>
                                    <td><input type="radio" name="7" value="2" required> Rare</td> 
                                    <td><input type="radio" name="7" value="-2" required> Never</td>
                                </tr>
                                <tr required><th scope="row">8</th><td>Provides helpful information for preparing and writing examination</td>
                                  <td><input type="radio" name="8" value="5" required>  Always</td>
                                  <td><input type="radio" name="8" value="4" required> Often</td>
                                  <td><input type="radio" name="8" value="3" required> Sometimes</td>
                                  <td><input type="radio" name="8" value="2" required> Rare</td> 
                                  <td><input type="radio" name="8" value="-2" required> Never
                                  </td>
                                </tr>
                                <tr required><th scope="row">9</th><td>Prompt and fairness in evaluating experiments results</td>
                                    <td><input type="radio" name="9" value="5" required> Always</td>
                                    <td><input type="radio" name="9" value="4" required> Often</td>
                                    <td><input type="radio" name="9" value="3" required> Sometimes</td>
                                    <td><input type="radio" name="9" value="2" required> Rare</td> 
                                    <td><input type="radio" name="9" value="-2" required> Never
                                    </td>
                                </tr>
                                    <tr required><th scope="row">10</th><td>Courteous and unbiased in dealing with students</td>
                                          <td><input type="radio" name="10" value="5" required> Very satisfied</td>
                                          <td><input type="radio" name="10" value="4" required> Satisfied</td> 
                                          <td> <input type="radio" name="10" value="3" required> Neutral</td>
                                          <td><input type="radio" name="10" value="2" required> Slightly Dissatisfied </td>
                                          <td><input type="radio" name="10" value="-2" required> Dissatisfied
                                          </td>
                                    </tr>
                                    <tr>
                                        <td>Comments</td>
                                        <td colspan="6"><input type="text" placeholder="Max 200 Characters Only" maxlength="200" style="width:100%;" name="comments" required></td>
                                    </tr>



                                    
                                </tbody>

                            </table>







                            </div>

                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>


                </div>

            </div>

        </div>

    </form>

    
    <form  id="feedback" action="feedback_submit.php" method="post">

    <input type="hidden" id="subcode" name="subcode" >
    <input type="hidden" id="staffid" name="staffid" >

    
    <div class="modal fade right" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true" >

  
            <div class="modal-dialog modal-full-height modal-dialog-scrollable modal-bottom">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 id="su" class="modal-title w-50" id="myModalLabel"></h4>
                                <h4 id ="st" class="modal-title w-50" id="myModalLabel"></h4> 
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span> 
                                </button>
                                
                            </div>

                           

                            <div class="modal-body">
                                
                                
                            
                                <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                    <th scope="col">Sl.No</th>
                                    <th scope="col">Feedback against the following statements</th>
                                    <th scope="col" colspan="5">Select appropriate option against the statement</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td width="470">Inform about course outcomes (CO), program outcomes (PO's) and does the course delivery meets CO's</td>
                                        <td><input type="radio" name="t1" value="5" required> Strongly Agree</td>
                                        <td> <input type="radio" name="t1" value="4" unchecked required> Agree</td>
                                        <td> <input type="radio" name="t1" value="3" unchecked required> Neutral</td>
                                        <td> <input type="radio" name="t1" value="2" unchecked required> Disagree</td>
                                        <td><input type="radio" name="t1" value="-2" unchecked required> Strongly Disagree</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Preparedness for handling the class</td>
                                        <td><input type="radio" name="t2" value="5" unchecked required> Excellent</td>
                                        <td><input type="radio" name="t2" value="4" unchecked required> Very Good</td>
                                        <td><input type="radio" name="t2" value="3" unchecked required> Good</td>
                                        <td><input type="radio" name="t2" value="2" unchecked required> Satisfied</td>
                                        <td><input type="radio" name="t2" value="-2" unchecked required> Not satisfied</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Engages the classes regularly and maintains discipline</td>
                                        <td><input type="radio" name="t3" value="5" unchecked required> Strongly Agree</td>
                                        <td><input type="radio" name="t3" value="4" unchecked required> Agree</td>
                                        <td> <input type="radio" name="t3" value="3" unchecked required> Neutral</td>
                                        <td><input type="radio" name="t3" value="2" unchecked required> Disagree</td>
                                        <td><input type="radio" name="t3" value="-2" unchecked required> Strongly Disagree</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Speaks clearly and audibly</td>
                                        <td><input type="radio" name="t4" value="5" unchecked required> Strongly Agree</td>
                                        <td><input type="radio" name="t4" value="4" unchecked required> Agree</td>
                                        <td><input type="radio" name="t4" value="3" unchecked required> Neutral</td>
                                        <td><input type="radio" name="t4" value="2" unchecked required> Disagree</td>
                                        <td><input type="radio" name="t4" value="-2" unchecked required> Strongly Disagree</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Writes and draw legibly</td>
                                        <td><input type="radio" name="t5" value="5" unchecked required> Strongly Agree</td>
                                        <td> <input type="radio" name="t5" value="4" unchecked required> Agree</td>
                                        <td> <input type="radio" name="t5" value="3" unchecked required> Neutral</td>
                                        <td><input type="radio" name="t5" value="2" unchecked required> Disagree</td>
                                        <td><input type="radio" name="t5" value="-2" unchecked required> Strongly Disagree</td>
                                    </tr>

                                    <tr>
                                        <td >6</td>
                                        <td >Explains clearly and effectively the concepts with appropriate examples</td>
                                        <td><input type="radio" name="t6" value="5" unchecked required> Strongly Agree</td>
                                        <td> <input type="radio" name="t6" value="4" unchecked required> Agree</td>
                                        <td><input type="radio" name="t6" value="3" unchecked required> Neutral</td>
                                        <td><input type="radio" name="t6" value="2" unchecked required> Disagree</td>
                                        <td><input type="radio" name="t6" value="-2" unchecked required> Strongly Disagree</td>
                                    </tr>
                                        <tr>
                                        <td >7</td>
                                        <td >Teach effectively suiting the student level of understanding</td>
                                        <td><input type="radio" name="t7" value="5" unchecked required> Strongly Agree</td>
                                        <td><input type="radio" name="t7" value="4" unchecked required> Agree</td>
                                        <td><input type="radio" name="t7" value="3" unchecked required> Neutral</td>
                                        <td><input type="radio" name="t7" value="2" unchecked required> Disagree</td>
                                        <td><input type="radio" name="t7" value="-2" unchecked required> Strongly Disagree</td>
                                    </tr>
                                            <tr>
                                        <td >8</td>
                                        <td >Covers the syllabus completely at appropriate pace</td>
                                        <td><input type="radio" name="t8" value="5" unchecked required> Consistently</td>
                                        <td><input type="radio" name="t8" value="4" unchecked required> Adequate</td>
                                        <td><input type="radio" name="t8" value="3" unchecked required> Manageable</td>
                                        <td><input type="radio" name="t8" value="2" unchecked required> Rushed</td>
                                        <td><input type="radio" name="t8" value="-2" unchecked required> Never</td>
                                    </tr>
                                        <tr>
                                        <td >9</td>
                                        <td >Ensures student participation in learning and problem solving in the class</td>
                                        <td><input type="radio" name="t9" value="5" unchecked required> Consistently</td>
                                        <td> <input type="radio" name="t9" value="4" unchecked required> Adequate</td>
                                        <td><input type="radio" name="t9" value="3" unchecked required> Manageable</td>
                                        <td><input type="radio" name="t9" value="2" unchecked required> Rushed</td>
                                        <td><input type="radio" name="t9" value="-2" unchecked required> Never</td>
                                    </tr>
                                        <tr>
                                        <td >10</td>
                                        <td >Encourages questioning/ raising doubts by students and answer them well</td>
                                        <td><input type="radio" name="t10" value="5" unchecked required> Always</td>
                                        <td><input type="radio" name="t10" value="4" unchecked required> Often</td>
                                        <td><input type="radio" name="t10" value="3" unchecked required> Sometimes</td>
                                        <td><input type="radio" name="t10" value="2" unchecked required> Rarely</td>
                                        <td><input type="radio" name="t10" value="-2" unchecked required> Never</td>
                                    </tr>
                                        <tr>
                                        <td >11</td>
                                        <td >Motivate students by identifying their strength/ weakness and providing right level of guidance</td>
                                        <td><input type="radio" name="t11" value="5" unchecked required> Always</td>
                                        <td><input type="radio" name="t11" value="4" unchecked required> Often</td>
                                        <td><input type="radio" name="t11" value="3" unchecked required> Sometimes</td>
                                        <td><input type="radio" name="t11" value="2" unchecked required> Rarely</td>
                                        <td><input type="radio" name="t11" value="-2" unchecked required> Never</td>
                                    </tr>
                                        <tr>
                                        <td >12</td>
                                        <td >Use of modern ICT tools (LCD/ Webinar/ Multimedia presentation/ NPTEL videos etc.,.)</td>
                                        <td><input type="radio" name="t12" value="5" unchecked required> More Frequently</td>
                                        <td><input type="radio" name="t12" value="4" unchecked required> Frequently</td>
                                        <td><input type="radio" name="t12" value="3" unchecked required> Sometimes</td>
                                        <td><input type="radio" name="t12" value="2" unchecked required> Rarely</td>
                                        <td><input type="radio" name="t12" value="-2" unchecked required> Never</td>
                                    </tr>
                                        <tr>
                                        <td >13</td>
                                        <td >Upload course materials in the web portal at appropriate time</td>
                                        <td><input type="radio" name="t13" value="5" unchecked required> Always</td>
                                        <td><input type="radio" name="t13" value="4" unchecked required> Often</td>
                                        <td><input type="radio" name="t13" value="3" unchecked required> Sometimes</td>
                                        <td><input type="radio" name="t13" value="2" unchecked required> Rarely</td>
                                        <td><input type="radio" name="t13" value="-2" unchecked required> Never</td>
                                    </tr>
                                        <tr>
                                        <td >14</td>
                                        <td >Effectiveness of the course material uploaded</td>
                                        <td><input type="radio" name="t14" value="5" unchecked required> Excellent</td>
                                        <td> <input type="radio" name="t14" value="4" unchecked required> Very Good</td>
                                        <td>  <input type="radio" name="t14" value="3" unchecked required> Good</td>
                                        <td><input type="radio" name="t14" value="2" unchecked required> Satisfied</td>
                                        <td><input type="radio" name="t14" value="-2" unchecked required> Not satisfied</td>
                                    </tr>
                                        <tr>
                                        <td >15</td>
                                        <td >Provides helpful information for preparing and writing examination</td>
                                        <td><input type="radio" name="t15" value="5" unchecked required> Always</td>
                                        <td><input type="radio" name="t15" value="4" unchecked required> Often</td>
                                        <td><input type="radio" name="t15" value="3" unchecked required> Sometimes</td>
                                        <td><input type="radio" name="t15" value="2" unchecked required> Rarely</td>
                                        <td><input type="radio" name="t15" value="-2" unchecked required> Never</td>
                                    </tr>
                                        <tr>
                                        <td >16</td>
                                        <td >Prompt in evaluating and returning answer scripts, assignment sheets</td>
                                        <td><input type="radio" name="t16" value="5" unchecked required> Always</td>
                                        <td><input type="radio" name="t16" value="4" unchecked required> Often</td>
                                        <td><input type="radio" name="t16" value="3" unchecked required> Sometimes</td>
                                        <td><input type="radio" name="t16" value="2" unchecked required> Rarely</td>
                                        <td><input type="radio" name="t16" value="-2" unchecked required> Never</td>
                                    </tr>
                                    <tr>
                                        <td >17</td>
                                        <td >Provide feedback on performance improvement while distributing answer scripts</td>
                                        <td><input type="radio" name="t17" value="5" unchecked required> Always</td>
                                        <td><input type="radio" name="t17" value="4" unchecked required> Often</td>
                                        <td><input type="radio" name="t17" value="3" unchecked required> Sometimes</td>
                                        <td><input type="radio" name="t17" value="2" unchecked required> Rarely</td>
                                        <td><input type="radio" name="t17" value="-2" unchecked required> Never</td>
                                    </tr>
                                        <tr>
                                        <td >18</td>
                                        <td >Fairness in evaluating answer scripts</td>
                                        <td><input type="radio" name="t18" value="5" unchecked required> Very Satisfied</td>
                                        <td><input type="radio" name="t18" value="4" unchecked required> Satisfied</td>
                                        <td><input type="radio" name="t18" value="3" unchecked required> Neutral</td>
                                        <td><input type="radio" name="t18" value="2" unchecked required> Slightly Dissatisfied</td>
                                        <td><input type="radio" name="t18" value="-2" unchecked required> Dissatisfied</td>
                                    </tr>
                                        <tr>
                                        <td >19</td>
                                        <td >Courteous and unbiased in dealing with students</td>
                                        <td><input type="radio" name="t19" value="5" unchecked required> Very Satisfied</td>
                                        <td><input type="radio" name="t19" value="4" unchecked required> Satisfied</td>
                                        <td><input type="radio" name="t19" value="3" unchecked required> Neutral</td>
                                        <td><input type="radio" name="t19" value="2" unchecked required> Slightly Dissatisfied</td>
                                        <td><input type="radio" name="t19" value="-2" unchecked required> Dissatisfied</td>
                                    </tr>
                                    <tr>
                                        <td >20</td>
                                        <td >Offers assistance and counseling to the students beyond regular classes</td>
                                        <td><input type="radio" name="t20" value="5" unchecked required> Very Satisfied</td>
                                        <td><input type="radio" name="t20" value="4" unchecked required> Satisfied</td>
                                        <td><input type="radio" name="t20" value="3" unchecked required> Neutral</td>
                                        <td><input type="radio" name="t20" value="2" unchecked required> Slightly Dissatisfied</td>
                                        <td><input type="radio" name="t20" value="-2" unchecked required> Dissatisfied</td>
                                    </tr>

                                    <tr>
                                        <td>Comments</td>
                                        <td colspan="6"><input type="text" placeholder="Max 200 Characters Only" maxlength="200" style="width:100%;" name="comments" required></td>
                                    </tr>



                                    
                                </tbody>

                            </table>







                            </div>

                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>


                </div>

            </div>

        </div>

    </form>








    <footer class="page-footer font-small black">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
          <a href="#"> St. Joseph's College of Engineering </a>
        </div>
        <!-- Copyright -->
      
      </footer>
</body>

<script>



$(document).ready(function(){

$(".edit").on("click",function(){
    var subcode=$(this).find("#subcd").val();
    var staffid=$(this).find("#stfid").val();
    var staff=$(this).find("#stf").val();
    var sub=$(this).find("#sub").val();
    $("#editModal #su").text("Subject: "+sub);
    $("#editModal #st").text("Staff Name: "+staff);
    $("#feedback #staffid").val(staffid);
    $("#feedback #subcode").val(subcode);
});
$(".editlab").on("click",function(){
    var subcode=$(this).find("#subcd").val();
    var staffid=$(this).find("#stfid").val();
    var staff=$(this).find("#stf").val();
    var sub=$(this).find("#sub").val();
    $("#editModallab #su").text("Subject: "+sub);
    $("#editModallab #st").text("Staff Name: "+staff);
    $("#feedback_lab #staffid").val(staffid);
    $("#feedback_lab #subcode").val(subcode);
});


});


</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
     <!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</html>