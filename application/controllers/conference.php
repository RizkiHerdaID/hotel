<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conference extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('conference');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */