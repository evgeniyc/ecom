<?php
class Admin extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			
	}

	public function index()
	{
		if($this->session->status == 'admin'):
			$this->load->view('templates/header');
			$this->load->view('admin/index');
			$this->load->view('templates/footer');
		elseif($this->session->status == 'editor'):
			$this->load->view('templates/header');
			$this->load->view('admin/edit');
			$this->load->view('templates/footer');
		else:	
			show_404();
		endif;
	}

}