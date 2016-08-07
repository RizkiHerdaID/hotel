<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'Admin_Controller.php';
class Dashboard extends Admin_Controller {

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

}

/* End of file dashboard */
/* Location: ./application/controllers/dashboard */