<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

	private $table = 'payment';
	private $pk = 'payment_id';
	private $join = 'order';
	private $join2 = 'class';
	private $join3 = 'guest';
	private $join4 = 'rooms';
	private $join5 = 'guest_group';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function read($payment_id=null){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->join, $this->table.'.order_id = '.$this->join.'.order_id');
		$this->db->join($this->join2, $this->join.'.class_id = '.$this->join2.'.idclass');
		$this->db->join($this->join3, $this->join3.'.id = '.$this->join.'.guest_id');
		$this->db->join($this->join4, $this->join4.'.idrooms = '.$this->join.'.idrooms');
		$this->db->join($this->join5, $this->join3.'.kode_grup = '.$this->join5.'.id_guest_group');
		if (!is_null($payment_id)) {
			$this->db->where('payment_id', $payment_id);
		}
        $this->db->order_by('order.order_id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
    public function list_pesanan($payment_id=null)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('payment_detail', $this->table . '.payment_id = payment_detail.payment_id');
        $this->db->join('foods', 'payment_detail.id_food_service= foods.id_food');
        $this->db->where('payment.payment_id', $payment_id);
        $this->db->where('payment_detail.tipe', '1');
        $this->db->order_by('payment_detail.id_payment_detail');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function list_jasa($payment_id=null)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('payment_detail', $this->table . '.payment_id = payment_detail.payment_id');
        $this->db->join('services', 'payment_detail.id_food_service= services.id_service');
        $this->db->where('payment.payment_id', $payment_id);
        $this->db->where('payment_detail.tipe', '2');
        $this->db->order_by('payment_detail.id_payment_detail');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function insert_food($data){
        $this->db->trans_start();
        $this->db->insert('payment_detail', $data);
        $topPesanan = $this->topPesanan();
        foreach ($topPesanan as $pesanan){
            $payment_id = $pesanan['payment_id'];
            $ppn = $pesanan['ppn'];
            $total = $pesanan['total'];

            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('payment_id', $payment_id);
            $payment = $this->db->get()->result_array();
            foreach ($payment as $pay){
                $ppn_pay = $pay['ppn'];
                $total_pay = $pay['payment_total'];
                $ppn_pay += $ppn;
                $total_pay += $total;
                $this->db->set('ppn', $ppn_pay);
                $this->db->set('payment_total', $total_pay);
                $this->db->where('payment_id', $payment_id);
                $this->db->update('payment');
            }
        }
        $this->db->trans_complete();
        $status =  $this->db->trans_status();
        return $status;
    }

    public function insert_service($data){
        $this->db->trans_start();
        $this->db->insert('payment_detail', $data);
        $topPesanan = $this->topPesanan();
        foreach ($topPesanan as $pesanan){
            $payment_id = $pesanan['payment_id'];
            $ppn = $pesanan['ppn'];
            $total = $pesanan['total'];

            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('payment_id', $payment_id);
            $payment = $this->db->get()->result_array();
            foreach ($payment as $pay){
                $ppn_pay = $pay['ppn'];
                $total_pay = $pay['payment_total'];
                $ppn_pay += $ppn;
                $total_pay += $total;
                $this->db->set('ppn', $ppn_pay);
                $this->db->set('payment_total', $total_pay);
                $this->db->where('payment_id', $payment_id);
                $this->db->update('payment');
            }
        }
        $this->db->trans_complete();
        $status =  $this->db->trans_status();
        return $status;
    }

    public function topPesanan(){
        $this->db->select('*');
        $this->db->from('payment_detail');
        $this->db->order_by('payment_detail.id_payment_detail', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function harga_makanan($id_food){
        $this->db->select('*');
        $this->db->from('foods');
        $this->db->where('id_food', $id_food);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function harga_jasa($id_service){
        $this->db->select('*');
        $this->db->from('services');
        $this->db->where('id_service', $id_service);
        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file M_pembayaran.php */
/* Location: ./application/models/M_pembayaran.php */
