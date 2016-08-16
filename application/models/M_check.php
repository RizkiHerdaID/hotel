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

	public function create($data){
		$this->db->trans_start();
		
		$this->db->insert($this->table, $data);

		$this->db->set('guest_id', $data['guest_id']);
		$this->db->set('status', '1');
		$this->db->where('idrooms', $data['idrooms']);
		$this->db->update('rooms');

		$this->db->set('check', '1');
		$this->db->where('id', $data['guest_id']);
		$this->db->update('guest');

		$idTop = $this->readTop();
		foreach ($idTop as $list) {
			$id = (string) $list['order_id'];
			$guest_id = (string) $list['guest_id'];
		}
		$kwitansi = 'KW'.$guest_id .rand ( 10 , 99 ) .'-'.rand ( 1000 , 9999 );
		$this->db->set('order_id', $id);
		$this->db->set('kwitansi', $kwitansi);
		$this->db->insert('payment');
		
		$this->db->trans_complete();
		$status =  $this->db->trans_status();
		return $status;
	}

	 public function readTop(){
		$this->db->select('*');
		$this->db->order_by('order_id', 'desc');
		$this->db->limit(1);
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result_array();
	}
}

/* End of file M_check.php */
/* Location: ./application/models/M_check.php */
