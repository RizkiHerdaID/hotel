<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_hakakses extends CI_Model {

	var $table = 'users';
	var $pk = 'user_id';

	public function __construct()
	{
		parent::__construct();
        $this->load->library('authentication');
		
	}

	public function read($id_user=null, $group_id=null){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('users_groups', 'users.user_id = users_groups.user_id');
		$this->db->join('groups', 'users_groups.group_id = groups.id');
		$this->db->where('active', '1');
		if (!is_null($id_user) && !is_null($group_id)) {
			$this->db->where('users.user_id', $id_user);
			$this->db->where('users_groups.group_id', $group_id);
		}
		$this->db->order_by('users_groups.group_id', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

    public function get_group($id_user=null){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('users_groups', 'users.user_id = users_groups.user_id');
        $this->db->join('groups', 'users_groups.group_id = groups.id');
        $this->db->where('active', '1');
        $this->db->where('users.user_id', $id_user);
        $this->db->order_by('users_groups.group_id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function read_groups(){
		$query = $this->db->get('groups');
		return $query->result_array();
	}


	public function create($data, $id_group, $username, $password){
	    $status = false;
        $user_id = $this->authentication->create_user($username, $password);
        if ($user_id !== FALSE)
        {
            $this->db->trans_start();
            $this->db->select('*');
            $this->db->order_by('user_id', 'DESC');
            $this->db->from($this->table);
            $this->db->limit('1');
            $user = $this->db->get()->result_array();
            $idTop = 0;
            foreach($user as $list):
                $idTop = $list['user_id'];
                $grup = [
                    'user_id' => $list['user_id'],
                    'group_id' => $id_group
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

}

/* End of file m_hakakses.php */
/* Location: ./application/models/m_hakakses.php */