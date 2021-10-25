<?
Class Nosotros_Model extends CI_Model
{
	
	public function Nosotros($limit, $start){
			
		$this->db->limit($limit, $start);
		$this->db->order_by("id", "desc");
	
		$query = $this->db->get('nosotros');
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	
	}
	
	
	public function AgregaNosotros($nota, $foto, $tipo){
		
		$datos = array(
				'nota' => $nota,
				'tipo' => $tipo,
				'foto' => $foto
		);
	
		$this->db->insert('nosotros', $datos);
	}
	
	public function EditarNosotros($id, $nota, $foto, $tipo){
	
		$datos = array(
				'nota' => $nota,
				'foto' => $foto,
				'tipo' => $tipo
		);
		
		$this->db->where('id', $id);
	
		$this->db->update('nosotros', $datos);
	}
	
	public function BorrarNosotros($id){
		$this->db->where('id', $id);
		$this->db->delete('nosotros');
	}
	
	public function nosotrosCount(){
		return $this->db->count_all("nosotros");
	}
	
	public function GetNosotros($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from("nosotros");
		$query = $this->db->get();
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
}
?>