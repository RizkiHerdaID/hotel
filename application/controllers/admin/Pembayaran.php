<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	private $template = 'admin/template';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pembayaran', 'm_bayar');
        $this->load->model('m_makanan');
        $this->load->model('m_jasa');
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
}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */