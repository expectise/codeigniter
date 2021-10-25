<?
Class ImageFoot_Model extends CI_Model
{
	public function image(){
		
		$this->db->select("*");
		$this->db->from("iconosMain");
		$this->db->where_in('tipo', array(5));
		$this->db->order_by("id", "desc");
		$query = $this->db->get();

			
			if($query->num_rows() > 0)
				{
					return $query->result();
				}else{
					return false;
				}
		
	}
	
	public function GetImage($id){
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
	
	
	
	public function EditarImage($id, $titulo, $archivo){
		$data = array(
	        'titulo' => $titulo,
	        'archivo' => $archivo);
		
		$this->db->where('id', $id);
		$this->db->update('iconosMain', $data);
		
	}

}
?>