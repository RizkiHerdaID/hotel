<?php 

class Jasa extends CI_Controller {

	var $template = 'admin/template';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jasa');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Jasa',
			'content' => 'admin/jasa/index',
			'jasa' => $this->m_jasa->read()
		];
		$this->load->view($this->template, $data);
	}

	public function viewUpdate($id)
	{
		$data = [
			'title' => 'Update Data Jasa',
			'content' => 'admin/jasa/update',
			'jasa' => $this->m_jasa->read($id)
		];
		$this->load->view($this->template, $data);
	}

	public function create(){
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
        	$this->form_validation->set_rules('servicename', 'Nama Jasa', 'trim|required|max_length[40]');
            $this->form_validation->set_rules('price', 'Harga', 'trim|required|is_natural');
            $this->form_validation->set_rules('jenis', 'Jenis Jasa', 'trim|required|is_natural');
          	if ($this->form_validation->run() == FALSE)
            {
            	//ERROR
                $this->session->set_flashdata("errors", validation_errors());
            } 
            else 
            {
            	$data = [
                    'nama' => $this->input->post('servicename'),
                    'harga' => $this->input->post('price'),
                    'jenis' => $this->input->post('jenis')
                ];

                if($this->m_jasa->create($data)){
                	$this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Jasa</strong> berhasil ditambah");
                    redirect('admin/jasa');
                } else {
                	$data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $data = [
			'title' => 'Data Jasa',
			'content' => 'admin/jasa/index',
			'jasa' => $this->m_jasa->read()
		];
        $this->load->view($this->template, $data);
	}

	public function update(){
		$id = $this->input->post('id_service');
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
        	$this->form_validation->set_rules('servicename', 'Nama Jasa', 'trim|required|max_length[40]');
            $this->form_validation->set_rules('price', 'Harga', 'trim|required|is_natural');
            $this->form_validation->set_rules('jenis', 'Jenis Jasa', 'trim|required|is_natural');
          	if ($this->form_validation->run() == FALSE)
            {
            	//ERROR
                $this->session->set_flashdata("errors", validation_errors());
            } 
            else 
            {
            	$nama = $this->input->post('servicename');
            	$harga = $this->input->post('price');
            	$jenis = $this->input->post('jenis');
            	$data = [
                    'nama' => $nama,
                    'harga' => $harga,
                    'jenis' => $jenis
                ];

                if($this->m_jasa->update($data, $id)){
                	$this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Jasa</strong> berhasil ditambah");
                    redirect('admin/jasa');
                } else {
                	$data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $data = [
			'title' => 'Data Jasa',
			'content' => 'admin/jasa/update',
			'jasa' => $this->m_jasa->read($id),
		];
        $this->load->view($this->template, $data);
	}

	public function delete($id)
    {
        $result = $this->m_jasa->delete($id);
        if($result){
            $this->session->set_flashdata("operation", "success");
            $this->session->set_flashdata("message", "<strong>Berhasil</strong> menghapus data jasa");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalah sistem.");
        }
        redirect("admin/jasa");
    }
}

/* End of file jasa.php */
/* Location: ./application/controllers/jasa.php */