<?php
class Users_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	public function create()
	{	
		$post = $this->input->post();
		$array = array(
			'login' => $post['login'],
			'pass' => md5($post['pass']),
			'email' => $post['email'],
		);
		$this->db->set($array);
		$this->db->insert('users');
	}
	
	public function auth()
	{	
		$login = $this->input->post('login');
		$pass = $this->input->post('pass');
		$query = $this->db->get_where('users', array('login' => $login));
		$user = $query->row();
		$result = false;
		if($user)
			$result = ($user->pass === md5($pass)) ? true : false;
		if($result):
			$data = array(
						'id' => $user->id,
						'login' => $user->login,
						'email' => $user->email,
						'logged_in' => TRUE,
						'status' => $user->status,
					);
			$this->session->set_userdata($data);
			return $result;
		else:
			return $result;
		endif;
	}
	
	public function delete()
	{
		$id = $this->input->post('login');
		$this->db->delete('users', array('login' => $id));
	}
}