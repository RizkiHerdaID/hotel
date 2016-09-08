<?php

class Dashboard extends CI_Controller {

	var $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
        if (!$this->authentication->is_loggedin())
        {
            redirect('auth');
        }
        $this->load->model(array('m_jenis', 'm_booking'));
	}

	public function index()
	{
		$content = "front";
	    $data = [
			'title' => 'Dashboard',
			'content' => 'admin/'.$content,
            'daftar_kamar' => $this->m_jenis->group_by_jenis(),
            'daftar_booking' => $this->m_booking->read()
		];
		$this->load->view($this->template, $data);
	}

    public function indexAdminSuper()
    {
        $data = [
            'title' => 'Dashboard',
            'content' => "adminsuper/front"
        ];
        $this->load->view('adminsuper/template', $data);
    }

	public function getTgl(){
		$datestring = '%d/%m/%Y';
		$time = time();
		return mdate($datestring, $time);
	}
}

/* End of file dashboard */
/* Location: ./application/controllers/dashboard */