<?php 

class Kamar extends CI_Controller {

	var $template = 'admin/template';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kamar');
		$this->load->model('m_jenis');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Kamar',
			'content' => 'admin/kamar/index',
			'kamar' => $this->m_kamar->read(),
			'jenis' => $this->m_jenis->read()
		];
		$this->load->view($this->template, $data);
	}

	public function details($id){
        $data = [
            'title' => 'Detail Data kamar',
            'content' => 'admin/kamar/detail',
            'kamar' => $this->m_kamar->read($id)
        ];
        $this->load->view($this->template, $data);
    }

	public function create(){
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
        	$this->form_validation->set_rules('no_room', 'Nomor Kamar', 'trim|required|max_length[5]');
            $this->form_validation->set_rules('jenis', 'Jenis Kamar', 'trim|required|is_natural');
          	if ($this->form_validation->run() == FALSE)
            {
            	//ERROR
                $data = [
                    "operation" => "warning",
                    "message" => validation_errors()
                ];
            } 
            else 
            {
            	$idclass = $this->input->post('jenis');
            	$numbers = $this->input->post('no_room');
            	$data = [
                    'numbers' => $numbers,
                    'idclass' => $idclass,
                ];

                if($this->m_kamar->create($data)){
                	$this->session->set_flashdata("jenis", $idclass);
                	$this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Kamar Tamu dengan nomor ".$numbers." </strong> berhasil ditambah");
                    redirect('admin/kamar');
                } else {
                	$data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $data = [
			'title' => 'Data Kamar',
			'content' => 'admin/kamar/index',
			'kamar' => $this->m_kamar->read(),
			'jenis' => $this->m_jenis->read()
		];
        $this->load->view($this->template, $data);
	}

	public function delete($id)
    {
        $result = $this->m_kamar->delete($id);
        if($result){
            $this->session->set_flashdata("operation", "success");
            $this->session->set_flashdata("message", "<strong>Berhasil</strong> menghapus data kamar");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalah sistem.");
        }
        redirect("admin/kamar");
    }
}

/* End of file  */
/* Location: ./application/controllers/ */