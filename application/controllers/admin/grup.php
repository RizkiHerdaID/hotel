<?php 

class Grup extends CI_Controller {
	
    var $template = 'admin/template';
    
	private $table = 'guest_group';
	private $pk = 'kode';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_grup', 'm_grup');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Grup Tamu',
			'content' => 'admin/grup/index',
			'grup' => $this->m_grup->read()
		];
		$this->load->view($this->template, $data);
	}

    public function details($id){
        $data = [
            'title' => 'Data Detail Grup Tamu',
            'content' => 'admin/grup/detail',
            'grup' => $this->m_grup->read($id)
        ];
        $this->load->view($this->template, $data);
    }

    public function viewUpdate($id){
        $data = [
            'title' => 'Update Data Grup Tamu',
            'content' => 'admin/grup/update',
            'grup' => $this->m_grup->read($id)
        ];
        $this->load->view($this->template, $data);
    }

	public function create(){
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
        	$this->form_validation->set_rules('gcode', 'Kode Grup', 'trim|required|min_length[4]|max_length[5]');
            $this->form_validation->set_rules('gname', 'Nama Grup', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('diskon', 'Nama Depan', 'trim|required|is_natural');
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
                    'kode' => $this->input->post('gcode'),
                    'nama' => $this->input->post('gname'),
                    'diskon' => $this->input->post('diskon')
                ];

                if($this->m_grup->create($data)){
                	$this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Grup Tamu</strong> berhasil ditambah");
                    redirect('admin/grup');
                } else {
                	$data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $data = [
			'title' => 'Data Grup Tamu',
			'content' => 'admin/grup/index',
			'grup' => $this->m_grup->read()
		];
        $this->load->view($this->template, $data);
	}

    public function update(){
        $id_guest_group = $this->input->post('id');
        if($this->input->server('REQUEST_METHOD') == "POST")
        {
            $this->form_validation->set_rules('gname', 'Nama Grup', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('gcode', 'Kode Grup', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('diskon', 'Nama Depan', 'trim|required|is_natural');
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
                    'kode' => $this->input->post('gcode'),
                    'nama' => $this->input->post('gname'),
                    'diskon' => $this->input->post('diskon')
                ];

                if($this->m_grup->update($data, $id_guest_group)){
                    $this->session->set_flashdata("operation", "success");
                    $this->session->set_flashdata("message", "<strong>Grup Tamu</strong> berhasil di update");
                    redirect('admin/grup');
                } else {
                    $data = [
                        "operation" => "warning",
                        "message" => "Maaf. Terjadi kesalahan sistem.",
                    ];
                }
            }
        }

        $data = [
            'title' => 'Update Data Grup Tamu',
            'content' => 'admin/grup/update',
            'grup' => $this->m_grup->read($id_guest_group)
        ];
        $this->load->view($this->template, $data);
    }

	public function delete($id)
    {
        $result = $this->m_grup->delete($id);
        if($result){
            $this->session->set_flashdata("operation", "success");
            $this->session->set_flashdata("message", "<strong>Berhasil</strong> menghapus grup tamu");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalah sistem.");
        }
        redirect("admin/grup");
    }

}

/* End of file  */
/* Location: ./application/controllers/ */