<?php
class Item_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	public function get_items($code)
	{	
		$query = $this->db->get_where('items', array('code' => $code));
		return $query->result();
	}
	
	public function set_item()
	{
		//$this->load->helper('url');

		$data = array(
			'code' => $this->input->post('model'),
			'price' => $this->input->post('descr'),
			'quant' => $this->input->post('img'),
		);

		return $this->db->insert('item', $data);
	}
	
	public function update_item($id)
	{
		$this->load->helper('url');

		$data = array(
			'id' => $id,
			'code' => $this->input->post('model'),
			'price' => $this->input->post('descr'),
			'quant' => $this->input->post('img'),
		);

		return $this->db->replace('item', $data);
	}
	
	public function delete_item($id)
	{
		$this->db->delete('item', array('id' => $id));
		$this->db->delete('item_charact', array('item_id' => $id));
	}
}