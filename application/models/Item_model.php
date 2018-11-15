<?php
class Item_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	public function get_item($model)
	{	
		$query = $this->db->get_where('item', array('model' => $model));
		return $query->row();
	}
	
	public function set_item($img)
	{
		$data = array(
			'model' => $this->input->post('models'),
			'img' => $img,
			'descr' => $this->input->post('descr'),
		);

		return $this->db->insert('item', $data);
	}
	
	public function set_img()
	{
		$id = $this->input->post('models');
		$this->db->update('items', array('img' => $img), 'id ='.$id);
	}
	
	public function update_item($id)
	{
		$data = array(
			'model' => $this->input->post('model'),
			'charact' => $this->input->post('charact'),
			'quant' => $this->input->post('quant'),
		);

		return $this->db->update('item', $data, "id = ".$id);
	}
	
	public function delete_item($id)
	{
		$this->db->delete('item', array('id' => $id));
		$this->db->delete('item_charact', array('item_id' => $id));
	}
}