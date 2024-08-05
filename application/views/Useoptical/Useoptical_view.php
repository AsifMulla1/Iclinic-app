
<link rel="stylesheet" href="<?=base_url();?>Assets/select2/select2.min.css" />  
<link rel="stylesheet" href="<?=base_url();?>Assets/select2/multiselect.css" />  
<style>
  table, th, td {
  border:1px solid black;
  padding: 10px;
  text-align: center;
  width: 100px;
  font-weight: bold;
}
</style>

       
       
       <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                
          

                
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
               
                    <div class="col-md-12">
                   
                        <div class="card ">
                        <div class="breadcrumb mb-0" >
                            <h1 style="font-family: 'Work Sans', sans-serif;">Use</h1>
                        
                        </div>
                       
                                
                            <div class="card-body">
                                
                            <form role="form" id="Form" action="" method="post">
                                
                                    
                                    <div class="row">
                                        <input class="form-control" id="UseId"  placeholder="Enter your ID" name=""
                                        value="<?php if(!empty($data)) echo $data[0]->UseId;?>" type="hidden"/>


                                        <div class="col-md-3 col-sm-6 form-group">
                                           
                                           <label for="name">Use Name<span style="font-weight: 600"></span> <span class="required" style="color: red">*</span></label>
                                           <input type="text" class="form-control" name="" id="UseName" placeholder="Enter Name" value="<?php if(!empty($data)) echo $data[0]->UseName;?>">  
   
                                             
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-md-12 text-right">
                                            <button class="btn btn-primary" type="button" name="btn_save" id="btn_savee">Submit</button>
                                            <a  class="btn btn-warning text-white" href="<?=base_url()?>Useoptical/index">Edit</a>
                                            <!-- <button class="btn btn-warning text-white" type="button" name="cancel" id="cancel">Cancel</button> -->

                                        </div> 
                                    </div>

                                      
                                </form>
                                
                               

                            </div>
                        </div>
                    </div>
</div>

<script  src="<?php echo base_url();?>Assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url();?>Assets/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>Assets/select2/select2.init.js"></script>




<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>       

<script src="<?php echo base_url();?>Assets/js/CreateJs/Popup.js"></script> 


<script>  

var a=false;

$(document).ready(function(){
 
$("#fff").click(function(){
    // alert("hi");

  if(a==false){
    
    saveperform();
   }
  }); 
 
});

 function saveperform() 
{ 

     var UseId  = $('#UseId').val();
     var UseName = $('#UseName').val();
     
     if(UseName=="")  {
        Swal.fire(
            'Oops!',
            'Please Enter Required Fields!',
            'error'
        );
     }
    else
    {
        if(UseId >0)
        {
        alert(UseId );
            a=true;

            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
        
            $.ajax({
        url:base_path+"Useoptical/updateUsedata",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        // data: $('#Form').serialize(),
         beforeSend: function(){
               $('#fff').prop('disabled', true);
               $('#fff').html('Loading');
          }, 
        success: function(data) {
          console.log(data);
           $('#fff').prop('disabled', false);
           $('#fff').html('Save');

           Swal.fire(
            'Good job!',
            'Data Updated Successfully!',
            'success'
          );
         
          // set time function and direct page going on detail view
          setTimeout(function(){
            window.location.href = base_path+"Useoptical";

          }, 500);

         a=false;
        
          }
      });
        }
        else
        {
          // alert('hi');
        a=true;
            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
            
        $.ajax({
        url:base_path+"Useoptical/insertUse",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        // data: $('#Form').serialize(),
         beforeSend: function(){
               $('#btn_save').prop('disabled', true);
               $('#btn_save').html('Loading');
          }, 
        success: function(data) {
          console.log(data);
            $('#btn_save').prop('disabled', false);
           $('#btn_save').html('Save');
             $("#Form").trigger("reset");

             // alert("hi");

             Swal.fire(
              'Good job!',
              'Data Submitted Successfully!',
              'success'
            );

            // set time function and direct page going on detail view
            setTimeout(function(){
              window.location.href = base_path+"Useoptical";
  
            }, 500);
           
           a=false;
           
           }
        });
        }
      }
 }




</script> 












   















 



               
            