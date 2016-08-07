<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facilities extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Facilities');	
	}

}

/* End of file  */
/* Location: ./application/controllers/ */