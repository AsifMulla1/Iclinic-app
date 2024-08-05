
<link rel="stylesheet" href="<?=base_url();?>Assets/select2/select2.min.css" />  
<link rel="stylesheet" href="<?=base_url();?>Assets/select2/multiselect.css" />  
<style>
  .table_optical, .table_optical_th, .table_optical_td {
  border:1px solid black;
  padding: 3px;
  text-align: center;
  width: 100px;
  font-weight: bold;
}
/* .table_optical input {
  border-radius:50px;
  border:none;
  border-bottom:1px solid black;
} */
.pdd{
  padding-top: 82px;
}
@media(max-width:992px){
  .pdd{
    padding-top:0px!important
  }
}
  .input_table{
      width: 100%;
      height: 50px;
      text-align: center;
      font-size: 18px;
  }

  .tablestyle{
    border:2px solid black;

  }

  .btn_model{
    margin-top: 24px;
    border-radius: 0;
    background: #0a0af7;
    padding: 6px 10px;
    border-radius:5px;
  }

  .tablescrollbar{
    overflow:scroll!important;
    height:180px!important;
  }

  .refreshbutton{
    border-radius: 50%;
    background: blue;
    color: white;
    border: none;
    height: 35px;
    width: 35px;
    font-size: 17px;
    text-align: center;
    line-height: 35px;
  }
