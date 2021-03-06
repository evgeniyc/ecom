<?php
class Users extends CI_Controller {

	 public function __construct()
	{
			parent::__construct();
			$this->load->model('users_model');
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('table');
			$this->config->set_item('language', $this->input->cookie('lang'));
			
	}
//Вывод всех пользователей (только для админа)	 
		public function index()
		{
			if($this->session->status == 'admin'):
				$data['users'] = $this->users_model->get_users();
				$this->load->view('templates/header');
				$this->load->view('sidebars/sidebar1');
				$this->load->view('users/index', $data);
				$this->load->view('templates/footer');
			else: 
				show_404();
			endif;
		}
//Регистрация пользователя		
		public function create()
        {
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$this->form_validation->set_rules(
					'login', 'Логин',
					'required|max_length[16]|is_unique[users.login]',
					array(
							'required'      => 'Вы не ввели %s.',
							'is_unique'     => 'Это %s уже существует.'
					)
			);
			$this->form_validation->set_rules('pass', 'Пароль', 'required');
			$this->form_validation->set_rules('passconf', 'Подтверждение пароля', 'required|matches[pass]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('sidebars/sidebar1');
				$this->load->view('users/create');
				$this->load->view('templates/footer');
			}
			else
			{
				$this->users_model->create();
				$this->load->view('templates/header');
				$this->load->view('sidebars/sidebar1');
				$this->load->view('users/success');
				$this->load->view('templates/footer');
			}
        }
//Редактирование пользователя (только для админа)		
		public function edit()
        {
			if($this->session->status == 'admin'):
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$this->form_validation->set_rules('id', 'Идентификатор', 'required|max_length[5]|not_is_unique[users.id]',
					array('not_is_unique' => 'Такого идентификатора не существует.'));
				$this->form_validation->set_rules('status', 'Статус', 'required|max_length[6]|in_list[user,editor,admin]');
								
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('templates/header');
					$this->load->view('sidebars/sidebar1');
					$this->load->view('users/edit');
					$this->load->view('templates/footer');
				}
				else
				{
					$this->users_model->edit_status();
					$this->load->view('templates/header');
					$this->load->view('sidebars/sidebar1');
					$this->load->view('users/success');
					$this->load->view('templates/footer');
				}
			else:
				show_404();
			endif;
        }
//Форма входа в профиль		
		public function login()
		{
			$this->load->library('form_validation');
			$this->load->library('table');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$this->form_validation->set_rules('login', 'Логин',	'required');
			$this->form_validation->set_rules('pass', 'Пароль', 'required');
			$this->form_validation->set_rules('pass', 'Пароль', 'callback_auth');
			$this->form_validation->set_message('auth', 'Неверный пароль');
			if (!($this->form_validation->run()))
			{
				$this->load->view('templates/header');
				$this->load->view('sidebars/sidebar1');
				$this->load->view('users/login');
				$this->load->view('templates/footer');
			}
			else
			{
				redirect(base_url());
			}
			
		}
//Функция аутентификации пользователя		
		public function auth()
		{
			return $result = $this->users_model->auth();
		}
//Функция выхода из профиля			
		public function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}
//Удаление пользователя		
		public function delete()
		{
			if($this->session->status != 'admin')
				show_404();
			
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$this->form_validation->set_rules('login', 'Логин',	'required');
			if (!($this->form_validation->run()))
			{
				$this->load->view('templates/header');
				$this->load->view('sidebars/sidebar1');
				$this->load->view('users/delete');
				$this->load->view('templates/footer');
			}
			else
			{
				$this->users_model->delete();
				$this->load->view('templates/header');
				$this->load->view('sidebars/sidebar1');
				$this->load->view('users/success');
				$this->load->view('templates/footer');
			}
		}
}