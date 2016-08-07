<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */