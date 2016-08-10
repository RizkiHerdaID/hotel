<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_makanan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read(){
		$query = $this->db->get('foods');
		return $query->result_array();
	}
}

/* End of file m_makanan.php */
/* Location: ./application/models/m_makanan.php */