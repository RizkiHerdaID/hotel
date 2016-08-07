<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include ('Frontend_Controller.php');
class Booking extends Frontend_Controller {

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