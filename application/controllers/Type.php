<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('Type_model');
		
    }
	public function index()
	{
		
        $data['alldata']=$this->Type_model->getalldetails();
        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
        $this->load->view('Type/TypeDetail_view',$data);
		$this->load->view('common/footer_view');
	

	}
	public function create()
	{
		

		$this->load->view("common/header_view");
		$this->load->view("Type/Type_view");
		$this->load->view("common/footer_view");
	

	}
	public function insertType()
	{
		// $StockID= $this->input->post('StockID');
		$TypeName= $this->input->post('TypeName');
		

		 $fields=array(
						
			// 'StockID'=>$StockID,
			'TypeName'=>$TypeName
			
						
			//    'created_date'=>date('Y-m-d H:i:s'),
			// 	   'created_by'=>1
		   );
		   $this->Type_model->insertdata($fields);
	}
    public function update()
  {
	  $id=$this->uri->segment(3);
	  $data['data']=$this->Type_model->getbyid($id);
	

	 
	  $this->load->view('common/header_view');
      $this->load->view('Type/Type_view',$data);
	  $this->load->view('common/footer_view');
  }


public function updateTypedata()
  {
	$TypeId= $this->input->post('TypeId');
	$TypeName= $this->input->post('TypeName');
	
	 
	  $fields=array(
		'TypeId'=>$TypeId,
		'TypeName'=>$TypeName
					
					

				  );
	  $this->Type_model->update($fields);
  }
}
?>