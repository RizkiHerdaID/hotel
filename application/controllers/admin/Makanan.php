<?php 

class Makanan extends CI_Controller {

	var $template = 'admin/template';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_makanan');
	}

	public function index()
	{
		$data = [
			'content' => 'admin/makanan/index',
			'title' => 'Data Makanan & Minuman',
			'makanan' => $this->m_makanan->read()
		];	
		$this->load->view($this->template, $data);
	}

	public function viewUpdate($id)
	{
		$data = [
			'content' => 'admin/makanan/update',
			'title' => 'Update Data Makanan & Minuman',
			'makanan' => $this->m_makanan->read($id)
		];	
		$this->load->view($this->template, $data);
	}

	public function create(){
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
        	$this->form_validation->set_rules('foodname', 'Nama Makanan', 'trim|required|max_length[40]');
            $this->form_validation->set_rules('price', 'Harga Makanan', 'trim|required|max_length[9]|is_natural');
            $this->form_validation->set_rules('jenis', 'Jenis Makanan', 'required');
          	if ($this->form_validation->run() == FALSE)
            {
            	//ERROR
                $this->session->set_flashdata("errors", validation_errors());
            } 
            else 
            {
            	$data = [
                    'nama' => $this->input->post('foodname'),
                    'harga' => $this->input->post('price'),
                    'jenis_makanan' => $this->input->post('jenis')
                ];

                if($this->m_makanan->create($data)){
                	if ($data['jenis_makanan'] == 0) {
                		$jenis = 'Makanan';
                	} else {
                		$jenis = 'Minuman';
                	}
                	
                	$this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Data ".$jenis."</strong> berhasil ditambah");
                    redirect('admin/makanan');
                } else {
                	$data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $data = [
			'title' => 'Data Makanan dan Minuman',
			'content' => 'admin/makanan/index',
			'makanan' => $this->m_grup->read()
		];
        $this->load->view($this->template, $data);
	}

	public function update(){
		$id = $this->input->post('id');
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
        	$this->form_validation->set_rules('foodname', 'Nama Makanan', 'trim|required|max_length[40]');
            $this->form_validation->set_rules('price', 'Harga Makanan', 'trim|required|max_length[9]|is_natural');
            $this->form_validation->set_rules('jenis', 'Jenis Makanan', 'required');
          	if ($this->form_validation->run() == FALSE)
            {
            	//ERROR
               $this->session->set_flashdata("errors", validation_errors());
            } 
            else 
            {
            	$data = [
                    'nama' => $this->input->post('foodname'),
                    'harga' => $this->input->post('price'),
                    'jenis_makanan' => $this->input->post('jenis')
                ];

                if($this->m_makanan->update($id, $data)){
                	if ($data['jenis_makanan'] == 0) {
                		$jenis = 'Makanan';
                	} else {
                		$jenis = 'Minuman';
                	}
                	
                	$this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Data ".$jenis."</strong> berhasil di update");
                    redirect('admin/makanan');
                } else {
                	$data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $data = [
			'title' => 'Update Data Makanan dan Minuman',
			'content' => 'admin/makanan/update',
			'makanan' => $this->m_grup->read($id)
		];
        $this->load->view($this->template, $data);
	}

	public function delete($id)
    {
        $result = $this->m_makanan->delete($id);
        if($result){
            $this->session->set_flashdata("operation", "success");
            $this->session->set_flashdata("message", "<strong>Berhasil</strong> menghapus data Makanan / Minuman");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalah sistem.");
        }
        redirect("admin/makanan");
    }

}

/* End of file  */
/* Location: ./application/controllers/ */