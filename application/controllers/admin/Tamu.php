<?php 

class Tamu extends CI_Controller {

    var $template = 'admin/template';
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tamu', 'm_tamu');
		$this->load->model('m_grup', 'm_grup');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Tamu',
			'content' => 'admin/tamu/index',
			'tamu' => $this->m_tamu->read(),
			'grup' => $this->m_grup->read()
		];
		$this->load->view($this->template, $data);
	}

	public function details($id){
        $data = [
            'title' => 'Detail Data Tamu',
            'content' => 'admin/tamu/detail',
            'detail' => $this->m_tamu->read($id),
            'grup' => $this->m_grup->read()
        ];
        $this->load->view($this->template, $data);
    }

	public function viewUpdate($id){
        $data = [
            'title' => 'Update Data Tamu',
            'content' => 'admin/tamu/update',
            'tamu' => $this->m_tamu->read($id),
            'grup' => $this->m_grup->read()
        ];
        $this->load->view($this->template, $data);
    }    

	public function create(){
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
        	$this->form_validation->set_rules('ktp', 'KTP', 'trim|required|min_length[8]|max_length[30]');
            $this->form_validation->set_rules('fname', 'Nama Depan', 'trim|required');
            $this->form_validation->set_rules('lname', 'Nama Belakang', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');
            $this->form_validation->set_rules('phone', 'Telepon / HP', 'trim|required|is_natural|max_length[20]');
            $this->form_validation->set_rules('country', 'Negara', 'required');
            $this->form_validation->set_rules('address', 'Alamat', 'required');
            $this->form_validation->set_rules('province', 'Provinsi', 'required');
            $this->form_validation->set_rules('city', 'Kota / Kabupaten', 'required');
            $this->form_validation->set_rules('zipcode', 'Kode Pos', 'required|is_natural');
            $this->form_validation->set_rules('gcode', 'Kode Grup Tamu', 'trim|required');

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
            	$data = [
                    'no_ktp' => $this->input->post('ktp'),
                    'nama_depan' => $this->input->post('fname'),
                    'nama_belakang' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'telepon' => $this->input->post('phone'),
                    'alamat' => $this->input->post('address'),
                    'kota' => $this->input->post('city'),
                    'provinsi' => $this->input->post('province'),
                    'negara' => $this->input->post('country'),
                    'zip' => $this->input->post('zipcode'),
                    'kode_grup' => $this->input->post('gcode')
                ];
                
                if($this->m_tamu->create($data)) {
                	$this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Data Tamu</strong> berhasil ditambah");
                    redirect('admin/tamu');
                } else {
                	$data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $data = [
			'title' => 'Data Tamu',
			'content' => 'admin/tamu/index',
			'tamu' => $this->m_tamu->read(),
			'grup' => $this->m_grup->read()
		];
        $this->load->view($this->template, $data);
	}

	public function update(){
		$id = $this->input->post('id');
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
        	$this->form_validation->set_rules('id', 'ID Tamu', 'required|is_natural');
        	$this->form_validation->set_rules('ktp', 'KTP', 'trim|required|min_length[8]|max_length[30]');
            $this->form_validation->set_rules('fname', 'Nama Depan', 'trim|required');
            $this->form_validation->set_rules('lname', 'Nama Belakang', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');
            $this->form_validation->set_rules('phone', 'Telepon / HP', 'trim|required|is_natural|max_length[20]');
            $this->form_validation->set_rules('country', 'Negara', 'required');
            $this->form_validation->set_rules('address', 'Alamat', 'required');
            $this->form_validation->set_rules('province', 'Provinsi', 'required');
            $this->form_validation->set_rules('city', 'Kota / Kabupaten', 'required');
            $this->form_validation->set_rules('zipcode', 'Kode Pos', 'required|is_natural');
            $this->form_validation->set_rules('gcode', 'Kode Grup Tamu', 'trim|required');

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
            	$data = [
                    'no_ktp' => $this->input->post('ktp'),
                    'nama_depan' => $this->input->post('fname'),
                    'nama_belakang' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'telepon' => $this->input->post('phone'),
                    'alamat' => $this->input->post('address'),
                    'kota' => $this->input->post('city'),
                    'provinsi' => $this->input->post('province'),
                    'negara' => $this->input->post('country'),
                    'zip' => $this->input->post('zipcode'),
                    'kode_grup' => $this->input->post('gcode')
                ];
                
                if($this->m_tamu->update($id, $data)) {
                	$this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Data Tamu</strong> berhasil di update");
                    redirect('admin/tamu');
                } else {
                	$data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $data = [
			'title' => 'Update Data Tamu',
			'content' => 'admin/tamu/update',
			'tamu' => $this->m_tamu->read($id),
			'grup' => $this->m_grup->read()
		];
        $this->load->view($this->template, $data);
	}

	 public function delete($id)
    {
        $result = $this->m_tamu->delete($id);
        if($result){
            $this->session->set_flashdata("operation", "success");
            $this->session->set_flashdata("message", "<strong>Berhasil</strong> menghapus data tamu");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalah sistem.");
        }
        redirect("admin/tamu");
    }
}

/* End of file tamu.php */
/* Location: ./application/controllers/tamu.php */