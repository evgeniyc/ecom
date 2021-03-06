<?php
class Cats extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cats_model');
		$this->load->helper('form');
	}

	//Вывод всех категорий
	public function index()
	{
		$data['cats'] = $this->cats_model->get_cats();
		$lang = $this->input->cookie('lang');
		if($lang)
			$lang .= '/';
		$this->load->view($lang.'templates/header');
		$this->load->view($lang.'sidebars/sidebar1');
		$this->load->view('cats/index', $data);
		$this->load->view($lang.'templates/footer');
	}

	//Создание новой категории
	public function create()
	{
		
		$this->breadcrumbs->push('Создать категорию', '/cats/create');
		$this->breadcrumbs->unshift('Главная', '/');
			
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('brand', 'Категория', 'required|is_unique[cats.brand]');
		
		$config['upload_path']          = './assets/img/logo';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 200;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['overwrite']			= TRUE;

		$this->load->library('upload', $config);
		$data['error'] = '';
		if ( ! $this->upload->do_upload('userfile') || $this->form_validation->run() === FALSE)
		{
			$data['error'] = $this->upload->display_errors();

			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('cats/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->cats_model->set_cat();
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('cats/success');
			$this->load->view('templates/footer');
		}
	}
	
	public function update()
	{
		// добавление breadcrumbs
		$this->breadcrumbs->push('Редактирование категории', '/cats/create');
		// unshift crumb
		$this->breadcrumbs->unshift('Главная', '/cats');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('brand', 'Наименование', 'required');
		$data['cats'] = $this->cats_model->get_cats();
		$data['category'] = $this->cats_model->get_cat();
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('cats/update', $data);
			$this->load->view('templates/footer');

		}
		else
		{
			$this->cats_model->update_cat();
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('cats/success');
			$this->load->view('templates/footer');
		}
	}
	
	public function upload()
        {
           	$this->breadcrumbs->push('Добавить изображение', '/cats/upload');
			// unshift crumb
			$this->breadcrumbs->unshift('Главная', '/');
				
			$config['upload_path']          = './assets/img/logo';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 200;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$config['overwrite']			= TRUE;

			$this->load->library('upload', $config);
			$data['cats'] = $this->cats_model->get_cats();
			$data['error'] = '';
			if ( ! $this->upload->do_upload('userfile'))
			{
				$data['error'] = $this->upload->display_errors();

				$this->load->view('templates/header');
				$this->load->view('sidebars/sidebar1');
				$this->load->view('cats/upload', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				$this->cats_model->set_cat_img();
				$this->load->view('templates/header');
				$this->load->view('sidebars/sidebar1');
				$this->load->view('cats/success');
				$this->load->view('templates/footer');
			}
        }
		
	public function delete()
	{
		// добавление breadcrumbs
		$this->breadcrumbs->push('Редактирование категории', '/cats/create');
		// unshift crumb
		$this->breadcrumbs->unshift('Главная', '/cats');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cats', 'Категория', 'required');
		$data['cats'] = $this->cats_model->get_cats();
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('cats/delete', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->cats_model->delete();
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('cats/success', $data);
			$this->load->view('templates/footer');
		}
	}		
}