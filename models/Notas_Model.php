<?
Class Notas_Model extends CI_Model
{
	
	public function Notas($limit, $start){
			
		$this->db->limit($limit, $start);
		$this->db->order_by("id", "desc");
	
		$query = $this->db->get('notas');
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	
	}
	
	
	public function AgregaNota($titulo, $subtitulo, $nota, $thumb, $foto){
		
		$datos = array(
				'titulo' => $titulo,
				'subtitulo' => $subtitulo,
				'nota' => $nota,
				'thumb' => $thumb,
				'foto' => $foto
		);
	
		$this->db->insert('notas', $datos);
	}
	
	public function EditarNota($id, $titulo, $subtitulo, $nota, $thumb, $foto){
	
		$datos = array(
				'titulo' => $titulo,
				'subtitulo' => $subtitulo,
				'nota' => $nota,
				'thumb' => $thumb,
				'foto' => $foto
		);
		
		$this->db->where('id', $id);
	
		$this->db->update('notas', $datos);
	}
	
	public function BorrarNota($id){
		$this->db->where('id', $id);
		$this->db->delete('notas');
	}
	
	public function notasCount(){
		return $this->db->count_all("notas");
	}
	
	public function GetNota($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from("notas");
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