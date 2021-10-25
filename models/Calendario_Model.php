<?
Class Calendario_Model extends CI_Model
{
	public function calendario($limit, $start){
			
		$this->db->limit($limit, $start);
		$this->db->order_by("fecha", "desc");
	
		$query = $this->db->get('calendario');
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	
	}
	
	public function calendarioCount(){
		return $this->db->count_all("calendario");
	}
	
	public function AgregaCalendario($fecha, $texto, $url){
		$datos = array('fecha' => $fecha, 'texto' => $texto, 'url' => $url);
	
		$this->db->insert('calendario', $datos);
	
	}
	
	public function EditarCalendario($id, $fecha, $texto, $url){
		$datos = array('fecha' => $fecha, 'texto' => $texto, 'url' => $url);
	
		$this->db->where('id', $id);
		$this->db->update('calendario', $datos);
	
	}
	
	public function GetCalendario($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from("calendario");
		$query = $this->db->get();
			
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function BorrarCalendario($id){
		$this->db->where('id', $id);
		$this->db->delete('calendario');
	}
}
?>