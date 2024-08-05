
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
                            <h1 style="font-family: 'Work Sans', sans-serif;">Member Information</h1>
                        
                        </div>
                       
                                
                            <div class="card-body">
                                
                            <form role="form" id="Form" action="" method="post">
                                
                                    
                                    <div class="row">
                                        <input class="form-control" id="PatientId"  placeholder="Enter your ID" name=""
                                        value="<?php if(!empty($data)) echo $data[0]->PatientId;?>" type="hidden"/>


                                        <div class="col-md-3 col-sm-6 form-group">
                                           
                                          <label for="name">Mamber Name<span class="required" style="color: red">*</span></label>
                                           <input type="text" class="form-control" name="" id="PatientNm" placeholder="Enter Name" value="<?php if(!empty($data)) echo $data[0]->PatientNm;?>">  
   
                                             
                                        </div>

                                        <div class="col-md-3 col-sm-6 form-group">
                                           
                                        <label for="name">Mobile No.<span class="required" style="color: red">*</span></label>
                                        <input type="number" class="form-control" name="" id="MobileNo" placeholder="Mobile no" value="<?php if(!empty($data)) echo $data[0]->MobileNo;?>" onKeyPress="if(this.value.length==10) return false;">  
   
                                        </div>

                                        <div class="col-md-3 col-sm-6 form-group">
                                           
                                          <label for="name">Address<span class="required" style="color: red">*</span></label>
                                          <textarea class="form-control" type="text" name="" id="Address" cols="48" rows="2"><?php if(!empty($data)) echo $data[0]->Address;?></textarea>
                                             
                                        </div>

                                        
                                    </div>
                                    <div class="row">
                                        

                                        <div class="col-md-3 col-sm-6 form-group">
                                           
                                          <label for="name">Date.<span class="required" style="color: red">*</span></label>
                                           <input type="Date" class="form-control" name="" id="Date" placeholder="Enter Name" value="<?php if(!empty($data)) echo $data[0]->Date;?>">  
   
                                             
                                        </div>

                                        <div class="col-md-3 col-sm-6 form-group">
                                           
                                        <label for="name">Gender<span class="required" style="color: red">*</span></label><br>

                                         <label for="">male</label>&nbsp;
                                         <input id="male" name="" value="1"  type="radio">&nbsp;&nbsp;&nbsp;
                                         <label for="">female</label>&nbsp;
                                         <input id="female" name="" value="2"   type="radio">
                                             
                                        </div>

                                        

                                       

                                        
                                    </div>

                                    <div class="row ">
                                        <div class="col-md-12 text-right">
                                            <button class="btn btn-primary" type="button" name="btn_save" id="btn_savee">Submit</button>
                                            <a  class="btn btn-warning text-white" href="<?=base_url()?>Patient/index">Edit</a>
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

<!-- <script src="<?php echo base_url();?>Assets/js/CreateJs/Popup.js"></script>  -->
<script>
    document.getElementById('Date').valueAsDate = new Date();       
</script>

<script>

    var id= document.getElementById('PatientId').value;
    
    if (id>0){
        var gender=<?php if(!empty($data)) echo $data[0]->Gender?>;
        // alert(gender);

        if(gender==1){
            male = document.getElementById("male");
            male.checked = true;
        }
        else{
            female = document.getElementById("female");
            female.checked = true;
        }
}
    
    
</script>

<script>  

var a=false;

$(document).ready(function(){
 
$("#uuuu").click(function(){
    // alert("hi");

  if(a==false){
    
    saveperform();
   }
  }); 
 
});

 function saveperform() 
{ 

     var PatientId  = $('#PatientId').val();
     var PatientNm = $('#PatientNm').val();
     var Address  = $('#Address').val();
     var MobileNo = $('#MobileNo').val();
     var Date  = $('#Date').val();
     var Gender = $('#Gender').val();
     
     if(PatientNm=="" || Address=="" || MobileNo=="" || Date=="" || Gender=="")  {
        Swal.fire(
            'Oops!',
            'Please Enter Required Fields!',
            'error'
        );
     }
    else
    {
        if(PatientId >0)
        {
        // alert(PatientId );
            a=true;

            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
        
            $.ajax({
        url:base_path+"Patient/updatePatientdata",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        // data: $('#Form').serialize(),
         beforeSend: function(){
               $('#uuuu').prop('disabled', true);
               $('#uuuu').html('Loading');
          }, 
        success: function(data) {
          console.log(data);
           $('#uuuu').prop('disabled', false);
           $('#uuuu').html('Save');

           Swal.fire(
            'Good job!',
            'Data Updated Successfully!',
            'success'
          );
         
          // set time function and direct page going on detail view
          setTimeout(function(){
            window.location.href = base_path+"Patient";

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
        url:base_path+"Patient/insertPatientMaster",
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
              window.location.href = base_path+"Patient";
  
            }, 500);
           
           a=false;
           
           }
        });
        }
      }
 }




</script> 












   















 



               
            