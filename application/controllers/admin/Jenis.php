<?php 

class Jenis extends CI_Controller {

	var $template = 'admin/template';
	
	public function __construct()
	{
		parent::__construct();
        if (!$this->authentication->is_loggedin())
        {
            redirect('auth');
        }
		$this->load->model('m_jenis');
        $this->load->model('m_jasa');
	}

	public function index()
	{	
		$facilities = ['AC', 'TV', 'Hot Water', 'Kulkas'];
		$data = [
			'title' => 'Data Jenis Kamar',
			'content' => 'admin/jenis/index',
			'jenis' => $this->m_jenis->read(),
			'tahun' => $this->getTahun(),
			'facilities' => $this->m_jasa->read_jk()
		];
		$this->load->view($this->template, $data);
	}

	public function details($id){
        $data = [
            'title' => 'Detail Data Jenis Kamar',
            'content' => 'admin/jenis/detail',
            'jenis' => $this->m_jenis->read($id)
        ];
        $this->load->view($this->template, $data);
    }

	public function viewUpdate($id){
		$facilities = ['AC', 'TV', 'Hot Water', 'Kulkas'];
        $data = [
            'title' => 'Update Data Jenis Kamar',
            'content' => 'admin/jenis/update',
            'jenis' => $this->m_jenis->read($id),
            'tahun' => $this->getTahun(),
            'facilities' => $this->m_jasa->read_jk()
        ];
        $this->load->view($this->template, $data);
    }    

    public function create(){
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
        	$this->form_validation->set_rules('kode', 'Kode Jenis', 'trim|required|min_length[4]|max_length[6]');
            $this->form_validation->set_rules('jenis', 'Nama Jenis Kamar', 'trim|required|max_length[40]');
            $this->form_validation->set_rules('harga', 'Harga Kamar', 'required|max_length[100]|is_natural');
            $this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[4]|is_natural');

          	if ($this->form_validation->run() == FALSE)
            {
            	//ERROR
               $this->session->set_flashdata("errors", validation_errors());
            } 
            else 
            {	
            	$facilities = $this->input->post('facilities');
            	$data = [
                    'kode_jenis' => $this->input->post('kode'),
                    'title' => $this->input->post('jenis'),
                    'price' => $this->input->post('harga'),
                    'tahun' => $this->input->post('tahun'),
                    'fasilitas' => implode(",", $facilities) 
                ];
                
                if($this->m_jenis->create($data)) {
                	$this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Data Jenis Kamar</strong> berhasil ditambah");
                    redirect('admin/jenis');
                } else {
                	$data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $facilities = ['AC', 'TV', 'Hot Water', 'Kulkas'];
        $data = [
			'title' => 'Data Tamu',
			'content' => 'admin/jenis/index',
			'jenis' => $this->m_jenis->read(),
			'tahun' => $this->getTahun(),
			'facilities' => $facilities
		];
        $this->load->view($this->template, $data);
	}

	public function update(){
		$idclass = $this->input->post('idclass');
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
            $this->form_validation->set_rules('jenis', 'Nama Jenis Kamar', 'trim|required|max_length[40]');
            $this->form_validation->set_rules('harga', 'Harga Kamar', 'required|max_length[100]|is_natural');
            $this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[4]|is_natural');

          	if ($this->form_validation->run() == FALSE)
            {
            	$this->session->set_flashdata("errors", validation_errors());
            } 
            else 
            {	
            	$facilities = $this->input->post('facilities');
            	$data = [
                    'title' => $this->input->post('jenis'),
                    'price' => $this->input->post('harga'),
                    'tahun' => $this->input->post('tahun'),
                    'fasilitas' => implode(",", $facilities) 
                ];
                if($this->m_jenis->update($idclass, $data)) {
                	$this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Data Jenis Kamar</strong> berhasil di update");
                    redirect('admin/jenis');
                } else {
                	$data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $facilities = ['AC', 'TV', 'Hot Water', 'Kulkas'];
        $data = [
			'title' => 'Data Tamu',
			'content' => 'admin/jenis/update',
			'jenis' => $this->m_jenis->read($idclass),
			'tahun' => $this->getTahun(),
			'facilities' => $facilities
		];
        $this->load->view($this->template, $data);
	}

	public function delete($id)
    {
        $result = $this->m_jenis->delete($id);
        if($result){
            $this->session->set_flashdata("operation", "success");
            $this->session->set_flashdata("message", "<strong>Berhasil</strong> menghapus data Jenis Kamar");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalah sistem.");
        }
        redirect("admin/jenis");
    }

    public function getTahun(){
		$datestring = '%Y';
		$time = time();
		return mdate($datestring, $time);
	}
}

/* End of file  */
/* Location: ./application/controllers/ */