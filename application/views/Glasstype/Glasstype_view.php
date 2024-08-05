
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
                            <h1 style="font-family: 'Work Sans', sans-serif;">Glasstype</h1>
                        
                        </div>
                       
                                
                            <div class="card-body">
                                
                            <form role="form" id="Form" action="" method="post">
                                
                                    
                                    <div class="row">
                                        <input class="form-control" id="GlassTypeId"  placeholder="Enter your ID" name=""
                                        value="<?php if(!empty($data)) echo $data[0]->GlassTypeId;?>" type="hidden"/>


                                        <div class="col-md-3 col-sm-6 form-group">
                                           
                                           <label for="name">Glasstype Name<span style="font-weight: 600"></span> <span class="required" style="color: red">*</span></label>
                                           <input type="text" class="form-control" name="" id="GlassTypeNm" placeholder="Enter Name" value="<?php if(!empty($data)) echo $data[0]->GlassTypeNm ;?>">  
   
                                             
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-md-12 text-right">
                                            <button class="btn btn-primary" type="button" name="btn_save" id="btn_savee">Submit</button>
                                            <a  class="btn btn-warning text-white" href="<?=base_url()?>Glasstype/index">Edit</a>
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





<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>       


<script>  

var a=false;

$(document).ready(function(){
 
$("#lll").click(function(){

  if(a==false){
    
    saveperform();
   }
  }); 
 
});

 function saveperform() 
{ 

     var GlassTypeId   = $('#GlassTypeId').val();
     var GlassTypeNm = $('#GlassTypeNm').val();
     
     if(GlassTypeNm=="")  {
        Swal.fire(
            'Oops!',
            'Please Enter Required Fields!',
            'error'
        );
     }
    else
    {
        if(GlassTypeId >0)
        {
        // alert(GlassTypeId );
            a=true;

            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
        
            $.ajax({
        url:base_path+"Glasstype/updateGlasstypedata",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        // data: $('#Form').serialize(),
         beforeSend: function(){
               $('#lll').prop('disabled', true);
               $('#lll').html('Loading');
          }, 
        success: function(data) {
          console.log(data);
           $('#lll').prop('disabled', false);
           $('#lll').html('Save');

           Swal.fire(
            'Good job!',
            'Data Updated Successfully!',
            'success'
          );
         
          // set time function and direct page going on detail view
          setTimeout(function(){
            window.location.href = base_path+"Glasstype";

          }, 500);

         a=false;
        
          }
      });
        }
        else
        {
          // alert('hi');
        a=true;

        /**************only image save karne ke liye is do line aur niche ke teen line ka istamal kiya jata hai********** */
        
            // var form = $("#Form").closest("form");
            // var formData = new FormData(form[0]);
            
        $.ajax({
        url:base_path+"Glasstype/insertGlasstype",
        type: "POST",
        // data: formData,
        // processData: false,
        // contentType: false,
        data: $('#Form').serialize(),
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
              window.location.href = base_path+"Glasstype";
  
            }, 500);
           
           a=false;
           
           }
        });
        }
      }
 }


</script> 












   















 



               
            