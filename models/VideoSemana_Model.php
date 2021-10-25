<?
Class VideoSemana_Model extends CI_Model
{
	public function video($limit, $start){
		
		$this->db->limit($limit, $start);
		$this->db->order_by("id", "desc");
		
		$query = $this->db->get('videosemana');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
		
	}
	
	
	public function videoCount(){
		return $this->db->count_all("videosemana");
	}
	
	public function AgregaVideo($titulo, $url){
		$datos = array('titulo' => $titulo, 'url' => $url);
		
		$this->db->insert('videosemana', $datos);
		
	}
	
	public function EditarVideo($id, $titulo, $url){
		$data = array(
				'titulo' => $titulo,
				'url' => $url);
		
		$this->db->where('id', $id);
		$this->db->update('videosemana', $data);
		
	}
	
	
	
	public function GetVideo($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from("videosemana");
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function BorrarVideo($id){
		$this->db->where('id', $id);
		$this->db->delete('videosemana');
	}
}
?>