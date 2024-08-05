
a=false;
$(document).ready(function(){
  // stocks();
$("#patientsaveBtn").click(function(){
if(a==false){
  stocksave();
  
 }
  });
});

function stocksave()
{


    // var StockID =$('#StockID').val();
    var PatientNm=$('#PatientNm').val(); 
    var Address=$('#Address').val(); 
    var MobileNo=$('#MobileNo').val(); 
    var Date=$('#Date').val(); 
    var Gender=$('#Gender').val(); 



if( PatientNm=="" || Address=="" || MobileNo=="" || Date=="" || Gender=="") 
{
    
    Swal.fire({
          title: 'Oops!',
          text: 'Please Enter Required Fields!',
          icon: 'error',
          showConfirmButton : false,
          timer: 5000,
          timerProgressBar: true
        })
        
}
    
    else
    {      
      
        $.ajax({
              url:base_path+"Shop/insertmodelpatient",
              type: "POST",
           
              data: $('#icareForm').serialize(),
              beforeSend: function(){
              $('#patientsaveBtn').prop('disabled', true);
              $('#patientsaveBtn').html('<i class="fa fa-spinner " style="padding-right:2%;"></i> Loading');
              }, 
               success: function(data) { 
                console.log(data);
              $("#icareForm").trigger("reset");
             
              
              $('#patientsaveBtn').html('<i class="fa fa-check-circle" style="font-size: 20px;color: #FFF;"></i>Save');
              $('#patientsaveBtn').prop('disabled', false);
           
             Swal.fire({
                title: 'Good job!',
              text: 'Data Submitted Successfully!',
              icon: 'success',
              showConfirmButton : false,
              timer: 900,
              timerProgressBar: true
            })
            patient();
           
           a=false;
           setTimeout(function () {
            // window.location.reload();
            $("#myModal").modal("hide");
          }, 1000);
            
            
               }
          });      
    }
  }
   // Use Ajax For without referashing dropdown save and fatch
   function patient(){
          
    $.ajax({

    url:base_path+"Shop/dropdownshare",
    method:'post',
    dataType : 'json',
    success:function(res){
      
    console.log(res);
   
    $('#FkPatientId').empty();
    $('#FkPatientId').append('<option value="" >-Select-</option>');
    for(var i=0;i<res.length;i++){
     $('#FkPatientId').append('<option value="'+res[i]['PatientId']+'">'+res[i]['PatientId']+'    '+res[i]['PatientNm']+'    '+res[i]['MobileNo']+'</option>');
     }
    }
   });
}




  
       
