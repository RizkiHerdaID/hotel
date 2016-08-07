<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tamu extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tamu', 'm_tamu');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Tamu',
			'content' => 'admin/tamu/index',
			'tamu' => $this->m_tamu->read()
		];
		$this->load->view($this->template, $data);
	}

}

/* End of file tamu.php */
/* Location: ./application/controllers/tamu.php */