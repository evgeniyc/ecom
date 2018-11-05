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
	
	public function set_cat()
	{
		$data = array(
			'brand' => $this->input->post('brand'),
		);

		return $this->db->insert('cats', $data);
	}
	
	public function set_cat_img($img)
	{
		$id = $this->input->post('cats');
		return $this->db->update('cats', array('img' => $img), "id = $id");
	}
	
	public function update_cat($brand)
	{
		$query = $this->db->get_where('cats', array('brand' => $brand));
		$row = $query->row();
		$data = array(
			'id' => $row->id,
			'brand' => $this->input->post('brand'),
		);

		return $this->db->replace('cats', $data);
	}
	
	public function delete_item($brand)
	{
		$query = $this->db->get_where('cats', array('brand' => $brand));
		$row = $query->row();
		
		$this->db->delete('cats', array('id' => $row->id));
	}
}