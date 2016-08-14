<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_booking extends CI_Model {

	private $table = 'booking';
	private $join = 'guest';
	private $join2 = 'class';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read($id=null){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->join, $this->table.'.id_guest = '.$this->join.'.id');
		$this->db->join($this->join2, $this->table.'.class_id = '.$this->join2.'.idclass');
		if (!is_null($id)) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	public function create($data){
		$query = $this->db->insert($this->table, $data);
		return $query;
	}
}

/* End of file M_booking.php */
/* Location: ./application/models/M_booking.php */