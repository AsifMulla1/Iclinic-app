<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('Report_model');
		
    } 

    public function index(){

        $data['membernamereport']=$this->Report_model->memberfetch();

        // echo "<pre>";
        // print_r($data);

        $this->load->view('common/header_view');
        $this->load->view('Shop/Report_view',$data);
        $this->load->view('common/footer_view');

    }


    public function GetData(){
        $FkPatientId = $this->input->post('FkPatientId');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $Status = $this->input->post('fkstatus');

        $data=$this->Report_model->Reportdetails($FkPatientId,$startDate,$endDate,$Status);
        // echo '<pre>';
        // print_r($data);
        echo json_encode($data);
    }


}
