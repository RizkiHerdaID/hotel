<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_check extends CI_Model {

	private $table = 'order';
	private $pk = 'order_id';
	private $join = 'guest';
	private $join2 = 'class';
    private $payment = 'payment';
    private $id_hotel;

	public function __construct()
	{
		parent::__construct();
        $this->id_hotel = $this->session->userdata('id_hotel');
	}

	public function read($id=null){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->join, $this->table.'.guest_id = '.$this->join.'.id');
        $this->db->join($this->payment, $this->table.'.order_id = '.$this->payment.'.order_id');
		$this->db->join($this->join2, $this->table.'.class_id = '.$this->join2.'.idclass');
        $this->db->join('rooms', $this->table.'.idrooms = rooms.idrooms');
        $this->db->join('guest_group', 'guest_group'.'.id_guest_group = '.$this->join.'.kode_grup');
        $this->db->where('guest_group.id_hotel', $this->id_hotel);
		if (!is_null($id)) {
			$this->db->where('id', $id);
		}
        $this->db->order_by('order.order_id', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

    public function readAdminSuper($id=null){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->join, $this->table.'.guest_id = '.$this->join.'.id');
        $this->db->join($this->payment, $this->table.'.order_id = '.$this->payment.'.order_id');
        $this->db->join($this->join2, $this->table.'.class_id = '.$this->join2.'.idclass');
        $this->db->join('rooms', $this->table.'.idrooms = rooms.idrooms');
        $this->db->join('guest_group', 'guest_group'.'.id_guest_group = '.$this->join.'.kode_grup');
        $this->db->join('hotel', 'hotel.id_hotel = guest_group.id_hotel');
        if (!is_null($id)) {
            $this->db->where('id', $id);
        }
        $this->db->order_by('order.order_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function create($data){

		$this->db->insert($this->table, $data);

		$this->db->set('guest_id', $data['guest_id']);
		$this->db->set('status', '1');
		$this->db->where('idrooms', $data['idrooms']);
		$this->db->update('rooms');

		$this->db->set('check', '1');
		$this->db->where('id', $data['guest_id']);
		$this->db->update('guest');

		$idTop = $this->readTop();
        $guest_id = 0;
        $id = 0;
		foreach ($idTop as $list) {
			$id = (string) $list['order_id'];
			$guest_id = (string) $list['guest_id'];
        }
        $kwitansi = 'KW'.$guest_id .rand ( 10 , 99 ) .'-'.rand ( 1000 , 9999 );
        $this->db->set('order_id', $id);
        $this->db->set('kwitansi', $kwitansi);
        $status = $this->db->insert('payment');

        return $status;
	}
	
	public function check_out($order_id){
		$total = 0;
        $this->db->set('check_out', $this->getTgl());
        $this->db->where('order_id', $order_id);
        $this->db->update('order');

		$this->db->trans_start();

		$this->db->set('order_status', '3');
		$this->db->where('order_id', $order_id);
		$this->db->update($this->table);

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->join, $this->table.'.guest_id = '.$this->join.'.id');
        $this->db->join('guest_group', 'guest_group'.'.id_guest_group = '.$this->join.'.kode_grup');
        $this->db->join($this->payment, $this->table.'.order_id = '.$this->payment.'.order_id');
        $this->db->join($this->join2, $this->table.'.class_id = '.$this->join2.'.idclass');
        $this->db->join('rooms', $this->table.'.idrooms = rooms.idrooms');
		$this->db->where('order.order_id', $order_id);
		$payment = $this->db->get()->result_array();

		foreach ($payment as $list){
            $total += $list['payment_total'];

            $check_in = $list['check_in'];
            $check_out = $list['check_out'];
            $rawHari = $this->selisihHari($check_in,$check_out);
            $hari = 0;
            foreach ($rawHari as $hari) {
            	$hari = $hari['day'] * -1;
            }
            if ($hari == 0) {
            	$hari = 1;	
            }
            $hargaSewa = $list['price'] * $hari;
            $diskon = $list['diskon']*0.01;

            $hargaSetelahDiskon = $hargaSewa - ($hargaSewa*$diskon);
            $ppnKamar = $hargaSetelahDiskon * 0.1;
			$ppn = $list['ppn'] + $ppnKamar;

			$total += $hargaSetelahDiskon + $ppnKamar;
            $this->db->set('guest_id', '0');
            $this->db->set('status', '0');
            $this->db->where('idrooms', $list['idrooms']);
            $this->db->update('rooms');

            $this->db->set('day', $hari);
            $this->db->set('payment_room', $hargaSetelahDiskon);
            $this->db->set('ppn', $ppn);
            $this->db->set('payment_total', $total);
            $this->db->where('order_id', $order_id);
            $this->db->update('payment');
        }


        $this->db->trans_complete();
		$status =  $this->db->trans_status();
		return $status;
	}

    public function getTgl(){
        $datestring = '%Y-%m-%d';
        $time = time();
        return mdate($datestring, $time);
    }

    public function selisihHari($check_in, $check_out){
        $query = $this->db->query("Select DATEDIFF('".$check_in."','".$check_out."') as day");

        return $query->result_array();
    }

	public function check_in($order_id)
	{
		$this->db->set('order_status', '2');
		$this->db->where('order_id', $order_id);
		$result = $this->db->update($this->table);
		return $result;
	}

	public function delete($order_id)
	{
		$this->db->where('order_id', $order_id);
		$result = $this->db->delete('order');
		return $result;
	}

	 public function order($order_id){
		$this->db->select('*');
		$this->db->where('order_id', $order_id);
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result_array();
	}

	 public function readTop(){
		$this->db->select('*');
         $this->db->from($this->table);
         $this->db->join($this->join, $this->table.'.guest_id = '.$this->join.'.id');
         $this->db->order_by('order.order_id', 'desc');
         $this->db->limit(1);
         $query = $this->db->get();
		return $query->result_array();
	}
}

/* End of file M_check.php */
/* Location: ./application/models/M_check.php */

