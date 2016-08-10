<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kamar extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read(){
		$this->db->select('*');
		$this->db->from('rooms');
		$this->db->join('class', 'rooms.idclass = class.idclass');
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file m_kamar.php */
/* Location: ./application/models/m_kamar.php */