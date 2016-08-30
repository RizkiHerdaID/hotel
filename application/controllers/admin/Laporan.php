<?php 

class Laporan extends CI_Controller {

	var $template = 'admin/template';
	
	public function __construct()
	{
		parent::__construct();
        if (!$this->authentication->is_loggedin())
        {
            redirect('auth');
        }
        $this->load->model('m_check');
        $this->load->model('m_pembayaran', 'm_bayar');
        $this->load->helper(array('dompdf'));
	}

    public function keuangan(){
        $payment = $this->m_bayar->read();
        $data = [
            'title' => "Laporan Keuangan",
            'content' => "admin/laporan/keuangan",
            'payment' => $payment
        ];
        $data = $this->load->view('admin/laporan/keuangan', $data, TRUE);
        cetak_tamu($data);
    }

    public function tamu(){
        $data = [
            'title' => "Laporan Daftar Tamu",
            'content' => "admin/laporan/tamu",
            'check' => $this->m_check->read()
        ];
        $data = $this->load->view('admin/laporan/tamu', $data, TRUE);
        cetak_tamu($data);
    }
}

/* End of file  */
/* Location: ./application/controllers/ */