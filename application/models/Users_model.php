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
		$result = ($user->pass === md5($pass)) ? true : false;
		if($result):
			$data = array(
						'id' => $user->id,
						'login' => $user->login,
						'email' => $user->email,
						'logged_in' => TRUE,
					);
			$this->session->set_userdata($data);
			return true;
		else:
			return false;
		endif;
	}
	
	public function set_cat()
	{
		$data = array(
			'brand' => $this->input->post('brand'),
		);

		return $this->db->insert('cats', $data);
	}
	
	public function set_cat_img()
	{
		$id = $this->input->post('cats');
		$img = $this->upload->data('file_name');
		return $this->db->update('cats', array('img' => $img), "id =".$id);
	}
	
	public function update_cat()
	{
		$id = $this->input->post('cats');
		$data = array(
			'brand' => $this->input->post('brand'),
		);

		return $this->db->update('cats', $data, 'id='.$id);
	}
	
	public function delete()
	{
		$id = $this->input->post('cats');
		$this->db->delete('cats', array('id' => $id));
	}
}