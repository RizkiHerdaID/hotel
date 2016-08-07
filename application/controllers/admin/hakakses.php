<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include ('Admin_Controller.php');
class HakAkses extends Admin_Controller {

	var $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['content'] = 'admin/HakAkses/index';
		$this->load->view($this->template, $data);
	}
}

/* End of file datamaster.php */
/* Location: ./application/controllers/datamaster.php */