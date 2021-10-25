<?
Class Video_Model extends CI_Model
{
	public function video($limit, $start){
		
		$this->db->limit($limit, $start);
		$this->db->order_by("id", "desc");
		
		$query = $this->db->get('videos');
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
		
	}
	
	
	public function videoCount(){
		return $this->db->count_all("videos");
	}
	
	public function AgregaVideo($titulo, $url){
		$datos = array('titulo' => $titulo, 'url' => $url);
		
		$this->db->insert('videos', $datos);
		
	}
	
	public function EditarVideo($id, $titulo, $url){
		$data = array(
				'titulo' => $titulo,
				'url' => $url);
		
		$this->db->where('id', $id);
		$this->db->update('videos', $data);
		
	}
	
	
	
	public function GetVideo($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from("videos");
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
		$this->db->delete('videos');
	}
}
?>