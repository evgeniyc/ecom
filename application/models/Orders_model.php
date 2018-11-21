<?php
class Orders_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	public function get_orders()
	{	
		$this->db->select('id, item_id, qty, price, date, user, status');
		$query = $this->db->get_where('orders', array('status'=>'new'));
		return $query->result_array();
	}
	
	public function get_order()
	{	
		if (!empty($this->session->id))
		{
				$this->db->select('id, item_id, qty, price, date, user, status');
				$query = $this->db->get_where('orders', array('user'=>$this->session->id));
				return $query->result_array();
		}
		return null;
	}
	
	public function set_order()
	{
		foreach ($this->cart->contents() as $item):
			$data = array(
				'item_id' => $item['id'],
				'qty' => $item['qty'],
				'price' => $item['price'],
				'user' => $this->session->id,
			);
			$this->db->insert('orders', $data);
		endforeach;
		$this->cart->destroy();
	}
	
	public function proc_status()
	{
		
	}
	
	public function done_status()
	{
		
	}
}