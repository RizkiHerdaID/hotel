<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_makanan extends CI_Model {

	private $table = 'foods';
	private $pk = 'id_food';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read($id=null){
		$this->db->where('active', '1');
		if(!is_null($id)){
			$this->db->where($this->pk, $id);
		}
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

		public function create($data){
		$create = $this->db->insert($this->table, $data);
		return $create;
	}

	public function update($id, $data){
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

/* End of file m_makanan.php */
/* Location: ./application/models/m_makanan.php */