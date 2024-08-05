<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Glasstype extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('Glasstype_model');
		
    }
	public function index()
	{
		
        $data['alldata']=$this->Glasstype_model->getalldetails();
        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
        $this->load->view('Glasstype/GlasstypeDetail_view',$data);
		$this->load->view('common/footer_view');
	

	}
	public function create()
	{
		

		$this->load->view("common/header_view");
		$this->load->view("Glasstype/Glasstype_view");
		$this->load->view("common/footer_view");
	

	}
	public function insertGlasstype()
	{
		
		$GlassTypeNm= $this->input->post('GlassTypeNm');
		

		 $fields=array(
            
			'GlassTypeNm'=>$GlassTypeNm
			
						
			//    'created_date'=>date('Y-m-d H:i:s'),
			// 	   'created_by'=>1
		   );
		   $this->Glasstype_model->insertdata($fields);
	}
    public function update()
  {
	  $id=$this->uri->segment(3);
	  $data['data']=$this->Glasstype_model->getbyid($id);
	

	 
	  $this->load->view('common/header_view');
      $this->load->view('Glasstype/Glasstype_view',$data);
	  $this->load->view('common/footer_view');
  }


public function updateGlasstypedata()
  {
	$GlassTypeId= $this->input->post('GlassTypeId');
	$GlassTypeNm= $this->input->post('GlassTypeNm');
	
	 
	  $fields=array(
		'GlassTypeId'=>$GlassTypeId,
		'GlassTypeNm'=>$GlassTypeNm
					
					

				  );
	  $this->Glasstype_model->update($fields);
  }
}
?>