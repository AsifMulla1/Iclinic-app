<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('');
		
    }

	public function index()
	{
       $this->load->view('common/header_view');
       $this->load->view('Dashboard/Dashboard_view');
       $this->load->view('Dashboard/footer_view');
	}

    


   
}