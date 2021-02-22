<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Allocation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<?php 
session_start();

if($_SESSION['fuck']==100){
    $_SESSION['fuck']=-1;
    echo '<div class="alert alert-success" alert-dismissible>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Staff Allocation Successfull!!!!
    </div>';
}

if($_SESSION['fuck']==101){
    $_SESSION['fuck']=-1;
    echo '<div class="alert alert-danger" alert-dismissible>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Staff Allocation Failed.. Please Retry!!!!
    </div>';
}
?>

<style>
.modal {
overflow-y:auto;
}
    </style>
<body>

    <div class="container-fluid pt-5">

    <form action="staff_db_connect.php" method="post">

        <div class="row pb-2 justify-content-center">

            <div class="col-lg-5 pl-5 py-2 px-5">
                <div class="row">
                    <div class="col-lg-12">

                    <div class="form-group">
                        <label for="sel1" class="h5">Academic Year</label>
                        <select class="form-control" id="yr" name="yr">
                            <option value="default" selected>--Select Year--</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>


                 <div class="form-group">
                <label for="sel1" class="h5">Batch</label>
                <select class="form-control" id="batch" name="batch">
                    <option value="default" selected>--Select Batch--</option>
                    <option value="2017">2017-21</option>
                    <option value="2018">2018-22</option>
                    <option value="2019">2019-23</option>
                    <option value="2020">2020-24</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sel1" class="h5">Semester</label>
                        
                <select class="form-control" id="sem" name="sem">
                    <option value="default" selected>--Select Semester--</option>
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

            

            <div class="form-group">
                <label for="sel1" class="h5">Section</label>
                <select class="form-control" id="sec" name="sec">
                    <option value="default" selected>--Select Section--</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-12 py-2">
                    <div class="output1"></div>        
                </div>
        
        </div>
                
            </div>
                



            <div class="col-lg-4 pl-5  py-2 px-5 bg-light justify-content-center">

                <div class="row " id="existing">


                
                </div>

                <p class="text-info pt-5">Click to see allocated staffs for the current selection</p>
                <button type="button" class="btn btn-md btn-success" id="existingbtn">Load Info</button>

        
            
            
            </div>


        
        </div>

       




    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  
                </div>
                <div class="modal-body" style="margin-left:30px;">
                    
                    <div class="py-2">
                    <input type='text' class="form-control" id="staffload" placeholder="Search using Staff Name">
                    </div>
                    
                  <div class="content" id="sample"></div>
                    
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal" data-toggle="modal" data-target="#mynextModal" id="students">Next</button>
                </div>
              </div>
            </div>
    </div>
        
    <div class="modal fade" id="mynextModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  
                </div>
                <div class="modal-body" style="margin-left:30px;">
                    <div class="content1" id="studentbody"></div>
                    
                    
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info" name="testing">Next</button>
                </div>
              </div>
            </div>
    </div>
    </form>
    </div>

    
    
</body>










<script>

//for fetching subjects
$(document).ready(function(){

    $('#sec').change(function(){
        var batch=$('#batch').val();
        var sem=$('#sem').val();
        var sec=$(this).val();
        $.ajax({
    url:"subject_fetch.php",
    method:"POST",
    data:{batch:batch,sem:sem,sec:sec },
    success:function(data){
     $(".output1").html(data);
     $('#existing').html('<div></div>');  
    
    }
   })
    });
});
    
    
$(document).ready(function(){

    $('#sem').change(function(){
         $('#existing').html('<div></div>');  
         $('.output1').html('<div></div>'); 
         $("#sec").val("default");
    });
});
    
    
$(document).ready(function(){

    $('#batch').change(function(){
         $('#existing').html('<div></div>');  
         $('.output1').html('<div></div>'); 
         $("#sec").val("default");
    });
});
//for fetching existing subjects        
 $(document).ready(function(){  
      $('#existingbtn').click(function(){  
        var batch=$('#batch').val();
        var sem=$('#sem').val();
        var sec=$('#sec').val();  
        $.ajax({  
                url:"existing_staff.php",  
                method:"POST", 
               data:{batch:batch,sem:sem,sec:sec},
                success:function(data){  
                     $('#existing').html(data);  
                }  
           });  
      });  
 }); 

 $(document).ready(function(){  
      $('#students').click(function(){  
        var batch=$('#batch').val();
        var sem=$('#sem').val();
        var sec=$('#sec').val();  
        $.ajax({  
                url:"load_student.php",  
                method:"POST", 
               data:{batch:batch,sem:sem,sec:sec},
                success:function(data){  
                     $('#studentbody').html(data);  
                }  
           });  
      });  
 });
    
//for filtering staff based on input
$(document).ready(function(){

    $('#staffload').keyup(function(){
        var curtext=$(this).val();
        var action=$(this).attr("id");
        $.ajax({
    url:"staff_fetch.php",
    method:"POST",
    data:{action:action, query:curtext },
    success:function(data){
     $("#sample").html(data);
    }
   })
    });
});

//select all students
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
 

</script>
</html>