</style>

       
       
       <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column" style="padding: 0.5rem 19px 0;">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
              
                <!-- <div class="separator-breadcrumb border-top"></div> -->
                <div class="row">
               
                    <div class="col-md-12">
                   
                        <div class="card mt-3 mt-lg-0">
                        <!-- <div class="breadcrumb mb-0" >
                            <h1 style="font-family: 'Work Sans', sans-serif;">I Care Optical</h1>
                        </div> -->
                       
                                
                            <div class="card-body m-0 mb-0 py-3">
                                
                            <form role="form" id="Form" action="" method="post">
                                      <div class="row">
                                        <input class="form-control" id="CasePaperID"  placeholder="Enter your ID" name=""
                                        value="<?php if(!empty($data)) echo $data[0]->CasePaperID;?>" type="hidden"/>

                                        <div class="col-md-5 d-flex" style="justify-content: space-between;">
                                            
                                        <div class="form-group" style="width: 100%;">
                                           <label for="name" class="fw-bold">Patient Name<span style="font-weight: 600"></span> <span class="required" style="color: red">*</span></label>
                                           <select style="width:100%;" class="select2 form-control" id="FkPatientId" name="" <?php echo (!empty($data[0]->CasePaperID)) ? 'disabled' : ''; ?>>
                       
                                            <option value="0">-Select-</option>
                                            <?php foreach($PatientNmdata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->FkPatientId)){

                                                    if($value->PatientId == $data[0]->FkPatientId) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->PatientId.'" '.$selected.'>'.$value->PatientId.'  '.$value->PatientNm.'  '.$value->MobileNo.'</option>';
                                            }
                                            ?> 

                                             </select>  </div>



                                             <div> 
                                              <button type="button" class="btn btn_model" id="btnhide" data-toggle="modal" data-target="#myModal" style="background-color:black;">
                                               <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                               </button>
                                              </div>

                                    </div>

                                      
                                        &nbsp;
                                        <div class="col-md-2 form-group mb-3">
                                            <label for="date">Date<span style="font-weight: 600"></span> 
                                                <span class="required" style="color: red">*</span>
                                            </label>
                                           
                                            <input type="date" class="form-control" name="" id="Date" autofocus="autofocus"  
                                             value="" <?php echo (!empty($data[0]->CasePaperID)) ? 'disabled' : ''; ?> required>
                                        </div>

                                        <div class="col-md-2"></div>


                                        <!-- <div class="d-flex" style="align-items: baseline;">  -->
                                          <div>
                                             <h3 class="mt-2" style="font-weight: 600;">Patient History</h3>
                                          </div>
                                          <!-- <button type="button" class="refferesh_btn mt-3 mt-lg-0" id="buttonrefresh" style="margin-left:40px;background-color:black;"><i class="fa-solid fa-arrows-rotate"></i></button> -->

                                          <div class="row">
                                          <button type="button" class="refferesh_btn mt-3 mt-lg-0" id="buttonrefresh" style="margin-left:70px;background-color:black;"><i class="fa-solid fa-arrows-rotate"></i></button>
                                          </div>

                                        <!-- </div> -->


                                        

                                         
                                        
                                      </div>

                            <div class="row">

                                <div class="col-12 col-sm-12 col-md-7">
                                  <div class="table-responsive">
                                  <table class="table_optical" style="width:100%;">
                                    <thead>
                                    <tr style="background: #dae1f3;">
                                      <th class="table_optical_th"></th>
                                      <th class="table_optical_th">Sph.</th>
                                      <th class="table_optical_th">Cyl.</th>
                                      <th class="table_optical_th">Axis.</th>
                                      <th class="table_optical_th">Sph.</th>
                                      <th class="table_optical_th">Cyl.</th>
                                      <th class="table_optical_th">Axis.</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      <td class="table_optical_td" style="background: #dae1f3;">D.V</td>
                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column1" id="column1" value="<?php if(!empty($data))echo $data[0]->column1;?>" style="color:blue!important;"></td>

                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column2" id="column2" value="<?php if(!empty($data))echo $data[0]->column2;?>"style="color:blue!important;"></td>

                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column3" id="column3" value="<?php if(!empty($data))echo $data[0]->column3;?>"style="color:blue!important;"></td>

                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column4" id="column4" value="<?php if(!empty($data))echo $data[0]->column4;?>" style="color:blue!important;"></td>

                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column5" id="column5" value="<?php if(!empty($data))echo $data[0]->column5;?>" style="color:blue!important;"></td>

                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column6" id="column6" value="<?php if(!empty($data))echo $data[0]->column6;?>" style="color:blue!important;"></td>
                                      
                                    </tr>
                                    <tr>
                                      <td class="table_optical_td" style="background: #dae1f3;">N.V</td>
                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column7" id="column7" value="<?php if(!empty($data))echo $data[0]->column7;?>" style="color:blue!important;"></td>

                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column8" id="column8" value="<?php if(!empty($data))echo $data[0]->column8;?>" style="color:blue!important;"></td>

                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column9" id="column9" value="<?php if(!empty($data))echo $data[0]->column9;?>" style="color:blue!important;"></td>

                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column10" id="column10" value="<?php if(!empty($data))echo $data[0]->column10;?>" style="color:blue!important;"></td>

                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column11" id="column11" value="<?php if(!empty($data))echo $data[0]->column11;?>" style="color:blue!important;"></td>

                                      <td class="table_optical_td" style="width:100px;"><input type="text" class="input_table enterkey" placeholder="" name="column12" id="column12" value="<?php if(!empty($data))echo $data[0]->column12;?>" style="color:blue!important;"></td>
                                    </tr>
                                    </tbody>
                                  </table>
                                  </div>
                             </div>


                          <div class="col-12 col-sm-12 col-md-5">
                                              
                                  <!-- add below table -->
                                  <div class="table-responsive abc"  style="overflow:auto;">
                                  <table class="display table table-bordered mt-2 text-center" id="example" style="width:100%" >
                                    <thead class="table-head-style" style="position:sticky;top:0;">
                                      <tr>
                                                <th style='width:5%;padding: 5px 6px!important;'>ID</th>
                                                <th style='width:25%;padding: 5px 6px!important;'>Date</th>
                                                <th style="padding: 5px 6px!important;">BillAmt</th>
                                                <th style="padding: 5px 6px!important;width:10%;">PaidAmt</th>
                                                <th style="padding: 5px 6px!important;width:10%;">REAmt</th>
                                                <!-- <th style="padding:5px 0.75rem!important;width:10%;">Status</th>  -->
                                      </tr>
                                    </thead>
                                  <tbody id="tabledata" class=""> </tbody>

                                  </table>  
                                      <!-- <input type="number" class="BillTot" oninput="icare()"  name="BillTot" id="BillTot"   placeholder="BillTotal" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->ThirdAmt;?>"  required> -->
                                  </div>
                           </div>


                                  </div>
                                  <!-- <hr> -->


                                  <div class="row mt-3 mb-3">
                                      <div class="col-12 col-md-3 mt-2">
                                        <label for="name"><a href="<?=base_url();?>Remark/create" target="_blank">Remark</a></label>
                                        <select style="width:100%;" class="select2 form-control" id="Remark" name="">
                    
                                            <option value="0">-Select-</option>
                                            <?php foreach($Remarkdata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->Remark)){

                                                    if($value->RemarkId == $data[0]->Remark) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->RemarkId.'" '.$selected.'>'.$value->RemarkName.'</option>';
                                            }
                                            ?> 

                                          </select>

                                          
                                      </div>
                                        <div class="col-12 col-md-2 mt-2">
                                           
                                           <label for="name"><a href="<?=base_url();?>Useoptical/create" target="_blank">Frame Uses</a></label>
                                           <select style="width:100%;" class="select2 form-control" id="Use" name="">
                       
                                            <option value="0">-Select-</option>
                                            <?php foreach($Usedata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->Use)){

                                                    if($value->UseId  == $data[0]->Use) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->UseId .'" '.$selected.'>'.$value->UseName.'</option>';
                                            }
                                            ?> 

                                          </select>
   
                                             
                                         </div>

                                         <div class="col-12 col-md-2 mt-2">
                                           
                                           <label for="name"><a href="<?=base_url();?>Type/create" target="_blank">Type</a></label>
                                           <select style="width:100%;" class="select2 form-control" id="Type" name="">
                       
                                            <option value="0">-Select-</option>
                                            <?php foreach($Typedata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->Type)){

                                                    if($value->TypeId == $data[0]->Type) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->TypeId .'" '.$selected.'>'.$value->TypeName.'</option>';
                                            }
                                            ?> 

                                             </select>
                                         </div> 
                                         
                                         <div class="col-12 col-md-2 mt-2">
                                           
                                           <label for="name"><a href="<?=base_url();?>Unit/create" target="_blank">Unit</a></label>
                                           <select style="width:100%;" class="select2 form-control" id="Unit" name="">
                       
                                            <option value="0">-Select-</option>
                                            <?php foreach($Unitdata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->Unit)){

                                                    if($value->UnitId == $data[0]->Unit) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->UnitId .'" '.$selected.'>'.$value->UnitName.'</option>';
                                            }
                                            ?> 

                                             </select>
   
                                             
                                         </div>



                                         <div class="col-12 col-md-3 mt-2">
                                           
                                           <label for="name"><a href="<?=base_url();?>Glasstype/create" target="_blank">Glass Type</a></label>
                                           <select style="width:100%;" class="select2 form-control" id="GlassType" name="">
                       
                                            <option value="0">-Select-</option>
                                            <?php foreach($Glassdata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->GlassType)){

                                                    if($value->GlassTypeId == $data[0]->GlassType) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->GlassTypeId .'" '.$selected.'>'.$value->GlassTypeNm.'</option>';
                                            }
                                            ?> 

                                          </select>
   
                                             
                                         </div>


                                         


                                      </div>



                                    

                                    
                                     <fieldset class="fielset-style"> 
                                         <legend class="legend-style"> Payment Details </legend> 


                                         <div class="row"> 
                                         <div class="col-md-2 col-xl-2 col-lg-2 form-group">
                                           <label for="cr">Bill Amount</label>
                                           
                                           <input type="number" class="form-control" name="" id="BillAmount" oninput="icare()"   placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->BillAmount;?>" >
                                        </div>

                                        <div class="col-md-2 col-xl-2 col-lg-2 form-group">
                                           <label for="cr">Remaining Amount</label>
                                           <input type="number" class="form-control"  name="" id="RemainAmount"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->RemainAmount;?>"  style="background: #cfdde6;" readonly>
                                        </div>

                                        <div class="col-md-2 col-xl-2 col-lg-2 form-group">
                                           <label for="cr">Total Paid Amount</label>
                                           <input type="number" class="form-control"  name="" id="TotalAmount"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->TotalAmount;?>"  style="background: #cfdde6;" readonly>
                                        </div>

                                      </div>
                                    
                                    <div class="row">
                                            <!-- <div>
                                              <h4>Remaining Amount:</h4>
                                            </div> -->

                                        <div class="col-md-2 col-xl-3 col-lg-3 form-group">
                                           
                                           <label for="name">Payment Mode</label>
                                           <select style="width:100%;" class="select2 form-control" id="PayMode1" name="">
                       
                                            <option value="0">-Select-</option>
                                            <?php foreach($Paymentdata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->PayMode1)){

                                                    if($value->PayId == $data[0]->PayMode1) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->PayId.'" '.$selected.'>'.$value->PayNm.'</option>';
                                            }
                                            ?> 
                                            

                                             </select>
   
                                             
                                         </div>


                                        <div class="col-md-2 col-xl-2 col-lg-2 form-group">
                                           <label for="cr">1st Amount</label>
                                           
                                           <input type="number" class="form-control" name="" id="PaidAmount" oninput="icare()"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->PaidAmount;?>" >
                      
                                        </div>

                                        <div class="col-md-2"></div>

                                        <div class="col-md-2 col-xl-3 col-lg-3 form-group">
                                           
                                           <label for="name">Payment Mode</label>
                                           <select style="width:100%;" class="select2 form-control" id="PayMode2" name="">
                       
                                            <option value="0">-Select-</option>
                                            <?php foreach($Paymentdata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->PayMode2)){

                                                    if($value->PayId == $data[0]->PayMode2) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->PayId.'" '.$selected.'>'.$value->PayNm.'</option>';
                                            }
                                            ?> 
                                            

                                             </select> 
                                         </div> 



                                         <div class="col-md-2 col-xl-2 col-lg-2 form-group">
                                           <label for="cr">2nd Amount</label>
                                           
                                           <input type="number" class="form-control" name="" id="SecondAmt" oninput="icare()"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->SecondAmt;?>" >
                      
                                        </div> 
                                    </div>





                                    <div class="row">
                                     
                                        <div class="col-md-2 col-xl-3 col-lg-3 form-group">
                                           
                                           <label for="name">Payment Mode</label>
                                           <select style="width:100%;" class="select2 form-control" id="PayMode3" name="PayMode3">
                       
                                            <option value="0">-Select-</option>
                                            <?php foreach($Paymentdata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->PayMode3)){

                                                    if($value->PayId == $data[0]->PayMode3) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->PayId.'" '.$selected.'>'.$value->PayNm.'</option>';
                                            }
                                            ?>
                                          
                                             </select>
                                         </div> 


                                         <div class="col-md-2 col-xl-2 col-lg-2 form-group">
                                           <label for="cr">3rd Amount</label>
                                           
                                           <input type="number" class="form-control" oninput="icare()"  name="" id="ThirdAmt"   placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->ThirdAmt;?>" >
                      
                                        </div> 


                                        <div class="col-md-2"></div>


                                        <div class="col-md-2 col-xl-3 col-lg-3 form-group">
                                           
                                           <label for="name">Payment Mode</label>
                                           <select style="width:100%;" class="select2 form-control" id="PayMode4" name="">
                       
                                            <option value="0">-Select-</option>
                                            <?php foreach($Paymentdata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->PayMode4)){

                                                    if($value->PayId == $data[0]->PayMode4) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->PayId.'" '.$selected.'>'.$value->PayNm.'</option>';
                                            }
                                            ?>
                                            

                                             </select>
   
                                             
                                         </div> 
                                         <div class="col-md-2 col-xl-2 col-lg-2 form-group">
                                           <label for="cr">4th Amount</label>
                                           
                                           <input type="number" class="form-control" name="" id="FourthAmt"
                                            oninput="icare()" placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->FourthAmt;?>" >
                      
                                        </div> 
                                        
                                      
                                     
                                    </div>
                                    <!-- </div> -->
                                    </fieldset>


                                    <div class="row mt-3">
                                      <div class="col-12 col-md-6 col-lg-6  form-group">
                                        <label for="">Note</label>
                                        <textarea class="form-control" type="text" name="" id="Note" cols="48" rows="5"><?php if(!empty($data)) echo $data[0]->Note;?></textarea>
                                       </div>  


                                       <!-- <div class="col-2"></div> -->
                                       <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-end align-items-baseline text-right pdd ">
                                     
                                            <button class="btn btn-primary" type="button" name="" id="btn_savee" style="border-radius:5px;font-size: 14px;"><i class="fa-regular fa-circle-check"></i> Submit</button>&nbsp;&nbsp;
                                            <a  class="btn btn-warning text-white" href="<?=base_url()?>Shop/index" style="border-radius:5px;font-size: 14px;"><i class="fa-solid fa-xmark"></i> Cancle</a>
                                        </div> 
                                        
                                    </div>
                                   
                                    
                            
                                    <!-- <div class="row ">
                                       
                                    </div> -->
                                   
                                </form>
                            </div>
                        </div>
                    </div>
