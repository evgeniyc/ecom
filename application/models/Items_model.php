<?php
class Items_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	//Все строки модели
	public function get_all_items()
	{	
		$query = $this->db->get('items');
		return $query->result();
	}
	
	//Получение одной позиции по идентификатору
	public function get_item($id)
	{	
		$query = $this->db->get_where('items', array('id' => $id));
		return $query->row();
	}
	
	//Получение позиций одной категории
	public function get_items($brand)
	{	
		$query = $this->db->get_where('items', array('cat' => $brand));
		return $query->result();
	}
	
	//Создание позиции
	public function set_item()
	{
		$data = array(
			'cat' => $this->input->post('cats'),
			'model' => $this->input->post('model'),
			'thumb' => $img = $this->upload->data('file_name'),
			'descr' => $this->input->post('descr'),
			'price' => $this->input->post('price'),
		);

		return $this->db->insert('items', $data);
	}
	
	//Редактирование изображения позиции
	public function edit_item_img()
	{
		$img = $this->upload->data('file_name');
		$id = $this->input->post('model');
		return $this->db->update('items', array('img' => $img), 'id ='.$id);
	}
	
	//Получение позиций одной категории по данным формы
	public function get_models()
	{
		$cat = $this->input->post('cats');
		$query = $this->db->get_where('items', array('cat' => $cat));
		return $query->result();
	}
	
	//Получение позиции по идентификатору из формы
	public function get_model()
	{
		$id = $this->input->post('mod');
		$query = $this->db->get_where('items', array('id' => $id));
		return $query->row();
	}
	
	//Получение данных  одной категории
	public function get_cat($id)
	{
		$query = $this->db->get_where('cats', array('id' => $id));
		return $query->row();
	}
	
	//Редактирование изображения позиции
	public function set_item_img($img)
	{
		$id = $this->input->post('models');
		$this->db->update('items', array('img' => $img), 'id ='.$id);
	}
	
	//Добавление характеристик позиции
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
	
	//Редактирование характеристик позиции
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
	
	//Получение характеристик позиции
	public function get_charact()
	{
		$id = $this->input->post('mod');
		$query = $this->db->get_where('charact', array('id' => $id));
		return $query->row();
	}
	
	//Редактирование данных позиции
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
	
	//Удаление позиции
	public function delete()
	{
		$model = $this->input->post('id');
		$this->db->delete('items', array('id' => $id));
		$this->db->delete('charact', array('id' => $id));
	}
}