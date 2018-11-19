<?php
class Orders extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('orders_model');
			$this->load->helper('url');
			
	}

	public function index()
	{
		$this->load->library('table');
		$data['orders'] = $this->orders_model->get_orders();
		$this->load->view('templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('orders/index', $data);
		$this->load->view('templates/footer');
	}

	public function view()
	{
		$data['order'] = $this->news_model->get_order();

		if (empty($data['order']))
		{
				show_404();
		}

		//$data['title'] = $data['news_item']['title'];

		$this->load->view('templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('orders/view', $data);
		$this->load->view('templates/footer');
	}
	
	public function create()
	{
		$this->orders_model->set_order();
		$this->load->view('templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('orders/success');
		$this->load->view('templates/footer');
	}
}