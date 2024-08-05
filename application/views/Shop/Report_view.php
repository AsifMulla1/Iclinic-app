<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/multiselect.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<style>
    @media only screen and (max-width: 320px) {
  .btnn{
    top: 95px;
    margin-left: -35px;
  }
  /* .main_heading{
    display:none;
  } */
  .card-body {
    flex: 1 1 auto;
    padding: 10px!important;
    margin-top: 50px;
}

  
}
</style>
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column" style="padding: 0.75rem 14px 0;">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
               
                
                <!-- <div class="separator-breadcrumb border-top"></div> -->
                <div class="row">
                
                    <div class="col-md-12">
                        <div class="card mt-3 mt-lg-0">
                            <div class="breadcrumb " >
                                <h1  style="font-family: 'Work Sans', sans-serif;">Casepaper & Patient Report</h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Member Name</label>
                                            <select class="select2 form-control mt-1" id="FkPatientId" 
                                                name="FkPatientId" style="width: 100%;">
                                                <option value="">Select Member</option>
                                                        <?php

                                                            foreach ($membernamereport as $key => $value) {
                                                            $selected="";
                                                        
                                                            echo '<option value="'.$value->PatientId.'"'.$selected.' >'.$value->PatientId.'  '.$value->PatientNm.'</option>';

                                                            }
                                                            ?>
                                                </select>
                                        </div>


                                        <div class="col-12 col-md-3">
                                            <label for="">Status</label>
                                            <select class="select2 form-control mt-1" id="fkstatus" 
                                                 style="width: 100%;">
                                                <option value="">Select status</option>
                                                <option value="1" >Paid</option>
                                                <option value="2">Unpaid</option>
                                                </select>

                                        </div>


                                        <div class="col-md-2">
                                          <label for="start_date">From Date</label>
                                           <input type="date"  id="startdt" placeholder="Start Date" class="form-control">
                                        </div>


                               
                                        <div class="col-md-2">
                                         <label for="">To Date</label>
                                         <input type="date"  id="enddt" placeholder="Completed Date" class="form-control" >
                                      </div>

                                      <div class="col-md-2 ">
                                         <button class="btn btn-primary" type="button"  id="searchbutton" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;background-color:black;border:none;margin-top: 30px;">Search</button>
                                      </div>
                              </div>

                              <div class="container">
                 <div class="statement_table checkout_dt" style="margin-top:5px!important;padding:10px 2px!important"  id="detialview">

                    <div class="statement_body">
                        <div id="maintable">

                            
                            <div class="table-responsive-md" style="overflow-y:hidden!important;">

                                <table class="display table no-footer mt-3 text-center" >
                                    <thead>
                                            <tr>
                                                <!-- <th>Output</th> -->
                                                <th>CasePaper ID</th>
                                                <th>Patient Name</th>
                                                <th>Date</th>
                                                <th>Bill Amount</th>
                                                <th>Paid Amount</th>
                                                <th>Remaining Amount</th>
                                                <!-- <th>Status</th> -->
                                             </tr>
                                    </thead>
                                    
                                    <tbody id="tabledata"> </tbody>

                                </table>														
                            </div>
                            </div>
                     </div>
                 </div>
                 </div>

                 <img src="<?php echo base_url(); ?>Assets/images/loading.gif" alt="" id="loadershow" class="shadow bg-white"  style="position:absolute;top:65%;right:47%;bottom:0;border-radius:50%">

                            </div>
                        </div>
                    </div>
</div>
                  

<script  src="<?php echo base_url(); ?>web_resources/dist/js/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
    <script src="<?php echo base_url();?>Assets/select2/select2.min.js"></script>
    <script src="<?php echo base_url();?>Assets/select2/select2.init.js"></script>  
<script>
	$(document).ready(function() {
   

    $('#example').dataTable( {} );
 
    
} );
</script>


<script>
    $(document).ready(function(){
            document.getElementById('startdt').valueAsDate = new Date();
            document.getElementById('enddt').valueAsDate = new Date();

        $('#loadershow').hide();
            $('#detialview').show();
                $("#searchbutton").click(function(){
                    // alert('hii');
                    // $('#maintable').show();
 
             //here we will run an ajax request
               let FkPatientId = document.getElementById('FkPatientId').value;
                let startDate = document.getElementById('startdt').value;
                let endDate = document.getElementById('enddt').value; 
                let Status = document.getElementById('fkstatus').value; 

 
        
 
             $.ajax({
 
                 url:"<?php echo base_url();?>Report/GetData",
                 method: "POST",
 
                 data:{'FkPatientId':FkPatientId,
                       'startDate':startDate,
                        'endDate':endDate,
                        'fkstatus':Status,

                       },
               
                 // dataType:'JSON',
 
                 beforeSend: function(){
                      $('#loadershow').hide();
                  },
                 success: function(res){
                  
                     setTimeout(() => {
                         $('#loadershow').hide();
 
                }, "1000");
                     
                     
                $('#maintable').show(); 
                  $('#Storedata').empty(); 
                  $('#maintable').empty(); 
                  
                  $('#maintable').append('<div class="table-responsive-md" id="tabls" style="border-collapse: collapse;"><table id="Storedata" class="display table  mt-3"> </table> </div>');

                  $.getScript('<?=base_url() ?>Assets/css/datatables.min.js');
 
                  var data=JSON.parse(res);
                   console.log(data.length);
                                                      
                           if (data!='') {
                           var dataSet6=[];

                for (var i = 0; i < data.length; i++){
                 console.log(data[i]['Id']);
                var id=data[i]['Id'];
                
                 dataSet6[i]= [
                
               
                 '<div class="pd">'+data[i]['CasePaperID']+'</div>',
                 '<div class="pd">'+data[i]['PatientNm']+'</div>',
                 '<div class="pd">'+data[i]['Date']+'</div>',
                 '<div class="pd">'+data[i]['BillAmount']+'</div>',
                 '<div class="pd">'+data[i]['PaidAmount']+'</div>',
                 '<div class="pd">'+data[i]['RemainAmount']+'</div>',
                 
                 
                ];
 
      }
     
 
        var tableOne = $('#Storedata').DataTable({
                            data: dataSet6,
                            columns: [
                                //  { title: "" },
                                { title: "CasePaper ID" },
                                { title: "Patient Name" },
                                { title: "Date" },
                                { title: "Bill Amount" },
                                { title: "Paid Amount" },
                                { title: "Remaining Amount"},

                                ],
                            });
    
                        }
                           else
                           {
                             $('#Storedata').empty();
                            //   alert('No Data found');
                            Swal.fire({
                               title: 'No Record found!',
                               text: '',
                               icon: 'error',
                               showConfirmButton : false,
                               width:'400px'
                               
                           });
                              
                           }
                 }
             });
 
         });
     });
 </script>
    
<script src="<?php echo base_url();?>Assets/select2.min.js"></script>
 <script src="<?php echo base_url();?>Assets/select2.init.js"></script>
                       
               
            