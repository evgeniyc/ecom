<?php
class Items extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('items_model');
			$this->load->helper('url_helper');
			$this->load->library('breadcrumbs');
	}

	public function index()
	{
		$this->load->helper('form');
		$data['items'] = $this->items_model->get_items();
		
		// add breadcrumbs
		$this->breadcrumbs->push('Категории', '/items');
		$this->breadcrumbs->push('Категория', '/items/index');

		// unshift crumb
		$this->breadcrumbs->unshift('Главная', '/');

		
		//$data['title'] = 'Товары';

		$this->load->view('templates/header', $data);
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
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a news item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('descr', 'Descr', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('items/create');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->items_model->set_item();
			$this->load->view('templates/header', $data);
			$this->load->view('news/success');
			$this->load->view('templates/footer');
		}
	}
}