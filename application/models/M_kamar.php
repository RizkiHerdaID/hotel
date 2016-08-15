<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_kamar extends CI_Model {
	private $table = 'rooms';
		private $pk	= 'idrooms';
	public function __construct()
	{
		parent::__construct();
		
	}
	public function read($id=null){
		$this->db->select('*');
		$this->db->from('rooms');
		$this->db->join('class', 'rooms.idclass = class.idclass');
		$this->db->where('rooms.active', 1);
		if (!is_null($id)) {
			$this->db->where($this->pk, $id);
			$this->db->join('guest', 'rooms.guest_id = guest.id');
			$this->db->join('guest_group', 'guest_group.id_guest_group = guest.kode_grup');
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function create($object){
		$create = $this->db->insert($this->table, $object);
		return $create;
	}

	public function delete($id)
	{
		$data = array('active' => '0');
		$result = $this->db->update($this->table, $data, array($this->pk => $id));
		return $result;
	}

	public function read_book($idclass){
		$this->db->select('*');
		$this->db->from('rooms');
		$this->db->where('idclass', $idclass);
		$this->db->where('status', '0');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function read_room($idclass){
		$this->db->select('*');
		$this->db->from('rooms');
		$this->db->join('class', 'rooms.idclass = class.idclass');
		$this->db->where('rooms.status', 0);
		$this->db->where('rooms.idclass', $idclass);
		$query = $this->db->get();
		return $query->result_array();
	}
}
/* End of file m_kamar.php */
/* Location: ./application/models/m_kamar.php */