<?php
class Cats_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	public function get_cats()
	{	
		$query = $this->db->get('cats');
		return $query->result();
	}
	
	public function get_cat()
	{	
		$id = $this->input->post('cats');
		$query = $this->db->get_where('cats', 'id='.$id);
		return $query->row();
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