<?php
class Cats extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('cats_model');
			$this->load->helper('url_helper');
			$this->load->helper('form');
			$this->load->library('breadcrumbs');
	}

	public function index()
	{
		$data['cats'] = $this->cats_model->get_cats();
		
		// add breadcrumbs
		//$this->breadcrumbs->push('Категории', '/cats');
		
		// unshift crumb
		//$this->breadcrumbs->unshift('Главная', '/');

		
		$this->load->view('templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('cats/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		// add breadcrumbs
		$this->breadcrumbs->push('Создать', '/cats/create');
		// unshift crumb
		$this->breadcrumbs->unshift('Главная', '/cats');
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('brand', 'Наименование', 'required');
		$data['cats'] = $this->cats_model->get_cats();
		$data['error'] = '';
		if ($this->form_validation->run() === FALSE)
		{
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
	
	public function upload()
        {
            $this->breadcrumbs->push('Категории', '/cats');
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
			if ( ! $this->upload->do_upload('userfile'))
			{
					$data['error'] = $this->upload->display_errors();

					$this->load->view('templates/header');
					$this->load->view('sidebars/sidebar1');
					$this->load->view('cats/create', $data);
					$this->load->view('templates/footer');
			}
			else
			{
					$data = array('upload_data' => $this->upload->data());
					$img = $this->upload->data('file_name');
					$this->cats_model->set_cat_img($img);
					$this->load->view('templates/header');
					$this->load->view('sidebars/sidebar1');
					$this->load->view('cats/upload_success', $data);
					$this->load->view('templates/footer');
			}
        }
		
		public function delete($brand)
		{
			$this->db->delete('cats', array('brand' => $brand));
			$this->load->view('templates/header');
			$this->load->view('sidebars/sidebar1');
			$this->load->view('cats/success');
			$this->load->view('templates/footer');
		}
}