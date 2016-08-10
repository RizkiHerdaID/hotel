<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jenis extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read(){
		$query = $this->db->get('class');
		return $query->result_array();
	}

}

/* End of file m_jenis.php */
/* Location: ./application/models/m_jenis.php */