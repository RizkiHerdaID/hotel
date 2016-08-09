<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_grup extends CI_Model {

	private $table = 'guest_group';
	private $pk = 'id_guest_group';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read($id_guest_group=null){
		$this->db->where('status_guest_group', '1');
		if (!is_null($id_guest_group)) {
			$this->db->where('id_guest_group', $id_guest_group);
		}
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function create($object){
		$create = $this->db->insert($this->table, $object);
		return $create;
	}

	public function update($data, $id_guest_group){
		$this->db->where('id_guest_group', $id_guest_group);
		$result = $this->db->update($this->table, $data);
		return $result;
	}

	public function delete($id)
    {	
    	$data = array('status_guest_group' => '0');
    	$result = $this->db->update($this->table, $data, array('id_guest_group' => $id));
    	return $result;
    }

}

/* End of file m_grup.php */
/* Location: ./application/models/m_grup.php */