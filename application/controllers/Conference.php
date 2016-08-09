<?php

class Conference extends CI_Controller {

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