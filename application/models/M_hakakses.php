<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_hakakses extends CI_Model {

	var $table = 'users';
	var $pk = 'user_id';

	public function __construct()
	{
		parent::__construct();
		
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

	public function read_groups(){
		$query = $this->db->get('groups');
		return $query->result_array();
	}


	public function create($data, $user_id, $id_group){
		$create = $this->db->insert($this->table, $data);
		$this->db->order_by('user_id', 'DESC');
		$user = $this->db->get($this->table, '1')->result_array();
		foreach($user as $list):
			$data = [
				'user_id' => $list['user_id'],
				'group_id' => $id_group
			];
		endforeach;
		$this->db->insert('users_groups', $data);
		return $create;
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