</div>
</div>




  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="display: flex; justify-content: space-between;border-bottom: 2px solid #47484b!important;">
          <h4 class="modal-title" style="font-family: 'Work Sans', sans-serif;">Patients</h4>
          <button type="button" class="close Modal_close-icon" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form class="needs-validation" id="icareForm"  >

                 
                 
 
                    <div class="form-row">
                      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 ">
                        <label for="name">Patient Name<span class="required" style="color: red">*</span></label>
                        <div class="input-group">
                          <input type="text" class="form-control form-control-sm" name="" id="PatientNm" placeholder="Enter Name" value="">   
                        </div>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 ">
                        <label for="name">Address<span class="required" style="color: red">*</span></label>
                        <textarea class="form-control" type="text" name="" id="Address" cols="48" rows="2"></textarea>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6">
                        <label for="name">Mobile No.<span class="required" style="color: red">*</span></label>
                        <div class="input-group">
                          <input type="text" class="form-control" name="" id="MobileNo" placeholder="Enter Name" value="" maxlength="10">   
                        </div>
                      </div>
                      <div class="col-xl-4 col-lg-3 col-md-3 col-sm-3">
                        <label for="name">Date.<span class="required" style="color: red">*</span></label>
                        <div class="input-group">
                        <input type="date" class="form-control" name="" id="Date1" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->Date;?>" required>   
                        </div>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 ">
                        <label for="name">Gender<span class="required" style="color: red">*</span></label><br>

                        <label for="">male</label>&nbsp;
                        <input id="male" name="" value="1"  type="radio">&nbsp;&nbsp;&nbsp;

                        <label for="">female</label>&nbsp;
                        <input id="female" name="" value="2"   type="radio">
                       
                      </div>
                    </div>
                    

                    
               
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button class="btn btn-primary " type="button" name="" id="patientsaveBtn">Save</button>
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
          
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
  

