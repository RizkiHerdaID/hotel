<?php 

class Jenis extends Admin_Controller {

	var $template = 'admin/template';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jenis');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Jenis Kamar',
			'content' => 'admin/jenis/index',
			'jenis' => $this->m_jenis->read()
		];
		$this->load->view($this->template, $data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */