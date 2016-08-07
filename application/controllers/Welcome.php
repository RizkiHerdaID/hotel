<?php 

class Welcome extends Frontend_Controller {

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

	
}

/* End of file frontend.php */
/* Location: ./application/controllers/frontend.php */