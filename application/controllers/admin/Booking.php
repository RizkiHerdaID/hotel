<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking extends CI_Controller {
	var $template = 'admin/template';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_booking');
		$this->load->model('m_kamar');
		$this->load->model('m_tamu');
		$this->load->model('m_grup');
		$this->load->model('m_jenis');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Booking',
			'content' => 'admin/booking/index',
			'booking' => $this->m_booking->read()
		];
		$this->load->view($this->template, $data);
	}

	public function viewCreate($id=null)
	{
		if (!is_null($id)) {
			$data = [
			'title' => 'Tambah Data Booking',
			'content' => 'admin/booking/create',
			'grup' => $this->m_grup->read(),
			'jenis' => $this->m_jenis->read(),
			'tgl' => $this->getTgl(),
			'tamu' => $this->m_tamu->readTamu($id)
		];
		} else {
			$data = [
			'title' => 'Tambah Data Booking',
			'content' => 'admin/booking/create',
			'jenis' => $this->m_jenis->read(),	
			'tgl' => $this->getTgl(),
			'grup' => $this->m_grup->read()
		];
		}
		$this->load->view($this->template, $data);
	}

	public function getTgl(){
		$datestring = '%d/%m/%Y';
		$time = time();
		return mdate($datestring, $time);
	}

	public function create(){
		$id = $this->input->post('id');
		$no_ktp = $this->input->post('no_ktp');
		if($this->input->server('REQUEST_METHOD') == "POST")
        {
        	if (is_null($id)) {
        		// Jika Tamu Belum Terdaftar
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
	                if($this->m_tamu->create($data)){
	                	$idTop = $this->m_tamu->readTop();
	                	$class_id = $this->input->post('jenis');
	                	$id = '';
	                	foreach ($idTop as $list) {
	                		$id = $list['id'];
	                		$kode = 'BO'.$list['id'] .''.rand ( 10 , 99 ).'-'. $list['id'] .'-'.rand ( 10 , 99 );
	                	}
	                	$data = [
		                	'kode' => $kode,
		                	'id_guest' => $id,
		                    'class_id' => $class_id,
		                    'check_in' => $this->input->post('check-in'),
		                    'check_out' => $this->input->post('check-out')
	                    ];
	                    if ($this->m_booking->create($data)) {
							$this->session->set_flashdata("operation", "success");
		                    $this->session->set_flashdata("message", "<strong>Data booking</strong> berhasil ditambah");
	                    	redirect('admin/booking');
	                    }
	                }
	            }
	        } else {
	        	// Jika Tamu Pernah Check-in
	        	$id_guest = $this->input->post('id');
	        	$class_id = $this->input->post('jenis');
	            $kode = 'BO'.$id_guest .''.rand ( 10 , 99 ).'-'. $class_id .'-'.rand ( 10 , 99 );
	            $data = [
		        	'kode' => $kode,
		            'id_guest' => $id_guest,
		            'class_id' => $class_id,
		            'check_in' => $this->input->post('check-in'),
		            'check_out' => $this->input->post('check-out')
	            ];
	            if ($this->m_booking->create($data)) {
					$this->session->set_flashdata("operation", "success");
		            $this->session->set_flashdata("message", "<strong>Data booking</strong> berhasil ditambah");
	              	redirect('admin/booking');
	            }

	        }
	    }
        if (!is_null($no_ktp)) {
			$data = [
			'title' => 'Tambah Data Booking',
			'content' => 'admin/booking/create',
			'grup' => $this->m_grup->read(),
			'jenis' => $this->m_jenis->read(),
			'tgl' => $this->getTgl(),
			'tamu' => $this->m_tamu->readTamu($no_ktp)
		];
		} else {
			$data = [
			'title' => 'Tambah Data Booking',
			'content' => 'admin/booking/create',
			'jenis' => $this->m_jenis->read(),
			'tgl' => $this->getTgl(),
			'grup' => $this->m_grup->read()
		];
		}
        $this->load->view($this->template, $data);
	}

    public function delete($id)
    {
        $result = $this->m_booking->delete($id);
        if($result){
            $this->session->set_flashdata("operation", "success");
            $this->session->set_flashdata("message", "<strong>Berhasil</strong> menghapus pengguna");
        }
        else{
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalah sistem.");
        }
        redirect("admin/booking");
    }

	public function cariTamu()
	{
		$data = [
			'title' => 'Booking - Cari Tamu',
			'content' => 'admin/booking/cariTamu',
			'tamu' => $this->m_tamu->read()
		];
		$this->load->view($this->template, $data);
	}
}
/* End of file Booking.php */
/* Location: ./application/controllers/Booking.php */
