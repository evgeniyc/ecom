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
		$this->load->library('table');
		$data['orders'] = $this->orders_model->get_order();

		if (empty($data['orders']))
		{
				show_404();
		}

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
	
	public function prepare()
	{
		$public_key = 'i54475387141';
		$private_key = 'tB1iOBjrDFMhmSifpVVD4nB36iTEwxHy2QM0juhT';
		require('application/libraries/liqpay.php')
		if($this->input->is_ajax_request()):
			$public_key = i54475387141;
			$private_key = tB1iOBjrDFMhmSifpVVD4nB36iTEwxHy2QM0juhT;
			$liqpay = new LiqPay($public_key, $private_key);
			$html = $liqpay->cnb_form(array(
			'action'         => 'pay',
			'amount'         => $this->input->post('amount'),
			'currency'       => 'UAH',
			'description'    => $this->input->post('order_descr'),
			'order_id'       => $this->input->post('order_id'),
			'version'        => '3'
			));
			echo $html;
		else: 'Error';
		endif;
	}
}