<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tamu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read(){
		$query = $this->db->get('guest');
		return $query->result_array();
	}

}

/* End of file m_tamu */
/* Location: ./application/models/m_tamu */