<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HakAkses extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_hakakses','hakakses');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Hak Akses',
			'content' => 'admin/hakakses/index',
			'hakakses' => $this->hakakses->read()
		];
		$this->load->view($this->template, $data);
	}
}

/* End of file datamaster.php */
/* Location: ./application/controllers/datamaster.php */