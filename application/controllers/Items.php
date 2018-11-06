<?php
class Items extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('items_model');
			$this->load->library('breadcrumbs');
	}

	public function index($brand)
	{
		$data['items'] = $this->items_model->get_items($brand);
		
		// add breadcrumbs
		$this->breadcrumbs->push('Категория', '/items/index');

		// unshift crumb
		$this->breadcrumbs->unshift('Главная', '/cats');

		
		//$data['title'] = 'Товары';

		$this->load->view('templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('items/index', $data);
		$this->load->view('templates/footer');
	}
/*
	public function view($slug = NULL)
	{
		$data['news_item'] = $this->news_model->get_news($slug);

		if (empty($data['news_item']))
		{
				show_404();
		}

		$data['title'] = $data['news_item']['title'];

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}
	*/
	
	$data = array(
			'model' => $this->input->post('model'),
			'descr' => $this->input->post('descr'),
			'img' => $this->input->post('img'),
			'cat' => $this->input->post('cat'),
			'charact' => $this->input->post('charact'),
		);
		
		
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('model', 'Модель', 'required');
		$this->form_validation->set_rules('descr', 'Описание', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('items/create');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->items_model->set_item();
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('items/success');
			$this->load->view('templates/footer');
		}
	}
}