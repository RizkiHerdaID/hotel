<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jenis extends CI_Model {

	private $table = 'class';
	private $pk = 'idclass';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read($id=null){
		if (!is_null($id)) {
			$this->db->where($this->pk, $id);
		}
		$this->db->where('active', '1');
		$query = $this->db->get('class');
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
    	$result = $this->db->update($this->table, $data, array('idclass' => $id));
    	return $result;
    }

    public function group_by_jenis(){
        $query =    "SELECT class.idclass, title, price, fasilitas, count(status) as kamar_kosong FROM class
                    JOIN rooms
                    ON class.idclass = rooms.idclass
                      WHERE status = '0'
                    GROUP BY class.idclass";
        $result = $this->db->query($query);
        return $result->result_array();
    }
}

/* End of file m_jenis.php */
/* Location: ./application/models/m_jenis.php */