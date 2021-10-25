<?
Class Rotador_Model extends CI_Model
{
	public function rotador($limit, $start){
			
		$this->db->limit($limit, $start);
		$this->db->order_by("id", "desc");

		$query = $this->db->get('rotador_imagenes');
			
			if($query->num_rows() > 0)
				{
					return $query->result();
				}else{
					return false;
				}
		
	}
	
	
	public function rotadorCount(){
		return $this->db->count_all("rotador_imagenes");
	}
	
	public function AgregaRotador($titulo, $archivo){
	$datos = array('titulo' => $titulo, 'archivo' => $archivo);
	
	$this->db->insert('rotador_imagenes', $datos);
		
	}
	
	public function EditarRotador($id, $titulo, $archivo){
		$data = array(
	        'titulo' => $titulo,
	        'archivo' => $archivo);
		
		$this->db->where('id', $id);
		$this->db->update('rotador_imagenes', $data);
		
	}


	
	public function GetRotador($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from("rotador_imagenes");
		$query = $this->db->get();
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function BorrarRotador($id){
		$this->db->where('id', $id);
		$this->db->delete('rotador_imagenes');
	}
}
?>