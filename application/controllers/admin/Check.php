<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check extends CI_Controller {
	
	var $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_check');
		$this->load->model('m_booking');
		$this->load->model('m_jenis');
		$this->load->model('m_grup');
		$this->load->model('m_kamar');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Check-in & Check-out',
			'content' => 'admin/check/index',
			'check' => $this->m_check->read()
		];
		$this->load->view($this->template, $data);
	}

	public function viewCreate($no_ktp=null)
	{
		if (!is_null($no_ktp)) {
			$data = [
			'title' => 'Tambah Data Check-in',
			'content' => 'admin/check/create',
			'grup' => $this->m_grup->read(),
			'jenis' => $this->m_jenis->read(),
			'tgl' => $this->getTgl(),
			'tamu' => $this->m_tamu->readTamu($no_ktp)
		];
		} else {
			$data = [
			'title' => 'Tambah Data Check-in',
			'content' => 'admin/check/create',
			'jenis' => $this->m_jenis->read(),	
			'tgl' => $this->getTgl(),
			'grup' => $this->m_grup->read()
		];
		}
		$this->load->view($this->template, $data);
	}

	public function cariTamu()
	{
		$data = [
			'title' => 'Check-in - Cari Tamu',
			'content' => 'admin/check/cariTamu',
			'tamu' => $this->m_tamu->read()
		];
		$this->load->view($this->template, $data);
	}

	public function get_room(){
		$idclass = $this->input->get('idclass');
		$rooms = $this->m_kamar->read_room($idclass);
		$data = "<option value=''>--Pilih--</option>";
		foreach ($rooms as $list) {
			$data .= "<option value='$list[idrooms]'>$list[numbers]</option>";
		}
		echo $data;
	}

	public function getTgl(){
		$datestring = '%d/%m/%Y';
		$time = time();
		return mdate($datestring, $time);
	}
}

/* End of file check.php */
/* Location: ./application/controllers/check.php */