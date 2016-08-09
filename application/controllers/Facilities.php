<?php 

class Facilities extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('facilities');	
	}

}

/* End of file  */
/* Location: ./application/controllers/ */