<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('Patient_model');
		
    }
	public function index()
	{
		
        $data['alldata']=$this->Patient_model->getalldetails();
        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
        $this->load->view('Patient/PatientDetail_view',$data);
		// $this->load->view('common/footer_view');
		$this->load->view("Dashboard/footer_view");
	

	}
	public function create()
	{
		// $data['Remarkdata']=$this->Shop_model->getRemarks();
		// $data['Usedata']=$this->Shop_model->getUse();
		// $data['Typedata']=$this->Shop_model->getType();
		// $data['Unitdata']=$this->Shop_model->getUnit();
		// $data['Glassdata']=$this->Shop_model->getGlassType();
		// $data['PatientNmdata']=$this->Shop_model->getPatientNm();
		// $data['Paymentdata']=$this->Shop_model->getPaymentMode();


        
        // echo "<pre>";
        // print_r($data);

		$this->load->view("common/header_view");
		$this->load->view("Patient/Patient_view");
		// $this->load->view("common/footer_view");
		$this->load->view("Dashboard/footer_view");
	

	}
	public function insertPatientMaster()
	{
		$PatientNm= $this->input->post('PatientNm');
		$Address= $this->input->post('Address');
		$MobileNo= $this->input->post('MobileNo');
		$Date= $this->input->post('Date');
		$Gender= $this->input->post('Gender');
		

		 $fields=array(
						
			// 'StockID'=>$StockID,
			'PatientNm'=>$PatientNm,
			'Address'=>$Address,
			'MobileNo'=>$MobileNo,
			'Date'=>$Date,
			'Gender'=>$Gender
			
						
			//    'created_date'=>date('Y-m-d H:i:s'),
			// 	   'created_by'=>1
		   );
		   $this->Patient_model->insertdata($fields);
	}
    public function update()
  {
	  $id=$this->uri->segment(3);
	  $data['data']=$this->Patient_model->getbyid($id);
	//   $data['Remarkdata']=$this->Shop_model->getRemarks();
	//   $data['Usedata']=$this->Shop_model->getUse();
	//   $data['Typedata']=$this->Shop_model->getType();
	//   $data['Unitdata']=$this->Shop_model->getUnit();
	//   $data['Glassdata']=$this->Shop_model->getGlassType();
	//   $data['PatientNmdata']=$this->Shop_model->getPatientNm();
	//   $data['Paymentdata']=$this->Shop_model->getPaymentMode();
	  
    //    echo "<pre>";
    //   print_r($data);

	 
	  $this->load->view('common/header_view');
      $this->load->view('Patient/Patient_view',$data);
	//   $this->load->view('common/footer_view');
	$this->load->view("Dashboard/footer_view");
  }


public function updatePatientdata()
  {
	$PatientId= $this->input->post('PatientId');
	$PatientNm= $this->input->post('PatientNm');
	$Address= $this->input->post('Address');
	$MobileNo= $this->input->post('MobileNo');
	$Date= $this->input->post('Date');
	$Gender= $this->input->post('Gender');
	
	 
	  $fields=array(
		'PatientId'=>$PatientId,
		'PatientNm'=>$PatientNm,
		'Address'=>$Address,
		'MobileNo'=>$MobileNo,
		'Date'=>$Date,
		'Gender'=>$Gender
					
					

				  );
	  $this->Patient_model->update($fields);
  }
}
?>