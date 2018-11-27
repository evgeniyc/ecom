<?php
class Orders_model extends CI_Model {

	public function __construct()
	{
			$this->load->database();
	}
	
	public function get_orders()
	{	
		$this->db->select('id, item_id, qty, price, date, user, status');
		$query = $this->db->get('orders');
		return $query->result_array();
	}
	
	public function get_orders_status()
	{	
		$this->db->select('id, item_id, qty, price, date, user, status');
		$query = $this->db->get_where('orders', array('status'=>'new'));
		return $query->result_array();
	}
	
	public function get_orders_user()
	{	
		$this->db->select('id, item_id, qty, price, date, user, status');
		$query = $this->db->get_where('orders', array('status'=>'new'));
		return $query->result_array();
	}
	
	public function get_order()
	{	
		if (!empty($this->session->id))
		{
				$this->db->select('orders.id, model, qty, orders.price, date, orders.status, payed');
				$this->db->join('users', 'users.id = orders.user');
				$this->db->join('items', 'items.id = orders.item_id');
				$query = $this->db->get_where('orders', array('user'=>$this->session->id));
				return $query->result_array();
		}
		return null;
	}
	
	public function get_order_amount()
	{
		$id = $this->input->post('order_id');
		$query = $this->db->get_where('orders', array('id' => $id));
		$order = $query->row();
		return $order;
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
	
	public function change_status()
	{
		$id = $this->input->post('order_id');
		if(empty($id))
			return false;
		$status = 'new';
		$query = $this->db->get_where('orders', array('id'=>$id));
		$order = $query->row();
		switch($order->status):
			case 'new': 
				$status = 'processing';
				break;
			case 'processing': 
				$status = 'done';
				break;
		endswitch;
		$this->db->update('orders', array('status' => $status), 'id ='.$id);
		return true;
	}
	
	
}