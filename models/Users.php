<?
Class Users extends CI_Model
	{
		public function login($username, $password){
			
			$this->db->select('id, user, password');
			$this->db-> from('users');
			$this->db-> where('user', $username);
			$this->db-> where('password', $password);
			$this->db-> limit(1);
			
			$query = $this->db->get();
			
			if($query->num_rows() == 1)
				{
					return $query->result();
				}else{
					return false;
				}
		}
	}
?>