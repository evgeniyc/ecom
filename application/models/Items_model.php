<?php
class Items_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	public function get_items($brand)
	{	
		$query = $this->db->get_where('items', array('cat' => $brand));
		return $query->result();
	}
	
	public function set_item()
	{
		$data = array(
			'model' => $this->input->post('model'),
			'descr' => $this->input->post('descr'),
			'cat' => $this->input->post('cat'),
		);

		return $this->db->insert('items', $data);
	}
	
	public function get_models()
	{
		$cat = $this->input->post('cats');
		$query = $this->db->get_where('items', array('cat' => $cat));
		return $query->result();
	}
	
	public function get_cat($id)
	{
		$query = $this->db->get_where('cats', array('id' => $id));
		return $query->row();
	}
	
	public function set_item_img($img)
	{
		$id = $this->input->post('models');
		$this->db->update('items', array('img' => $img), 'id ='.$id);
	}
	
	public function set_charact($charact, $id)
	{
		$this->db->update('items', array('charact' => $charact), 'id ='.$id);
	}
	
	public function update_item($id)
	{
		$this->load->helper('url');

		$data = array(
			'model' => $this->input->post('model'),
			'descr' => $this->input->post('descr'),
			'img' => $this->input->post('img'),
			'cat' => $this->input->post('cat'),
			'charact' => $this->input->post('charact'),
		);

		return $this->db->update('items', $data, 'id ='.$id);
	}
	
	public function delete($cat, $model)
	{
		$this->db->delete('items', array('cat' => $cat, 'model' => $model));
	}
}