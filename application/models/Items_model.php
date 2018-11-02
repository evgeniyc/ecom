<?php
class Items_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	public function get_items($model = FALSE)
	{	
		if ($model === FALSE)
		{
				$query = $this->db->get('items');
				return $query->result();
		}

		$query = $this->db->get_where('items', array('model' => $model));
		return $query->result();
	}
	
	public function set_item()
	{
		//$this->load->helper('url');

		$data = array(
			'model' => $this->input->post('model'),
			'descr' => $this->input->post('descr'),
			'img' => $this->input->post('img'),
			'cat' => $this->input->post('cat'),
			'charact' => $this->input->post('charact'),
		);

		return $this->db->insert('items', $data);
	}
	
	public function update_item($id)
	{
		$this->load->helper('url');

		$data = array(
			'id' => $id,
			'model' => $this->input->post('model'),
			'descr' => $this->input->post('descr'),
			'img' => $this->input->post('img'),
			'cat' => $this->input->post('cat'),
			'charact' => $this->input->post('charact'),
		);

		return $this->db->replace('items', $data);
	}
	
	public function delete_item($id)
	{
		$this->db->delete('items', array('id' => $id));
	}
}