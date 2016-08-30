<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	private $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
        if (!$this->authentication->is_loggedin())
        {
            redirect('auth');
        }
		$this->load->model('m_pembayaran', 'm_bayar');
        $this->load->model('m_makanan');
        $this->load->model('m_jasa');
        $this->load->helper(array('dompdf', 'file'));
    }

	public function index(){
        $payment = $this->m_bayar->read();
        $data = [
			'title' => "Pembayaran",
			'content' => "admin/pembayaran/index",
			'payment' => $payment
		];
		$this->load->view($this->template, $data);
	}

    public function bayar($order_id, $kwitansi = NULL)
    {
        $result = $this->m_bayar->bayar($order_id);
        if ($result[0]) {
            $this->payment(TRUE, $result[1], $result[2]);
            $this->session->set_flashdata("operation", "success");
            $this->session->set_flashdata("message", "<strong>Berhasil!</strong> Pembayaran berhasil tercatat");
        } else {
            $this->session->set_flashdata("operation", "danger");
            $this->session->set_flashdata("message", "<strong>Gagal</strong> Terjadi kesalahan sistem.");
        }
        redirect("admin/pembayaran");
    }

    public function payment($cetak = FALSE, $payment_id = NULL, $kwitansi = NULL)
    {
        if(is_null($payment_id)){
            $payment_id = $this->input->get('payment_id');
        }
        $content = [
            'title' => 'Harga',
            'hargaSewa' => $this->m_bayar->read($payment_id),
            'foods' => $this->m_bayar->list_pesanan($payment_id),
            'services' => $this->m_bayar->list_jasa($payment_id),
            'kwitansi' => $kwitansi
        ];

        if ($cetak){
            $data = $this->load->view('admin/pembayaran/cetak', $content, TRUE);
            cetak_pdf($data, 'B7', $kwitansi);
        } else {
            $data = $this->load->view('admin/pembayaran/list_pembayaran', $content);
            return $data;
        }
    }

    public function piutang(){
        $payment = $this->m_bayar->read();
        $data = [
            'title' => "Piutang",
            'content' => "admin/pembayaran/piutang",
            'payment' => $payment
        ];
        $this->load->view($this->template, $data);
    }

    public function foods($payment_id){
        $data = [
            'payment_id' => $payment_id,
            'daftar' => $this->m_bayar->list_pesanan($payment_id),
            'foods' => $this->m_makanan->read(),
            'title' => "Pesan Makanan / Minuman",
            'content' => "admin/pembayaran/foods",
        ];
        $this->load->view($this->template, $data);
    }

    public function services($payment_id){
        $data = [
            'payment_id' => $payment_id,
            'daftar' => $this->m_bayar->list_jasa($payment_id),
            'services' => $this->m_jasa->read(),
            'title' => "Tambahan Jasa",
            'content' => "admin/pembayaran/services",
        ];
        $this->load->view($this->template, $data);
    }

    public function simpan_makanan(){
        $payment_id = $this->input->post('payment_id');
        $food = $this->input->post('food');
        $harga = $this->m_bayar->harga_makanan($food);
        foreach ($harga as $list){
            $harga = $list['harga'];
        }
        $jumlah = $this->input->post('jumlah');
        $temp = $harga * $jumlah;
        $ppn = $temp * 0.1;
        $total = $temp + $ppn;
        $data = [
            'payment_id' => $payment_id,
            'tipe' => '1',
            'id_food_service' => $food,
            'jumlah' => $jumlah,
            'ppn' => $ppn,
            'total' => $total
        ];
        $this->m_bayar->insert_food($data);
        redirect('admin/pembayaran/foods/'.$payment_id);
    }

    public function simpan_jasa(){
        $payment_id = $this->input->post('payment_id');
        $service = $this->input->post('service');
        $harga = $this->m_bayar->harga_jasa($service);
        foreach ($harga as $list){
            $harga = $list['harga'];
        }
        $jumlah = $this->input->post('jumlah');
        $temp = $harga * $jumlah;
        $ppn = $temp * 0.1;
        $total = $temp + $ppn;
        $data = [
            'payment_id' => $payment_id,
            'tipe' => '2',
            'id_food_service' => $service,
            'jumlah' => $jumlah,
            'ppn' => $ppn,
            'total' => $total
        ];
        $this->m_bayar->insert_service($data);
        redirect('admin/pembayaran/services/'.$payment_id);
    }

    public function getTgl()
    {
        $datestring = '%Y-%m-%d';
        $time = time();
        return mdate($datestring, $time);
    }
}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */