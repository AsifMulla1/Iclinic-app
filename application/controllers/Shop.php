<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('Shop_model');
		
    }
	public function index()
	{
		
        $data['alldata']=$this->Shop_model->getalldetails();
        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
        $this->load->view('Shop/ShopDetail_view',$data);
		// $this->load->view('common/footer_view');
		$this->load->view('Dashboard/footer_view');
	

	}
	public function create()
	{
		$data['Remarkdata']=$this->Shop_model->getRemarks();
		$data['Usedata']=$this->Shop_model->getUse();
		$data['Typedata']=$this->Shop_model->getType();
		$data['Unitdata']=$this->Shop_model->getUnit();
		$data['Glassdata']=$this->Shop_model->getGlassType();
		$data['PatientNmdata']=$this->Shop_model->getPatientNm();
		$data['Paymentdata']=$this->Shop_model->getPaymentMode();


        
        // echo "<pre>";
        // print_r($data);

		$this->load->view("common/header_view");
		$this->load->view("Shop/Shop_view",$data);
		// $this->load->view("common/footer_view");
		$this->load->view('Dashboard/footer_view');
	

	}
	public function insertmodelpatient()
	{
		// $StockID= $this->input->post('StockID');
		$PatientNm= $this->input->post('PatientNm');
		$Address= $this->input->post('Address');
		$MobileNo= $this->input->post('MobileNo');
		$Date= $this->input->post('Date');
		$Gender= $this->input->post('Gender');
		

		 $fields=array(
						
			'PatientNm'=>$PatientNm,
			'Address'=>$Address,
			'MobileNo'=>$MobileNo,
			'Date'=>$Date,
			'Gender'=>$Gender
			
						
			//    'created_date'=>date('Y-m-d H:i:s'),
			// 	   'created_by'=>1
		   );
		   $this->Shop_model->insertStockdata($fields);
	}



	/***********   Use Ajax For without referashing dropdown save and fatch  ************/
	public function dropdownshare() 
	{
	  $data=$this->Shop_model->dropdownpatient();
	  echo json_encode($data);
	}

	public function dropdownUse2() 
	{
	  $data=$this->Shop_model->dropdownUse();
	  echo json_encode($data);
	}

	public function insertOpticaldata(){
      
		$FkPatientId= $this->input->post('FkPatientId');
		$Date= $this->input->post('Date');
		$column1= $this->input->post('column1');
		$column2= $this->input->post('column2'); 
		$column3= $this->input->post('column3'); 
		$column4= $this->input->post('column4'); 
		$column5= $this->input->post('column5'); 
		$column6= $this->input->post('column6'); 
		$column7= $this->input->post('column7'); 
		$column8= $this->input->post('column8'); 
		$column9= $this->input->post('column9');
		$column10= $this->input->post('column10');
		$column11= $this->input->post('column11');
		$column12= $this->input->post('column12'); 
		$Remark= $this->input->post('Remark'); 
		$Use= $this->input->post('Use'); 
		$Type= $this->input->post('Type'); 
		$Unit= $this->input->post('Unit'); 
		$GlassType= $this->input->post('GlassType'); 
		$Note= $this->input->post('Note'); 
		$PayMode1= $this->input->post('PayMode1');
		$BillAmount= $this->input->post('BillAmount'); 
		$PaidAmount= $this->input->post('PaidAmount'); 
		$RemainAmount= $this->input->post('RemainAmount'); 
		$TotalAmount= $this->input->post('TotalAmount');
		$PayMode2= $this->input->post('PayMode2'); 
		$SecondAmt= $this->input->post('SecondAmt'); 
		$PayMode3= $this->input->post('PayMode3'); 
		$ThirdAmt= $this->input->post('ThirdAmt'); 
		$PayMode4= $this->input->post('PayMode4');
		$FourthAmt= $this->input->post('FourthAmt');

		 $fields=array(
						
			'FkPatientId'=>$FkPatientId,
			'Date'=>$Date,
			'column1'=>$column1,
			'column2'=>$column2,
			'column3'=>$column3,
			'column4'=>$column4,
			'column5'=>$column5,
			'column6'=>$column6,
			'column7'=>$column7,
			'column8'=>$column8,
			'column9'=>$column9,
			'column10'=>$column10,
			'column11'=>$column11,
			'column12'=>$column12,
			'Remark'=>$Remark,
			'Use'=>$Use,
			'Type'=>$Type,
			'Unit'=>$Unit,
			'GlassType'=>$GlassType,
			'Note'=>$Note,
			'PayMode1'=>$PayMode1,
			'BillAmount'=>$BillAmount,
			'PaidAmount'=>$PaidAmount,
			'RemainAmount'=>$RemainAmount,
			'TotalAmount'=>$TotalAmount,
			'PayMode2'=>$PayMode2,
			'SecondAmt'=>$SecondAmt,
			'PayMode3'=>$PayMode3,
			'ThirdAmt'=>$ThirdAmt,
			'PayMode4'=>$PayMode4,
			'FourthAmt'=>$FourthAmt
			//    'created_date'=>date('Y-m-d H:i:s'),
			// 	   'created_by'=>1
		   );
		   $this->Shop_model->insertdata($fields);
  } 

  public function update()
  {
	  $id=$this->uri->segment(3);
	  $data['data']=$this->Shop_model->getbyid($id);
	  $data['Remarkdata']=$this->Shop_model->getRemarks();
	  $data['Usedata']=$this->Shop_model->getUse();
	  $data['Typedata']=$this->Shop_model->getType();
	  $data['Unitdata']=$this->Shop_model->getUnit();
	  $data['Glassdata']=$this->Shop_model->getGlassType();
	  $data['PatientNmdata']=$this->Shop_model->getPatientNm();
	  $data['Paymentdata']=$this->Shop_model->getPaymentMode();
	  
    //    echo "<pre>";
    //   print_r($data);

	 
	  $this->load->view('common/header_view');
	  $this->load->view('Shop/Shop_view',$data);
	//   $this->load->view('common/footer_view');
	$this->load->view('Dashboard/footer_view');
  }


  public function updateOpticaldata()
  {
	$CasePaperID= $this->input->post('CasePaperID');
	// $FkPatientId= $this->input->post('FkPatientId');
	// $Date= $this->input->post('Date');
	$column1= $this->input->post('column1');
	$column2= $this->input->post('column2'); 
	$column3= $this->input->post('column3'); 
	$column4= $this->input->post('column4'); 
	$column5= $this->input->post('column5'); 
	$column6= $this->input->post('column6'); 
	$column7= $this->input->post('column7'); 
	$column8= $this->input->post('column8'); 
	$column9= $this->input->post('column9');
	$column10= $this->input->post('column10');
	$column11= $this->input->post('column11');
	$column12= $this->input->post('column12'); 
	$Remark= $this->input->post('Remark'); 
	$Use= $this->input->post('Use'); 
	$Type= $this->input->post('Type'); 
	$Unit= $this->input->post('Unit'); 
	$GlassType= $this->input->post('GlassType'); 
	$Note= $this->input->post('Note'); 
	$PayMode1= $this->input->post('PayMode1');
	$BillAmount= $this->input->post('BillAmount'); 
	$PaidAmount= $this->input->post('PaidAmount'); 
	$RemainAmount= $this->input->post('RemainAmount'); 
	$TotalAmount= $this->input->post('TotalAmount');
	$PayMode2= $this->input->post('PayMode2'); 
	$SecondAmt= $this->input->post('SecondAmt'); 
	$PayMode3= $this->input->post('PayMode3'); 
	$ThirdAmt= $this->input->post('ThirdAmt'); 
	$PayMode4= $this->input->post('PayMode4');
	$FourthAmt= $this->input->post('FourthAmt');
	

	  
	 
	  
	 
	  $fields=array(
		'CasePaperID'=>$CasePaperID,
		// 'FkPatientId'=>$FkPatientId,
        // 'Date'=>$Date,
		'column1'=>$column1,
		'column2'=>$column2,
		'column3'=>$column3,
		'column4'=>$column4,
		'column5'=>$column5,
		'column6'=>$column6,
		'column7'=>$column7,
		'column8'=>$column8,
		'column9'=>$column9,
		'column10'=>$column10,
		'column11'=>$column11,
		'column12'=>$column12,
		'Remark'=>$Remark,
		'Use'=>$Use,
		'Type'=>$Type,
		'Unit'=>$Unit,
		'GlassType'=>$GlassType,
		'Note'=>$Note,
		'PayMode1'=>$PayMode1,
		'BillAmount'=>$BillAmount,
		'PaidAmount'=>$PaidAmount,
		'RemainAmount'=>$RemainAmount,
		'TotalAmount'=>$TotalAmount,
		'PayMode2'=>$PayMode2,
		'SecondAmt'=>$SecondAmt,
		'PayMode3'=>$PayMode3,
		'ThirdAmt'=>$ThirdAmt,
		'PayMode4'=>$PayMode4,
		'FourthAmt'=>$FourthAmt
					
					

				  );
				  print_r($fields);
	  $this->Shop_model->update($fields);
  }


  public function load_mahasiswa()
  {
	
	$FkPatientId= $this->input->post('FkPatientId');
    $data=	$this->Shop_model->getOpticaldata($FkPatientId);
	
	    $i=1;
            foreach($data as $rw=>$value){

				// For Paid Unpaid show in table without database
				$Purchase= $value->RemainAmount;
				if ($Purchase == 0 || $Purchase < 0) {
				 $pur = '<div class="shadow" style="border-radius: 50%;
				 height: 25px; width: 25px; background: green;color:white!important;text-align:center;line-height:25px;"><i class="text-white fa-solid fa-check"></i></div>';
				 $row_color = 'style="background-color: green;color:white!important;"';
				}
			   
				else{
				 $pur = '<div class="shadow" style="border-radius: 50%;
				 height: 25px; width: 25px; background: red;color:white!important;text-align:center;line-height:25px"><i class="text-white fa-solid fa-xmark"></i></div>';
				 $row_color = 'style="background-color: red;color:white!important;"';
				} 
				
					                                    
				echo "<tr $row_color>";
            

			echo "<td style='width:5%;padding: 5px 6px!important;'>".$i."</td>";
			echo "<td style='width: 25%;padding: 5px 6px!important;'>".$value->Date."</td>";
			
			echo "<td style='padding: 5px 6px!important;width:10%;'><input type='hidden' class='chargess'  value='".$value->BillAmount."'>".$value->BillAmount."</td>";
			echo "<td style='padding: 5px 6px!important;width:10%;'><input type='hidden' class='chargess2' value='".$value->PaidAmount."'>".$value->PaidAmount."</td>";
			echo "<td style='padding: 5px 6px!important;width:10%;'><input type='hidden' class='chargess3' value='".$value->RemainAmount."'>".$value->RemainAmount."</td>";
		
			// echo "<td>".$pur."</td>";
                                            
			$i++;                                                                      
                                           
       
                                        
         echo "</tr>";                        
        }

        if($data){
		echo "<tr class='tableShow'>";
              
		echo "<td style='padding: 5px 6px!important;width:10%;'></td>";
		echo "<td style='padding: 5px 6px!important;width:10%;'></td>";
		echo '<td style="padding: 5px 6px!important;width:10%;"><span style="color:blue;font-weight:bold;font-size:18px;
		margin-right:3px;">₹</span><span id="textt" style="color:blue;font-weight:bold;font-size:20;"></span><input type="hidden" class="BillTot border-0" id="BillTot" name="BillTot" autofocus="autofocus" value=""  required></td>';

        echo '<td style="padding: 5px 6px!important;width:10%;"><span style="color:blue;font-weight:bold;font-size:18px;
		margin-right:3px;">₹</span><span id="textt2" style="color:blue;font-weight:bold;font-size:20;"></span><input type="hidden" class="BillTot border-0"  name="PaidTot" id="PaidTot" autofocus="autofocus" value=""  required></td>';
		
		echo '<td id="RemainColor" style="padding: 5px 6px!important;width:10%;"><span style="color:blue;font-weight:bold;font-size:18px;
		margin-right:3px;">₹</span><span id="textt3" style="color:blue;font-weight:bold;font-size:20;"></span><input type="hidden" class="BillTot border-0"   name="RemainTot" id="RemainTot"  autofocus="autofocus" value=""  required></td>';


		echo "</tr>";

		}
		else{
			echo "<tr>";
			echo "<td colspan='5'>No record found</td>";
			echo "</tr>";
		}
    
                             
  }
  


  //   for dropdown refresh 
	public function dropdwonrefresh() 
	{
	  $data=$this->Shop_model->dropdownfetchRemark();
	  echo json_encode($data);
	}

	public function dropdowntype() 
	{
	  $data=$this->Shop_model->dropdownfetchtype();
	  echo json_encode($data);
	}

	public function dropdownUnit() 
	{
	  $data=$this->Shop_model->dropdownfetchUnit();
	  echo json_encode($data);
	}

	public function dropdownGlasstype() 
	{
	  $data=$this->Shop_model->dropdownfetchGlasstype();
	  echo json_encode($data);
	}


	public function dropdownUse() 
	{
	  $data=$this->Shop_model->dropdownfetchUse();
	  echo json_encode($data);
	}

}
?>