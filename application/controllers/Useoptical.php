<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useoptical extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('Useoptical_model');
		
    }
	public function index()
	{
		
        $data['alldata']=$this->Useoptical_model->getalldetails();
        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
        $this->load->view('Useoptical/UseopticalDetail_view',$data);
		$this->load->view('common/footer_view');
	

	}
	public function create()
	{
		

		$this->load->view("common/header_view");
		$this->load->view("Useoptical/Useoptical_view");
		$this->load->view("common/footer_view");
	

	}
	public function insertUse()
	{
		// $StockID= $this->input->post('StockID');
		$UseName= $this->input->post('UseName');
		

		 $fields=array(
						
			// 'StockID'=>$StockID,
			'UseName'=>$UseName
			
						
			//    'created_date'=>date('Y-m-d H:i:s'),
			// 	   'created_by'=>1
		   );
		   $this->Useoptical_model->insertdata($fields);
	}
    public function update()
  {
	  $id=$this->uri->segment(3);
	  $data['data']=$this->Useoptical_model->getbyid($id);
	

	 
	  $this->load->view('common/header_view');
      $this->load->view('Useoptical/Useoptical_view',$data);
	  $this->load->view('common/footer_view');
  }


public function updateUsedata()
  {
	$UseId= $this->input->post('UseId');
	$UseName= $this->input->post('UseName');
	
	 
	  $fields=array(
		'UseId'=>$UseId,
		'UseName'=>$UseName
					
					

				  );
	  $this->Useoptical_model->update($fields);
  }
}
?>