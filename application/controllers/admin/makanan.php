<?php 

class Makanan extends CI_Controller {

	var $template = 'admin/template';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_makanan');
	}

	public function index()
	{
		$data = [
			'content' => 'admin/makanan/index',
			'title' => 'Makanan & Minuman',
			'makanan' => $this->m_makanan->read()
		];	
		$this->load->view($this->template, $data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */