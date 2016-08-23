<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

	private $table = 'payment';
	private $pk = 'payment_id';
	private $join = 'order';
	private $join2 = 'class';
	private $join3 = 'guest';
	private $join4 = 'rooms';
	private $join5 = 'guest_group';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read($payment_id=null){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->join, $this->table.'.order_id = '.$this->join.'.order_id');
		$this->db->join($this->join2, $this->join.'.class_id = '.$this->join2.'.idclass');
		$this->db->join($this->join3, $this->join3.'.id = '.$this->join.'.guest_id');
		$this->db->join($this->join4, $this->join4.'.idrooms = '.$this->join.'.idrooms');
		$this->db->join($this->join5, $this->join3.'.kode_grup = '.$this->join5.'.id_guest_group');
		if (!is_null($payment_id)) {
			$this->db->where('payment_id', $payment_id);
		}
        $this->db->order_by('order.order_id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file M_pembayaran.php */
/* Location: ./application/models/M_pembayaran.php */
