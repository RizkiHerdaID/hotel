<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grup extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_grup', 'm_grup');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Grup',
			'content' => 'admin/grup/index',
			'grup' => $this->m_grup->read()
		];
		$this->load->view($this->template, $data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */