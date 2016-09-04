<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_approve extends CI_Model
{

    private $table = 'order';
    private $pk = 'order_id';
    private $join = 'guest';
    private $join2 = 'class';
    private $join5 = 'guest_group';
    private $id_hotel;

    public function __construct()
    {
        parent::__construct();
        $this->id_hotel = $this->session->userdata('id_hotel');
    }

    public function read($id = null)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->join, $this->table . '.guest_id = ' . $this->join . '.id');
        $this->db->join($this->join2, $this->table . '.class_id = ' . $this->join2 . '.idclass');
        $this->db->join($this->join5, $this->join.'.kode_grup = '.$this->join5.'.id_guest_group');
        $this->db->where('guest_group.id_hotel', $this->id_hotel);
        if (!is_null($id)) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function approve($order_id){
        $this->db->set('order_status', '1');
        $this->db->where('order_id', $order_id);
        $result = $this->db->update($this->table);
        return $result;
    }

    public function reject($order_id){
        $this->db->set('order_status', '-1');
        $this->db->where('order_id', $order_id);
        $result = $this->db->update($this->table);
        foreach ($result as $list) {
            $this->db->set('check', '0');
            $this->db->where('id', $list['guest_id']);
            $result = $this->db->update('guest');
        }
        return $result;
    }
}