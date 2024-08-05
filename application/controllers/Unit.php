<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('Unit_model');
		
    }
	public function index()
	{
		
        $data['alldata']=$this->Unit_model->getalldetails();
        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
        $this->load->view('Unit/UnitDetail_view',$data);
		$this->load->view('common/footer_view');
	

	}
	public function create()
	{
		

		$this->load->view("common/header_view");
		$this->load->view("Unit/Unit_view");
		$this->load->view("common/footer_view");
	

	}
	public function insertUnit()
	{
		// $StockID= $this->input->post('StockID');
		$UnitName= $this->input->post('UnitName');
		

		 $fields=array(
						
			// 'StockID'=>$StockID,
			'UnitName'=>$UnitName
			
						
			//    'created_date'=>date('Y-m-d H:i:s'),
			// 	   'created_by'=>1
		   );
		   $this->Unit_model->insertdata($fields);
	}
    public function update()
  {
	  $id=$this->uri->segment(3);
	  $data['data']=$this->Unit_model->getbyid($id);
	

	 
	  $this->load->view('common/header_view');
      $this->load->view('Unit/Unit_view',$data);
	  $this->load->view('common/footer_view');
  }


public function updateUnitdata()
  {
	$UnitId= $this->input->post('UnitId');
	$UnitName= $this->input->post('UnitName');
	
	 
	  $fields=array(
		'UnitId'=>$UnitId,
		'UnitName'=>$UnitName
					
					

				  );
	  $this->Unit_model->update($fields);
  }
}
?>