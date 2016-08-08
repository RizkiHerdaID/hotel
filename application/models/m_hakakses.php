<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_hakakses extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('groups', 'users.id_group = groups.id');
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file m_hakakses.php */
/* Location: ./application/models/m_hakakses.php */