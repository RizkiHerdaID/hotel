<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jasa extends CI_Model {

	private $table = 'services';
	private $pk = 'id_service';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read($id=null){
		if (!is_null($id)) {
			$this->db->where($this->pk, $id);
		}
		$this->db->where('active', '1');
		$this->db->order_by('jenis', 'desc');
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function read_jk(){
		$this->db->where('active', '1');
		$this->db->where('jenis', '0');
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function create($object){
		$create = $this->db->insert($this->table, $object);
		return $create;
	}


	public function update($data, $id){
		$this->db->where($this->pk, $id);
		$result = $this->db->update($this->table, $data);
		return $result;
	}

	public function delete($id)
    {	
    	$data = array('active' => '0');
    	$result = $this->db->update($this->table, $data, array($this->pk => $id));
    	return $result;
    }
}

/* End of file m_jasa.php */
/* Location: ./application/models/m_jasa.php */
