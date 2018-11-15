<?php
class Items extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('items_model');
			$this->load->library('breadcrumbs');
			$this->load->helper('url_helper');
			$this->load->helper('form');
	}

	public function index($brand)
	{
		$data['items'] = $this->items_model->get_items($brand);
		$cat = $this->items_model->get_cat($brand);
		$data['cat'] = $cat->brand;
		
		// add breadcrumbs
		$this->breadcrumbs->push('Категория '.$cat->brand, '/items/index');

		// unshift crumb
		$this->breadcrumbs->unshift('Главная', '/cats');

		
		//$data['title'] = 'Товары';

		$this->load->view('templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('items/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function view($id)
	{
		$item = $this->items_model->get_item($id);
		$cat = $this->items_model->get_cat($item->cat);
		$data['cat'] = $cat->brand;
		$data['item'] = $item;
		
		// add breadcrumbs
		$this->breadcrumbs->push('Категория '.$cat->brand, '/items/index/'.$item->cat);
		$this->breadcrumbs->push('Модель '.$item->model, '/items/view/'.$item->id);

		// unshift crumb
		$this->breadcrumbs->unshift('Главная', '/cats');

		
		//$data['title'] = 'Товары';

		$this->load->view('templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('items/view', $data);
		$this->load->view('templates/footer');
	}
		
	public function create()
	{
		
		$this->breadcrumbs->push('Категории', '/cats');
		$this->breadcrumbs->push('Добавить изображение', '/cats/upload');
		$this->breadcrumbs->unshift('Главная', '/');
			
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('model', 'Модель', 'required');
		
		$config['upload_path']          = './assets/img/items';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 200;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['overwrite']			= TRUE;

		$this->load->library('upload', $config);
		$this->load->model('cats_model');
		$data['cats'] = $this->cats_model->get_cats();
		$data['error'] = '';
		if ( ! $this->upload->do_upload('userfile') || $this->form_validation->run() === FALSE)
		{
			$data['error'] = $this->upload->display_errors();

			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('items/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$img = $this->upload->data('file_name');
			$this->items_model->set_item($img);
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('items/success');
			$this->load->view('templates/footer');
		}
	}
		
	public function update()
	{
		$this->breadcrumbs->push('Категории', '/cats');
		$this->breadcrumbs->push('Редактировать', '/items/update');
		$this->breadcrumbs->unshift('Главная', '/');
			
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('model', 'Модель', 'required');
		$this->form_validation->set_rules('descr', 'Описание', 'required');
		
		$config['upload_path']          = './assets/img/items';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 200;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['overwrite']			= TRUE;

		$this->load->library('upload', $config);
		$this->load->model('cats_model');
		$data['cats'] = $this->cats_model->get_cats();
		$data['models'] = $this->items_model->get_models();
		$data['model'] = $this->items_model->get_model();
			
		$data['error'] = '';
		if ( ! $this->upload->do_upload('userfile') || $this->form_validation->run() === FALSE)
		{
			$data['error'] = $this->upload->display_errors();

			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('items/update', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->items_model->update_item();
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('items/success');
			$this->load->view('templates/footer');
		}
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