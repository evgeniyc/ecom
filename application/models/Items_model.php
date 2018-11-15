<?php
class Items_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	public function get_all_items()
	{	
		$query = $this->db->get('items');
		return $query->result();
	}
	
	public function get_item($id)
	{	
		$query = $this->db->get_where('items', array('id' => $id));
		return $query->row();
	}
	
	public function get_items($brand)
	{	
		$query = $this->db->get_where('items', array('cat' => $brand));
		return $query->result();
	}
	
	public function set_item($img)
	{
		$data = array(
			'cat' => $this->input->post('cats'),
			'model' => $this->input->post('model'),
			'thumb' => $img,
			'descr' => $this->input->post('descr'),
			'price' => $this->input->post('price'),
		);

		return $this->db->insert('items', $data);
	}
	
	public function get_models()
	{
		$cat = $this->input->post('cats');
		$query = $this->db->get_where('items', array('cat' => $cat));
		return $query->result();
	}
	
	public function get_model()
	{
		$model = $this->input->post('model');
		$query = $this->db->get_where('items', array('model' => $model));
		return $query->row();
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
	
	public function update_item()
	{
		$model = $this->input->post('model');
		$data = array(
			'descr' => $this->input->post('descr'),
			'cat' => $this->input->post('cat'),
		);
		return $this->db->update('items', $data, 'model ='.$model);
	}
	
	public function delete()
	{
		$model = $this->input->post('model');
		$this->db->delete('items', array('model' => $model));
	}
}