<!-- -------------------Current date in javascript--------------------- -->
<script>
    document.getElementById('Date').valueAsDate = new Date();   
    document.getElementById('Date1').valueAsDate = new Date();  
</script>







<script>  
/**************************** for Enter Key ************************/  
$(".enterkey").keyup(function (event) {
    if (event.keyCode == 13) {
        textboxes = $("input.enterkey");
        currentBoxNumber = textboxes.index(this);
        console.log(textboxes.index(this));
        if (textboxes[currentBoxNumber + 1] != null) {
            nextBox = textboxes[currentBoxNumber + 1];
            nextBox.focus();
            nextBox.select();
            event.preventDefault();
            return false;
        }
    }
});




var a=false;

$(document).ready(function(){
  var id= document.getElementById('CasePaperID').value;
  if(id>0){
    $("#btnhide").hide();
    } 
 
$("#jjj").click(function(){
    // alert("hi");

  if(a==false){
    
    saveperform();
   }
  }); 
 
});

 function saveperform() 
{ 
     
     var FkPatientId = $('#FkPatientId').val();
     var Date = $("#Date").val();

    //  var column1 = $("#column1").val();
    //  var column2 = $('#column2').val();
    //  var column3 = $('#column3').val();
    //  var column4 = $('#column4').val();
    //  var column5 = $('#column5').val();
    //  var column6 = $('#column6').val();
    //  var column7 = $('#column7').val();
    //  var column8 = $('#column8').val();
    //  var column9 = $('#column9').val();
    //  var column10 = $("#column10").val();
    //  var column11 = $("#column11").val();
    //  var column12 = $('#column12').val();
    //  var Remark = $('#Remark').val();
    //  var Use = $('#Use').val();
    //  var Type = $('#Type').val();
    //  var Unit = $('#Unit').val();
    //  var GlassType = $('#GlassType').val();
    //  var Note = $('#Note').val();
    //  var PayMode1 = $('#PayMode1').val();
    //  var BillAmount = $('#BillAmount').val();
    //  var PaidAmount = $('#PaidAmount').val();
    //  var RemainAmount = $('#RemainAmount').val();

    var CasePaperID = $('#CasePaperID').val();
 
     if(FkPatientId ==0 || Date=="")  {
        Swal.fire(
            'Oops!',
            'Please Enter Required Fields!',
            'error'
        );
     }
    else
    {
        if(CasePaperID >0)
        {
        // alert(CasePaperID );
            a=true;

            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
        
            $.ajax({
        url:base_path+"Shop/updateOpticaldata",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        // data: $('#Form').serialize(),
         beforeSend: function(){
               $('#jjj').prop('disabled', true);
               $('#jjj').html('Loading');
          }, 
        success: function(data) {
          console.log(data);
           $('#jjj').prop('disabled', false);
           $('#jjj').html('Save');

          //  Swal.fire(
          //   'Good job!',
          //   'Data Updated Successfully!',
          //   'success'
          // );
          Swal.fire({
            text: "Data Updated Successfully!",
            icon: 'success',
            showConfirmButton : false,
            timer: 3000,
            timerProgressBar: true
          });
         
          // set time function and direct page going on detail view
          setTimeout(function(){
            window.location.href = base_path+"Shop";

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
        url:base_path+"Shop/insertOpticaldata",
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

            //  Swal.fire(
            //   'Good job!',
            //   'Data Submitted Successfully!',
            //   'success'
            // );
            Swal.fire({
            text: "Data Submitted Successfully!",
            icon: 'success',
            showConfirmButton : false,
            timer: 3000,
            timerProgressBar: true
          });

            // set time function and direct page going on detail view
            setTimeout(function(){
              window.location.href = base_path+"Shop";
  
            }, 500);
           
           a=false;
           
           }
        });
        }
      }
 }




</script> 

<!-- --------------- Javascript code for dropdown,Table show fatching data ------------->
<script>
  $(document).ready(function(){
    
    Shop();
    $("#FkPatientId").change(function(){
    
      Shop();
    });


  });

  $('#FkPatientId').on('change', function(){
 
    
});


  function Shop(){
      var FkPatientId = $("#FkPatientId").val();

      
      //  alert(FkStockId);
      $.ajax({

      url : "<?php echo base_url()?>Shop/load_mahasiswa",
      method:'post',
      data:{'FkPatientId':FkPatientId},
      // dataType:'json', 
      success:function(data){
        
       
      $("#tabledata").empty();
      $("#tabledata").html(data);
      console.log(data);

     
    },
    complete:function(){
      finalCalculation();

    }
    
  });
  
}

  
// }
</script>

<script>

  function icare(){

    var BillAmount=document.getElementById("BillAmount").value;
    var PaidAmount=document.getElementById("PaidAmount").value;
    var RemainAmount=document.getElementById("RemainAmount").value;
    var SecondAmt=document.getElementById("SecondAmt").value;
    var ThirdAmt=document.getElementById("ThirdAmt").value;
    var FourthAmt=document.getElementById("FourthAmt").value;
    

    /***********Only For NaN input Show */
    if(PaidAmount==''){
      PaidAmount=0;

    }
    if(SecondAmt==''){
      SecondAmt=0;
      
    }
    if(ThirdAmt==''){
      ThirdAmt=0;
      
    }
   if (FourthAmt==''){
      FourthAmt=0;
      
    }

     var FirstRemain= parseFloat(BillAmount)- parseFloat(PaidAmount)-parseFloat(SecondAmt)-parseFloat(ThirdAmt)-parseFloat(FourthAmt);

     
     var FirstRemain=document.getElementById("RemainAmount").value=FirstRemain; 
    // remaining amt color show
    if(FirstRemain == 0 || FirstRemain < 0){
      $('#RemainAmount').css('background','green');
    }else{
      $('#RemainAmount').css('background','red');
      $('#RemainAmount').css('color','white');
    }

    var TotalAmt=parseFloat(PaidAmount)+parseFloat(SecondAmt)+parseFloat(ThirdAmt)+parseFloat(FourthAmt);

    document.getElementById("TotalAmount").value=TotalAmt;
  }

 
  
</script>

<!-- ********************Sum of charges for table input and color ************* -->
<script>
  function finalCalculation() {

    var charges = document.getElementsByClassName("chargess");

    var Totalcharges = 0;
    for (var p = 0; p < charges.length; p++) {

        Totalcharges = parseInt(charges[p].value) + parseInt(Totalcharges);

    }
    console.log("total charges", Totalcharges);
    document.getElementById("BillTot").value = Totalcharges.toFixed(2);
    $('#textt').text(Totalcharges.toFixed(2));
    // document.getElementById("totalcharge").value = Totalcharges.toFixed(2);


    var charges2 = document.getElementsByClassName("chargess2");

    var Totalcharges = 0;
    for (var p = 0; p < charges2.length; p++) {

    Totalcharges = parseInt(charges2[p].value) + parseInt(Totalcharges);

    }
    console.log("total charges", Totalcharges);
    document.getElementById("PaidTot").value = Totalcharges.toFixed(2);
    $('#textt2').text(Totalcharges.toFixed(2));
   // document.getElementById("totalcharge").value = Totalcharges.toFixed(2);

    var charges3 = document.getElementsByClassName("chargess3");

    var Totalcharges = 0;
    for (var p = 0; p < charges3.length; p++) {

    Totalcharges = parseInt(charges3[p].value) + parseInt(Totalcharges);
    

    }
    console.log("total charges", Totalcharges);
    var RemainColor=document.getElementById("RemainTot").value = Totalcharges.toFixed(2);
    console.log(RemainColor);
    $('#textt3').text(Totalcharges.toFixed(2));
   
    if(RemainColor == 0.00 || RemainColor < 0.00){
      // $('#RemainColor').css('background','green');
      $('#textt3').css('color','blue');
    }else{
      // $('#RemainColor').css('background','red');
      $('#textt3').css('color','red');
    }
 

}
</script>

<script>
  //  $(document).ready(function(){

    $("#buttonrefresh").click(function(){

    // alert('hii');
    fetchdropdownmark();
    fetchdropdowntype();
    fetchdropdownunit();
    fetchdropdownGlasstype();
    fetchdropdownUse();
    
    });


    function fetchdropdownmark(){
          
          $.ajax({
      
          url:base_path+"Shop/dropdwonrefresh",
          method:'post',
          dataType :'json',
          success:function(res){
            
          console.log(res);
         
          $('#Remark').empty();
          $('#Remark').append('<option value="" >-Select-</option>');
          for(var i=0;i<res.length;i++){
           $('#Remark').append('<option value="'+res[i]['RemarkId']+'">'+res[i]['RemarkId']+'    '+res[i]['RemarkName']+'</option>');
           }
          }
         });
      }


      function fetchdropdowntype(){
          
          $.ajax({
      
          url:base_path+"Shop/dropdowntype",
          method:'post',
          dataType :'json',
          success:function(res){
            
          console.log(res);
         
          $('#Type').empty();
          $('#Type').append('<option value="" >-Select-</option>');
          for(var i=0;i<res.length;i++){
           $('#Type').append('<option value="'+res[i]['TypeId']+'">'+res[i]['TypeId']+'    '+res[i]['TypeName']+'</option>');
           }
          }
         });
      }


      function fetchdropdownunit(){
          
          $.ajax({
      
          url:base_path+"Shop/dropdownUnit",
          method:'post',
          dataType :'json',
          success:function(res){
            
          console.log(res);
         
          $('#Unit').empty();
          $('#Unit').append('<option value="" >-Select-</option>');
          for(var i=0;i<res.length;i++){
           $('#Unit').append('<option value="'+res[i]['UnitId']+'">'+res[i]['UnitId']+'    '+res[i]['UnitName']+'</option>');
           }
          }
         });
      }


      function fetchdropdownGlasstype(){
          
          $.ajax({
      
          url:base_path+"Shop/dropdownGlasstype",
          method:'post',
          dataType :'json',
          success:function(res){
            
          console.log(res);
         
          $('#GlassType').empty();
          $('#GlassType').append('<option value="" >-Select-</option>');
          for(var i=0;i<res.length;i++){
           $('#GlassType').append('<option value="'+res[i]['GlassTypeId']+'">'+res[i]['GlassTypeId']+'    '+res[i]['GlassTypeNm']+'</option>');
           }
          }
         });
      }


      function fetchdropdownUse(){
          
          $.ajax({
      
          url:base_path+"Shop/dropdownUse",
          method:'post',
          dataType :'json',
          success:function(res){
            
          console.log(res);
         
          $('#Use').empty();
          $('#Use').append('<option value="" >-Select-</option>');
          for(var i=0;i<res.length;i++){
           $('#Use').append('<option value="'+res[i]['UseId']+'">'+res[i]['UseId']+'    '+res[i]['UseName']+'</option>');
           }
          }
         });
      }

  //  });
</script>














   















 



               
            