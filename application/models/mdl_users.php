<?php
class Mdl_users extends CI_Model{

    function get_table() {
        $table = "users";
        return $table;
    }

    public function validate(){
        $table = $this->get_table();
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5(sha1($this->input->post('password'))));
        $query = $this->db->get($table);
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
	
	public function add_user($key){
        $table = $this->get_table();
		$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => md5(sha1($this->input->post('password'))),
			'key' => $key
		);
		$query = $this->db->insert($table, $data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}

    function get_all_users(){
        $table = $this->get_table();
        $query = $this->db->get($table);
        return $query;
    }

    public function get_logged_in_user_data($username){
        $table = $this->get_table();
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return $query;
        }else{
            return false;
        }
    }

    public function get_user_details($username){
        $table = $this->get_table();
        $this->db->where('username', $username);
        $query = $this->db->get($table);

        if($query->num_rows() == 1){
            return $query;
        }else{
            return false;
        }
    }
	
	public function is_key_valid($key){
        $table = $this->get_table();
		$this->db->where('key', $key);
		$query = $this->db->get($table);
		
		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
	
	public function confirm_update($key){

		$data = array(
			'active' => 1,
            'role' => 1,
			'key' => random_string('unique')
		);
		$this->db->update('users', $data, array('key' => $key));
		return true;
	}

    public function get_profile($username){
        $table = $this->get_table();
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return $query;
        }else{
            return false;
        }
    }

    public function update_profile($username){
        $table = $this->get_table();
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname')
        );
        $this->db->where('username', $username);
        $this->db->update($table, $data);
        return true;
    }

    public function update_password($username){
        $table = $this->get_table();
        $data = array(
            'password' => md5(sha1($this->input->post('password')))
        );
        $this->db->where('username', $username);
        $this->db->update($table, $data);
        return true;
    }

    public function isAdmin($username){
        $table = $this->get_table();
        $this->db->where('username', $username);
        $this->db->where('role', 100);
        $query = $this->db->get($table);
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
}

