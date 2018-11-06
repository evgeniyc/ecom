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
			'img' => $this->input->post('img'),
			'cat' => $this->input->post('cat'),
		);

		return $this->db->insert('items', $data);
	}
	
	public function set_charact($charact, $id)
	{
		$this->db->update('items', array('charact' => $charact), array('id' => $id));
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

		return $this->db->update('items', $data, array('id' => $id));
	}
	
	public function delete_item($id)
	{
		$this->db->delete('items', array('id' => $id));
	}
}