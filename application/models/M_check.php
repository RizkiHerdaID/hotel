<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_check extends CI_Model {

	private $table = 'order';
	private $pk = 'order_id';
	private $join = 'guest';
	private $join2 = 'class';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read($id=null){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->join, $this->table.'.guest_id = '.$this->join.'.id');
		$this->db->join($this->join2, $this->table.'.class_id = '.$this->join2.'.idclass');
		if (!is_null($id)) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
}

/* End of file M_check.php */
/* Location: ./application/models/M_check.php */
