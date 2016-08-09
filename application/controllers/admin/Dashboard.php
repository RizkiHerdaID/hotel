<?php

class Dashboard extends CI_Controller {
	
	var $template = 'admin/template';
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'today' => $this->getTgl(),
			'title' => 'Dashboard',
			'content' => 'admin/dashboard'
		];
		$this->load->view($this->template, $data);
	}

	public function getTgl(){
		$datestring = '%d/%m/%Y';
		$time = time();
		return mdate($datestring, $time);
	}
}

/* End of file dashboard */
/* Location: ./application/controllers/dashboard */