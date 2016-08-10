<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jasa extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read(){
		$query = $this->db->get('services');
		return $query->result_array();
	}
}

/* End of file m_jasa.php */
/* Location: ./application/models/m_jasa.php */