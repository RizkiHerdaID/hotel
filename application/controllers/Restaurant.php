<?php 

class Restaurant extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('restaurant');	
	}

}

/* End of file  */
/* Location: ./application/controllers/ */