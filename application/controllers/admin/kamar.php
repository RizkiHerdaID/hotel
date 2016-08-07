<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kamar extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kamar');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Kamar',
			'content' => 'admin/kamar/index',
			'kamar' => $this->m_kamar->read()
		];
		$this->load->view($this->template, $data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */