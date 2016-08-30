<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tamu extends CI_Model {

	private $table = 'guest';
    private $guest_group = 'guest_group';
    private $country = 'negara';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read($id=null){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->guest_group, $this->table.'.kode_grup = '.$this->guest_group.'.id_guest_group');
        $this->db->join($this->country, $this->table.'.negara = '.$this->country.'.country_id');
		if (!is_null($id)) {
			$this->db->where('id', $id);
		}
		$this->db->where('active', '1');
		$query = $this->db->get();
		return $query->result_array();
	}

    public function read_tamu(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('guest_group', $this->table.'.kode_grup = '.$this->guest_group.'.id_guest_group');
        $this->db->join($this->country, $this->table.'.negara = '.$this->country.'.country_id');
        $this->db->where('active', '1');
        $this->db->where('check', '0');
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

    public function readTamu($id){
		$this->db->select('*');
		$this->db->join($this->guest_group, $this->table.'.kode_grup = '.$this->guest_group.'.id_guest_group');
        $this->db->join($this->country, $this->table.'.negara = '.$this->country.'.country_id');
		$this->db->where('id', $id);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result_array();
	}

	 public function readTop(){
		$this->db->select('id');
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result_array();
	}

    public function country()
    {
        $query = $this->db->get('negara');
        return $query->result_array();
	}
}

/* End of file m_tamu */
/* Location: ./application/models/m_tamu */