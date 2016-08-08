<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_grup extends CI_Model {

	private $table = 'guest_group';
	private $pk = 'id_guest_group';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read(){
		$this->db->where('status_guest_group', '1');
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function create($object){
		$create = $this->db->insert($this->table, $object);
		return $create;
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