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
	
	public function edit_item_img()
	{
		$img = $this->upload->data('file_name');
		$id = $this->input->post('model');
		return $this->db->update('items', array('img' => $img), 'id ='.$id);
	}
	
	public function get_models()
	{
		$cat = $this->input->post('cats');
		$query = $this->db->get_where('items', array('cat' => $cat));
		return $query->result();
	}
	
	public function get_model()
	{
		$id = $this->input->post('mod');
		$query = $this->db->get_where('items', array('id' => $id));
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
	
	public function set_charact()
	{
		$data = array(
			'id' => $this->input->post('mod'),
			'dims' => $this->input->post('dims'),
			'disp' => $this->input->post('disp'),
			'disp_type' => $this->input->post('disp_type'),
			'cam_size' => $this->input->post('cam_size'),
			'bat' => $this->input->post('bat'),
			'weight' => $this->input->post('weight'),
		);
		$this->db->insert('charact', $data);
	}
	
	public function update_charact()
	{
		$id = $this->input->post('id');
		$data = array(
			'dims' => $this->input->post('dims'),
			'disp' => $this->input->post('disp'),
			'disp_type' => $this->input->post('disp_type'),
			'cam_size' => $this->input->post('cam_size'),
			'bat' => $this->input->post('bat'),
			'weight' => $this->input->post('weight'),
		);
		$this->db->update('charact', $data, 'id='.$id);
	}
	
	public function get_charact()
	{
		$id = $this->input->post('mod');
		$query = $this->db->get_where('charact', array('id' => $id));
		return $query->row();
	}
	
	public function update_item()
	{
		$id = $this->input->post('mod');
		$data = array(
			'model' => $this->input->post('model'),
			'descr' => $this->input->post('descr'),
			'cat' => $this->input->post('cats'),
		);
		return $this->db->update('items', $data, 'id ='.$id);
	}
	
	public function delete()
	{
		$model = $this->input->post('id');
		$this->db->delete('items', array('id' => $id));
		$this->db->delete('charact', array('id' => $id));
	}
}