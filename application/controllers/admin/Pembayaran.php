<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	private $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pembayaran', 'm_bayar');
	}

	public function index(){
		$data = [
			'title' => "Pembayaran",
			'content' => "admin/pembayaran/index",
			'bayar' => $this->m_bayar->read()
		];
		$this->load->view($this->template, $data);
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */