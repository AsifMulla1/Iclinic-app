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
                                <h1  style="font-family: 'Work Sans', sans-serif;">Opticals Details</h1>
                            </div>
                            <div class="card-body">
                           
                            <button class="btn btn-secondary"><a href="<?=base_url() ?>Shop/create" class="text-white text-decoration-none"><i class="fa-solid fa-plus text-white"></i>&nbsp;Add New</a></button>
                                <div class="table-responsive">
                                    <table class="display table dataTable no-footer" id="example" style="width:100%">
                                        <thead class="table-head-style">
                                            <tr>
                                                <th>Output</th>
                                                <th>CasePaperID</th>
                                                <th>PatientNm</th>
                                                <th>Date</th>
                                                <th>BillAmount</th>
                                                <th>PaidAmount</th>
                                                <th>RemainAmount</th>
                                                <!-- <th>PayMode2</th>
                                                <th>SecondAmt</th>
                                                <th>PayMode3</th>
                                                <th>ThirdAmt</th>
                                                <th>PayMode4</th>
                                                <th>FourthAmt</th> -->
                                                <th>Status</th>
                                                
                                                
                                               
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                          

                                         <?php 
                                            $i=0;
                                            foreach($alldata as $rw=>$value){

                                                // For Paid Unpaid show in table without database
                                                $Purchase= $value->RemainAmount;
                                               if ($Purchase == 0 || $Purchase < 0) {
                                                $pur = '<button type="button" class="btn" style="background: green !important;opacity: 1!important;color:white!important;border-radius: 7px;padding: 5px 20px;
                                                font-size: 15px;">Paid</button" >';
                                               }
                                              
                                               else{
                                                $pur = '<button type="button" class="btn btn-warning text-white" style="background-color:red;opacity:1;    border-radius: 7px;">Unpaid</button>';
                                               }   
                                         echo "<tr>";

                                            
                                            echo  '<td><a href="'.base_url().'Shop/update/'.$value->CasePaperID.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-regular fa-pen-to-square" style="color:black;"></i></a> 
                                                 </td>';
                                            
                                            echo "<td>".$value->CasePaperID."</td>";
                                            echo "<td>".$value->PatientNm."</td>";
                                            echo "<td>".$value->Date."</td>";
                                            // echo "<td>".$value->column1."</td>";
                                            // echo "<td>".$value->column2."</td>";
                                            // echo "<td>".$value->column3."</td>";
                                            // echo "<td>".$value->column4."</td>";
                                            // echo "<td>".$value->column5."</td>";
                                            // echo "<td>".$value->column6."</td>";
                                            // echo "<td>".$value->column7."</td>";
                                            // echo "<td>".$value->column8."</td>";
                                            // echo "<td>".$value->column9."</td>";
                                            // echo "<td>".$value->column10."</td>";
                                            // echo "<td>".$value->column11."</td>";
                                            // echo "<td>".$value->column12."</td>";
                                            // echo "<td>".$value->RemarkName."</td>";
                                            // echo "<td>".$value->UseName."</td>";
                                            // echo "<td>".$value->TypeName."</td>";
                                            // echo "<td>".$value->UnitName."</td>";
                                            // echo "<td>".$value->GlassTypeNm."</td>";
                                            // echo "<td>".$value->Note."</td>";
                                            // echo "<td>".$value->PayNm."</td>";
                                            echo "<td>".$value->BillAmount."</td>";
                                            echo "<td>".$value->PaidAmount."</td>";
                                            echo "<td>".$value->RemainAmount."</td>";
                                            // echo "<td>".$value->PayMode2."</td>";
                                            // echo "<td>".$value->SecondAmt."</td>";
                                            // echo "<td>".$value->PayMode3."</td>";
                                            // echo "<td>".$value->ThirdAmt."</td>";
                                            // echo "<td>".$value->PayMode4."</td>";
                                            // echo "<td>".$value->FourthAmt."</td>";
                                            echo "<td>".$pur."</td>";
                                           
                                            
                                                                                   
                                           
                                            $i++;
                                        
                                            echo "</tr>";                        
                                        }
                                        ?> 
                             
                                
                                          
                                        </tbody>
                                        
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
</div>
                  

<script  src="<?php echo base_url(); ?>web_resources/dist/js/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
   

    $('#example').dataTable( {} );
 
    
} );
</script>
                   
                       
               
            