<?php 

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['today'] = $this->getTgl();
		$this->load->view('home', $data);
	}

	public function error404(){
		$this->load->view('404');
	}

	public function getTgl(){
		$datestring = '%d/%m/%Y';
		$time = time();
		return mdate($datestring, $time);
	}
	
}

/* End of file frontend.php */
/* Location: ./application/controllers/frontend.php */