<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('contact');	
	}

}

/* End of file  */
/* Location: ./application/controllers/ */