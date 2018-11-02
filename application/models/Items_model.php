<?php
class Items_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	public function get_items($slug = FALSE)
	{	
		/*if ($slug === FALSE)
		{
				$query = $this->db->get('news');
				return $query->result_array();
		}*/

		//$query = $this->db->get_where('news', array('slug' => $slug));
		$query = $this->db->get('items');
		return $query->result();
	}
	
	public function set_item()
	{
		$this->load->helper('url');

		//$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'descr' => $this->input->post('descr'),
		);

		return $this->db->insert('items', $data);
	}
}