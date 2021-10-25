<?
Class Concierto_Model extends CI_Model
{
	
	public function Conciertos($limit, $start, $tipo){
		
		if ($tipo != null){
			$this->db->where('tipo', $tipo);
		}
			
		$this->db->limit($limit, $start);
		$this->db->order_by("id", "desc");
	
		$query = $this->db->get('concierto');
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	
	}
	
	
	public function AgregaConcierto($titulo, $main, $locacion, $latitud, $longitud, $inicio, $duracion, $boletothumb, $boleto, $programa, $notas, $solista, $flyer, $video, $tipo){
		
		$datos = array(
				'titulo' => $titulo,
				'main' => $main,
				'locacion' => $locacion,
				'latitud' => $latitud,
				'longitud' => $longitud,
				'inicio' => $inicio,
				'duracion' => $duracion,
				'boletothumb' => $boletothumb,
				'boleto' => $boleto,
				'notas' => $notas,
				'solista' => $solista,
				'flyer' => $flyer,
				'video' => $video,
				'programa' => $programa,
				'tipo' => $tipo
		);
	
		$this->db->insert('concierto', $datos);
	}
	
	public function EditarConcierto($id, $titulo, $main, $locacion, $latitud, $longitud, $inicio, $duracion, $boletothumb, $boleto, $programa, $notas, $solista, $flyer, $video, $tipo){
	
		$datos = array(
				'titulo' => $titulo,
				'main' => $main,
				'locacion' => $locacion,
				'latitud' => $latitud,
				'longitud' => $longitud,
				'inicio' => $inicio,
				'duracion' => $duracion,
				'boletothumb' => $boletothumb,
				'boleto' => $boleto,
				'notas' => $notas,
				'solista' => $solista,
				'flyer' => $flyer,
				'video' => $video,
				'programa' => $programa,
				'tipo' => $tipo
		);
	
		$this->db->where('id', $id);
		$this->db->update('concierto', $datos);
	}
	
	public function BorrarConcierto($id){
		$this->db->where('id', $id);
		$this->db->delete('concierto');
	}
	
	public function conciertoCount($tipo){
		if ($tipo != null){
			$this->db->where('tipo', $tipo);
		}
		return $this->db->count_all("concierto");
	}
	
	public function GetConcierto($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from("concierto");
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