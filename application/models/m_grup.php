<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_grup extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read(){
		$query = $this->db->get('guest_group');
		return $query->result_array();
	}

}

/* End of file m_grup.php */
/* Location: ./application/models/m_grup.php */