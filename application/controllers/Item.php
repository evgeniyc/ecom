<?php
class Item extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('item_model');
			$this->load->library('breadcrumbs');
			$this->load->helper('url_helper');
			$this->load->helper('form');
	}

	public function index($brand)
	{
		$data['items'] = $this->items_model->get_item($brand);
		$cat = $this->items_model->get_cat($brand);
		$data['cat'] = $cat->brand;
		
		// add breadcrumbs
		$this->breadcrumbs->push('Категория '.$cat->brand, '/items/index');
		$this->breadcrumbs->push('Модель '.$cat->brand, '/items/index');

		// unshift crumb
		$this->breadcrumbs->unshift('Главная', '/cats');

		
		//$data['title'] = 'Товары';

		$this->load->view('templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('items/index', $data);
		$this->load->view('templates/footer');
	}
		
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('model', 'Модель', 'required');
		$this->form_validation->set_rules('descr', 'Описание', 'required');
		
		$this->load->model('cats_model');
		$data['cats'] = $this->cats_model->get_cats();

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('items/create', $data);
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
	
	public function upload()
	{
		
		$this->breadcrumbs->push('Категории', '/cats');
		$this->breadcrumbs->push('Добавить изображение', '/cats/upload');
		$this->breadcrumbs->unshift('Главная', '/');
			
		$config['upload_path']          = './assets/img/item';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 200;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['overwrite']			= TRUE;

		$this->load->library('upload', $config);
		$this->load->model('cats_model');
		$this->load->model('items_model');
		$data['cats'] = $this->cats_model->get_cats();
		$data['models'] = $this->items_model->get_models();
		$data['error'] = '';
		if ( ! $this->upload->do_upload('userfile') || empty($data['cats']) || empty($data['models']))
		{
			$data['error'] = $this->upload->display_errors();

			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('item/add_img', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$img = $this->upload->data('file_name');
			$this->item_model->set_item($img);
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('item/success');
			$this->load->view('templates/footer');
		}
	}
		
	public function _output($data)
	{
		echo $data;
	}
	
	public function delete($cat, $model)
	{
		$this->items_model->delete($cat, $model);
		$this->load->view('templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('items/success');
		$this->load->view('templates/footer');
	}
}