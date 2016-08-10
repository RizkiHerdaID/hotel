<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tamu extends CI_Model {

	public $table = 'guest';
	public $join = 'guest_group';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read($id=null){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('guest_group', $this->table.'.kode_grup = '.$this->join.'.id_guest_group');
		if (!is_null($id)) {
			$this->db->where('id', $id);
		}
		$this->db->where('active', '1');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function create($data){
		$create = $this->db->insert($this->table, $data);
		return $create;
	}

	public function update($id, $data){
		$this->db->where('id', $id);
		$result = $this->db->update($this->table, $data);
		return $result;
	}

	public function delete($id)
    {	
    	$data = array('active' => '0');
    	$result = $this->db->update($this->table, $data, array('id' => $id));
    	return $result;
    }
}

/* End of file m_tamu */
/* Location: ./application/models/m_tamu */