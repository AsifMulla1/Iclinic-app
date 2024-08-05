<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remark extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('Remark_model');
		
    }
	public function index()
	{
		
        $data['alldata']=$this->Remark_model->getalldetails();
        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
        $this->load->view('Remark/RemarkDetail_view',$data);
		$this->load->view('common/footer_view');
	

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
		$this->load->view("Remark/Remark_view");
		$this->load->view("common/footer_view");
	

	}
	public function insertRemark()
	{
		// $StockID= $this->input->post('StockID');
		$RemarkName= $this->input->post('RemarkName');
		

		 $fields=array(
						
			// 'StockID'=>$StockID,
			'RemarkName'=>$RemarkName
			
						
			//    'created_date'=>date('Y-m-d H:i:s'),
			// 	   'created_by'=>1
		   );
		   $this->Remark_model->insertdata($fields);
	}
    public function update()
  {
	  $id=$this->uri->segment(3);
	  $data['data']=$this->Remark_model->getbyid($id);
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
      $this->load->view('Remark/Remark_view',$data);
	  $this->load->view('common/footer_view');
  }


public function updateRemarkdata()
  {
	$RemarkId= $this->input->post('RemarkId');
	$RemarkName= $this->input->post('RemarkName');
	
	 
	  $fields=array(
		'RemarkId'=>$RemarkId,
		'RemarkName'=>$RemarkName
					
					

				  );
	  $this->Remark_model->update($fields);
  }
}
?>