<?
Class Fotos_Model extends CI_Model
{
	public function foto($limit, $start){
		
		$this->db->limit($limit, $start);
		$this->db->order_by("id", "desc");
		
		$query = $this->db->get('fotos');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
		
	}
	
	
	public function fotoCount(){
		return $this->db->count_all("fotos");
	}
	
	public function AgregaFoto($titulo, $archivo){
		$datos = array('titulo' => $titulo, 'archivo' => $archivo);
		
		$this->db->insert('fotos', $datos);
		
	}
	
	public function EditarFoto($id, $titulo, $archivo){
		$data = array(
				'titulo' => $titulo,
				'archivo' => $archivo);
		
		$this->db->where('id', $id);
		$this->db->update('fotos', $data);
		
	}
	
	
	
	public function GetFoto($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from("fotos");
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function BorrarFoto($id){
		$this->db->where('id', $id);
		$this->db->delete('fotos');
	}
}
?>