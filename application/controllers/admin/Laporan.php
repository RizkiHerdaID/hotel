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
	}

    public function keuangan(){
        $data = [
            'title' => "Laporan Keuangan",
            'content' => "admin/laporan/keuangan",
        ];
        $this->load->view($this->template, $data);
    }

    public function tamu(){
        $data = [
            'title' => "Laporan Daftar Tamu",
            'content' => "admin/laporan/tamu",
        ];
        $this->load->view($this->template, $data);
    }
}

/* End of file  */
/* Location: ./application/controllers/ */