<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check extends CI_Controller {

	var $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_check');
		$this->load->model('m_booking');
		$this->load->model('m_jenis');
		$this->load->model('m_grup');
		$this->load->model('m_tamu');
		$this->load->model('m_kamar');
        $this->load->model('m_pembayaran', 'm_bayar');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Check-in & Check-out',
			'content' => 'admin/check/index',
			'check' => $this->m_check->read()
		];
		$this->load->view($this->template, $data);
	}

	public function viewCreate($id=null, $booking=null)
	{
		if ($booking){
			$data = [
				'title' => 'Tambah Data Check-in',
				'content' => 'admin/check/create',
				'grup' => $this->m_grup->read(),
				'jenis' => $this->m_jenis->read(),
				'tgl' => $this->getTgl(),
				'tamu' => $this->m_tamu->readTamu($id),
				'booking' => $this->m_booking->read($id)
			];
		} else {
			if (!is_null($id)) {
				$data = [
					'title' => 'Tambah Data Check-in',
					'content' => 'admin/check/create',
					'grup' => $this->m_grup->read(),
					'jenis' => $this->m_jenis->read(),
					'tgl' => $this->getTgl(),
					'tamu' => $this->m_tamu->readTamu($id)
				];
			} else {
				$data = [
					'title' => 'Tambah Data Check-in',
					'content' => 'admin/check/create',
					'jenis' => $this->m_jenis->read(),
					'tgl' => $this->getTgl(),
					'grup' => $this->m_grup->read()
				];
			}
		}
		$this->load->view($this->template, $data);
	}

	public function getTgl(){
        $datestring = '%Y-%m-%d';
		$time = time();
		return mdate($datestring, $time);
	}

	public function create(){
		$id = $this->input->post('id');
		$no_ktp = $this->input->post('no_ktp');
        $booking_id = $this->input->post('booking_id');
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
			$this->form_validation->set_rules('jenis', 'Jenis Kamar', 'trim|required|is_numeric');
			$this->form_validation->set_rules('kamar', 'Nomor Kamar', 'trim|required|is_numeric');
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata("errors", validation_errors());
			}
			else
			{
				if (is_null($id)) {
				// Jika Tamu Belum Terdaftar

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
						$room = $this->input->post('kamar');
						$id = '';
						foreach ($idTop as $list) {
							$id = $list['id'];
							$kode = 'OR'.$list['id'] .''.rand ( 10 , 99 ).'-'. $list['id'] .'-'.rand ( 10 , 99 );
						}
						$data = [
							'kode' => $kode,
							'guest_id' => $id,
							'class_id' => $class_id,
							'idrooms' => $room,
                            'tgl_order' => $this->getTgl(),
                            'check_in' => $this->getTgl(),
							'check_out' => $this->input->post('check-out')
						];
						if ($this->m_check->create($data)) {
						    if (!is_null($booking_id)){
						        $this->m_booking->delete($booking_id);
                            }
							$this->session->set_flashdata("operation", "success");
							$this->session->set_flashdata("message", "<strong>Data check</strong> berhasil ditambah.<br> Silahkan Approve / Reject terlebih dahulu sebelum check-in dari Menu Approval.");
							redirect('admin/approval');
						}
					}
				} else {
					// Jika Tamu Pernah Check-in
					$id_guest = $this->input->post('id');
					$class_id = $this->input->post('jenis');
					$room = $this->input->post('kamar');
					$kode = 'OR'.$id_guest .''.rand ( 10 , 99 ).'-'. $class_id .'-'.rand ( 10 , 99 );
					$data = [
						'kode' => $kode,
						'guest_id' => $id_guest,
						'class_id' => $class_id,
						'idrooms' => $room,
                        'tgl_order' => $this->getTgl(),
                        'check_in' => $this->getTgl(),
						'check_out' => $this->input->post('check-out')
					];
					if ($this->m_check->create($data)) {
                        if (!is_null($booking_id)){
                            $this->m_booking->delete($booking_id);
                        }
						$this->session->set_flashdata("operation", "success");
						$this->session->set_flashdata("message", "<strong>Data check</strong> berhasil ditambah.<br> Silahkan Approve / Reject terlebih dahulu sebelum check-in dari Menu Approval.");
						redirect('admin/approval');
					}

				}
			}
		}
		if (!is_null($no_ktp)) {
			$data = [
				'title' => 'Tambah Data Check-in',
				'content' => 'admin/check/create',
				'grup' => $this->m_grup->read(),
				'jenis' => $this->m_jenis->read(),
				'tgl' => $this->getTgl(),
				'tamu' => $this->m_tamu->readTamu($no_ktp)
			];
		} else {
			$data = [
				'title' => 'Tambah Data Check-in',
				'content' => 'admin/check/create',
				'jenis' => $this->m_jenis->read(),
				'tgl' => $this->getTgl(),
				'grup' => $this->m_grup->read()
			];
		}
		$this->load->view($this->template, $data);
	}

	public function checkIn($order_id)
	{
		$result = $this->m_check->check_in($order_id);
		if($result){
			$this->session->set_flashdata("operation", "success");
			$this->session->set_flashdata("message", "<strong>Berhasil</strong> check-in");
		}
		else{
			$this->session->set_flashdata("operation", "danger");
			$this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalahan sistem.");
		}
		redirect("admin/check");
	}

	public function checkOut($order_id)
	{
		$result = $this->m_check->check_out($order_id);
		if($result){
			$this->session->set_flashdata("operation", "success");
			$this->session->set_flashdata("message", "<strong>Berhasil</strong> check-out");
		}
		else{
			$this->session->set_flashdata("operation", "danger");
			$this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalahan sistem.");
		}
		redirect("admin/check");
	}

	public function delete($order_id)
	{
		$result = $this->m_check->delete($order_id);
		if($result){
			$this->session->set_flashdata("operation", "success");
			$this->session->set_flashdata("message", "<strong>Berhasil!</strong> Data di hapus");
		} else {
			$this->session->set_flashdata("operation", "danger");
			$this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalahan sistem.");
		}
		redirect("admin/check");
	}

		public function bayar($order_id)
	{
		$result = $this->m_check->bayar($order_id);
		if($result){
			$this->session->set_flashdata("operation", "success");
			$this->session->set_flashdata("message", "<strong>Berhasil!</strong> Pembayaran berhasil tercatat");
		} else {
			$this->session->set_flashdata("operation", "danger");
			$this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalahan sistem.");
		}
		redirect("admin/check");
	}


	public function cariTamu()
	{
		$data = [
			'title' => 'Check-in - Cari Tamu',
			'content' => 'admin/check/cariTamu',
			'tamu' => $this->m_tamu->read_tamu()
		];
		$this->load->view($this->template, $data);
	}

	public function get_room(){
		$idclass = $this->input->get('idclass');
		$rooms = $this->m_kamar->read_room($idclass);
		if ($rooms) {
			$data = "<option value=''>----Pilih Nomor Kamar----</option>";
			foreach ($rooms as $list) {
				$data .= "<option value='$list[idrooms]'>$list[numbers]</option>";
			}
		} else {
			$data = "<option value=''>----Kamar Tidak Ada----</option>";
		}

		echo $data ;
	}

	public function payment(){
		$payment_id = $this->input->get('payment_id');
		$order = $this->m_bayar->read($payment_id);
		$data = 0;
		foreach ($order as $list) {
			$data = 'Rp. ' . number_format($list['payment_total'], '0' , '' , '.' ) . ',-';;
		}

		echo $data;
	}


}

/* End of file check.php */
/* Location: ./application/controllers/check.php */