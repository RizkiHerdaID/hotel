<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_hakakses extends CI_Model {

	var $table = 'users';
	var $pk = 'user_id';

    var $users_groups = 'users_groups';
    var $groups = 'groups';
    var $hotel = 'hotel';
    var $id_hotel;

	public function __construct()
	{
		parent::__construct();
        $this->load->library('authentication');
        $this->id_hotel = $this->session->userdata('id_hotel');
	}

	public function read($id_user=null, $group_id=null){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($this->users_groups, $this->table.'.user_id = '.$this->users_groups.'.user_id');
		$this->db->join($this->groups, $this->users_groups.'.group_id = '.$this->groups.'.id');
        $this->db->join($this->hotel, $this->hotel.'.id_hotel= '.$this->table.'.id_hotel');
		$this->db->where('active', '1');
        $this->db->where('users.id_hotel', $this->id_hotel);
		if (!is_null($id_user) && !is_null($group_id)) {
			$this->db->where($this->table.'.user_id', $id_user);
			$this->db->where($this->users_groups.'.group_id', $group_id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function create($data, $id_group, $username, $password){
	    $status = false;
        $user_id = $this->authentication->create_user($username, $password, $this->id_hotel);
        if ($user_id !== FALSE)
        {
            $this->db->trans_start();
            $this->db->select('*');
            $this->db->order_by('user_id', 'DESC');
            $this->db->from($this->table);
            $this->db->where('users.id_hotel', $this->id_hotel);
            $this->db->limit('1');
            $user = $this->db->get()->result_array();
            $idTop = 0;
            foreach($user as $list):
                $idTop = $list['user_id'];
                $grup = [
                    'user_id' => $list['user_id'],
                    'group_id' => $id_group,
                    'id_hotel' => $this->id_hotel
                ];
            endforeach;
            $this->db->where('user_id', $idTop);
            $this->db->update($this->table, $data);
            $this->db->insert('users_groups', $grup);
            $this->db->trans_complete();
            $status =  $this->db->trans_status();
        } else {
            $status = $user_id;
        }
        return $status;
    }

	public function update($data, $user_id){
		$this->db->where('user_id', $user_id);
		$result = $this->db->update($this->table, $data);
		return $result;
	}

	public function delete($id)
    {
    	$data = array('active' => '0');
    	$result = $this->db->update($this->table, $data, array('user_id' => $id));
    	return $result;
    }

    public function read_groups(){
        $query = $this->db->get('groups');
        return $query->result_array();
    }

    public function get_detail($id_user=null){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->users_groups, $this->table.'.user_id = '.$this->users_groups.'.user_id');
        $this->db->join($this->groups, $this->users_groups.'.group_id = '.$this->groups.'.id');
        $this->db->join($this->hotel, $this->hotel.'.id_hotel= '.$this->table.'.id_hotel');
        $this->db->where($this->table.'.user_id', $id_user);
        $this->db->where('active', '1');
        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file m_hakakses.php */
/* Location: ./application/models/m_hakakses.php */