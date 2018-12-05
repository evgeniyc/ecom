<?php
class Orders extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('orders_model');
			$this->load->helper('url');
			$this->config->set_item('language', $this->input->cookie('lang'));
			
	}
//Вывод заказов (всех, по статусу, по пользователю) для админ
	public function index()
	{
		if($this->session->logged_in):
			$this->load->library('table');
			$data['orders'] = $this->orders_model->get_orders();
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('orders/index', $data);
			$this->load->view('templates/footer');
		else:
			redirect('users/login');
		endif;
	}
//Вывод заказов конкретного пользователя
	public function view()
	{
		if($this->session->logged_in):
			$this->load->library('table');
			
			$data['orders'] = $this->orders_model->get_order();

			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('orders/view', $data);
			$this->load->view('templates/footer');
		else:
			redirect('users/login');
		endif;
	}
//Создание заказа	
	public function create()
	{
		if($this->session->logged_in && !empty($this->cart->total_items())):
			$this->orders_model->set_order();
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('orders/success');
			$this->load->view('templates/footer');
		else:
			redirect(base_url());
		endif;
	}
//Подготовка данных для оплаты через liqpay. Использует ajax. Возвращает кнопку оплаты.
//Для формирования данных использует официальную библиотеку liqpay.
	public function prepare()
	{
		if($this->input->is_ajax_request() && $this->session->logged_in && !empty($this->input->post('order_id'))):
			$this->load->library('liqpay');
			$order = $this->orders_model->get_order_amount();
			$html = $this->liqpay->cnb_form(array(
			'action'         => 'pay',
			'amount'         => $order->price*$order->qty,
			'currency'       => 'UAH',
			'description'    => $this->input->post('order_descr'),
			'order_id'       => $order->id,
			'version'        => '3'
			));
			echo $html;
		else: 
			echo 'Error';
		endif;
	}
}