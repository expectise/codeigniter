<?
Class Main_Model extends CI_Model
{
	
	public function allRotadores(){
		$query = $this->db->get('rotador_imagenes');
		$this->db->order_by("id", "asc");
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function allFotos(){
		$query = $this->db->get('fotos');
		$this->db->order_by("id", "asc");
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function allVideos(){
		$query = $this->db->get('videos');
		$this->db->order_by("id", "asc");
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function concierto($tipo){
		$this->db->select('*');
		$this->db->from("concierto");
		$this->db->where("tipo", $tipo);
		$this->db->order_by("id","desc");
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function VideoSemana(){
		$this->db->select('*');
		$this->db->from("videosemana");
		$this->db->order_by("id","desc");
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	

	
	public function getIcono($tipo){
		$this->db->select("*");
		$this->db->where('tipo', $tipo);
		$this->db->from("iconosMain");
		$query = $this->db->get();
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function getCalendario(){
		$this->db->select("*");
		$this->db->from("calendario");
		$query = $this->db->get();
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function Notas(){
		$this->db->select('*');
		$this->db->from("notas");
		$this->db->order_by("id","desc");
		$this->db->limit(3);
	
		$query = $this->db->get();
	
		if ($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
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
	
	public function GetNosotros($tipo){
		$this->db->select("*");
		$this->db->where("tipo", $tipo);
		$this->db->order_by("id","desc");
		$this->db->limit(1);
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