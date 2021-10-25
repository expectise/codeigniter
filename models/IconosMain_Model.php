<?
Class IconosMain_Model extends CI_Model
{
	public function iconos(){
		
		$this->db->select("*");
		$this->db->from("iconosMain");
		$this->db->where_in('tipo', array(1,2,3,4));
		$this->db->order_by("id", "desc");
		$query = $this->db->get();

			
			if($query->num_rows() > 0)
				{
					return $query->result();
				}else{
					return false;
				}
		
	}
	
	public function GetIconoMain($id){
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
	
	
	
	public function EditarIconoMain($id, $titulo, $archivo, $titulo2){
		$data = array(
	        'titulo' => $titulo,
			'titulo2' => $titulo2,
	        'archivo' => $archivo);
		
		$this->db->where('id', $id);
		$this->db->update('iconosMain', $data);
		
	}

}
?>