<?
Class RedesSociales_Model extends CI_Model
{
	public function redes(){
		
		$this->db->select("*");
		$this->db->from("iconosMain");
		$this->db->where_in('tipo', array(7,8,9));
		$this->db->order_by("id", "desc");
		$query = $this->db->get();

			
			if($query->num_rows() > 0)
				{
					return $query->result();
				}else{
					return false;
				}
		
	}
	
	public function GetRedes($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from("iconosMain");
		$query = $this->db->get();
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	
	
	public function EditarRedes($id, $titulo, $url){
		$data = array(
	        'titulo' => $titulo,
			'url' => $url
		);
		
		$this->db->where('id', $id);
		$this->db->update('iconosMain', $data);
		
	}

}
?>