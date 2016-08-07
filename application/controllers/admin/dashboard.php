<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include ('Admin_Controller.php');
class Dashboard extends Admin_Controller {

	var $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['today'] = $this->getTgl();
		$data['content'] = 'admin/dashboard';
		$this->load->view($this->template, $data);
	}

}

/* End of file dashboard */
/* Location: ./application/controllers/dashboard */