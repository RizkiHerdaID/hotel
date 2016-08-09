<?php 

class Booking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('booking');
	}

}

/* End of file  */
/* Location: ./application/controllers/ */