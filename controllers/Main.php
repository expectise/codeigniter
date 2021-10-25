<?
class Main extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_Model','',TRUE);
		$this->load->helper(array('form', 'url'));
		$this->load->library('email');
	}
	
	public function index(){
		
			$data['rotador'] = $this->Main_Model->allRotadores();
			$data['calendario'] = $this->Main_Model->getCalendario();
			$data['notas'] = $this->Main_Model->Notas();
			$data['tipo'] = $this->router->fetch_method();
			$data['class'] = $this->router->fetch_class();
			$data['VideoSemanaData'] = $this->Main_Model->VideoSemana();
			
			$data['boleto'] = $this->Main_Model->concierto(1)[0]->boleto;
			
			$data['ImageBody']['archivo'] = $this->Main_Model->getIcono(6)[0]->archivo;
			$data['ImageBody']['titulo'] = $this->Main_Model->getIcono(6)[0]->titulo;
			$data['ImageBody']['titulo2'] = $this->Main_Model->getIcono(6)[0]->titulo2;
			$data['ImageBody']['titulo3'] = $this->Main_Model->getIcono(6)[0]->titulo3;
			
			$data['VideoSemana']['titulo'] = $this->Main_Model->getIcono(1)[0]->titulo;
			$data['VideoSemana']['titulo2'] = $this->Main_Model->getIcono(1)[0]->titulo2;
			$data['VideoSemana']['archivo'] = $this->Main_Model->getIcono(1)[0]->archivo;
			
			$data['GaleriaFotografica']['titulo'] = $this->Main_Model->getIcono(2)[0]->titulo;
			$data['GaleriaFotografica']['titulo2'] = $this->Main_Model->getIcono(2)[0]->titulo2;
			$data['GaleriaFotografica']['archivo'] = $this->Main_Model->getIcono(2)[0]->archivo;
			
			$data['blog']['titulo'] = $this->Main_Model->getIcono(3)[0]->titulo;
			$data['blog']['titulo2'] = $this->Main_Model->getIcono(3)[0]->titulo2;
			$data['blog']['archivo'] = $this->Main_Model->getIcono(3)[0]->archivo;
			
			$data['AmigosOfa']['titulo'] = $this->Main_Model->getIcono(4)[0]->titulo;
			$data['AmigosOfa']['titulo2'] = $this->Main_Model->getIcono(4)[0]->titulo2;
			$data['AmigosOfa']['archivo'] = $this->Main_Model->getIcono(4)[0]->archivo;
			
			$data['ImageFoot'] = $this->Main_Model->getIcono(5)[0]->archivo;
			
			$data['TwitterText'] = $this->Main_Model->getIcono(7)[0]->titulo;
			$data['TwitterUrl'] = $this->Main_Model->getIcono(7)[0]->url;
			
			$data['FaceBookText'] = $this->Main_Model->getIcono(8)[0]->titulo;
			$data['FaceBookUrl'] = $this->Main_Model->getIcono(8)[0]->url;
			
			$data['youtubeText'] = $this->Main_Model->getIcono(9)[0]->titulo;
			$data['youtubeUrl'] = $this->Main_Model->getIcono(9)[0]->url;

			$this->load->view('main.php', $data);
		
	}
	




public function nota($offset = 0){
	$data['TwitterText'] = $this->Main_Model->getIcono(7)[0]->titulo;
	$data['TwitterUrl'] = $this->Main_Model->getIcono(7)[0]->url;
	
	$data['FaceBookText'] = $this->Main_Model->getIcono(8)[0]->titulo;
	$data['FaceBookUrl'] = $this->Main_Model->getIcono(8)[0]->url;
	
	$data['youtubeText'] = $this->Main_Model->getIcono(9)[0]->titulo;
	$data['youtubeUrl'] = $this->Main_Model->getIcono(9)[0]->url;
	
	$data['nota'] = $this->Main_Model->GetNota($offset);
	
	$this->load->view('nota.php', $data);
}

public function fotos(){
	$data['Fotos'] = $this->Main_Model->allFotos();
	
	$data['Cintillo'] = $this->Main_Model->getIcono(20)[0]->archivo;
	
	$data['TwitterText'] = $this->Main_Model->getIcono(7)[0]->titulo;
	$data['TwitterUrl'] = $this->Main_Model->getIcono(7)[0]->url;
	
	$data['FaceBookText'] = $this->Main_Model->getIcono(8)[0]->titulo;
	$data['FaceBookUrl'] = $this->Main_Model->getIcono(8)[0]->url;
	
	$data['youtubeText'] = $this->Main_Model->getIcono(9)[0]->titulo;
	$data['youtubeUrl'] = $this->Main_Model->getIcono(9)[0]->url;
	
	$this->load->view('fotos.php', $data);
}


public function videos(){
	$data['Videos'] = $this->Main_Model->allVideos();
	
	$data['Cintillo'] = $this->Main_Model->getIcono(21)[0]->archivo;
	
	$data['TwitterText'] = $this->Main_Model->getIcono(7)[0]->titulo;
	$data['TwitterUrl'] = $this->Main_Model->getIcono(7)[0]->url;
	
	$data['FaceBookText'] = $this->Main_Model->getIcono(8)[0]->titulo;
	$data['FaceBookUrl'] = $this->Main_Model->getIcono(8)[0]->url;
	
	$data['youtubeText'] = $this->Main_Model->getIcono(9)[0]->titulo;
	$data['youtubeUrl'] = $this->Main_Model->getIcono(9)[0]->url;
	
	$this->load->view('videos.php', $data);
}

public function contacto(){
	
	$data['Cintillo'] = $this->Main_Model->getIcono(22)[0]->archivo;
	
	$data['TwitterText'] = $this->Main_Model->getIcono(7)[0]->titulo;
	$data['TwitterUrl'] = $this->Main_Model->getIcono(7)[0]->url;
	
	$data['FaceBookText'] = $this->Main_Model->getIcono(8)[0]->titulo;
	$data['FaceBookUrl'] = $this->Main_Model->getIcono(8)[0]->url;
	
	$data['youtubeText'] = $this->Main_Model->getIcono(9)[0]->titulo;
	$data['youtubeUrl'] = $this->Main_Model->getIcono(9)[0]->url;
	
	$this->load->view('contacto.php', $data);
}

public function EnviarContacto(){
	

	
	$this->email->from('noreply@ofa.org.mx', 'Orquesta Filarmónica de Acapulco');
	$this->email->to('ofa.rrpp@gmail.com');
	$this->email->subject($this->input->post('tipo'));
	$this->email->message('Nombre: '.$this->input->post('nombre').'<br>Correo Electrónico: '.$this->input->post('email').'<br>Teléfono: '.$this->input->post('telefono').'<br>Sujeto: '.$this->input->post('sujeto').'<br>Mensaje:<br>'.nl2br($this->input->post('mensaje')));
	$this->email->send();
	
	redirect('contacto?enviado=true', 'refresh');
	
}

public function concierto(){
	
	
	$data['resultado'] = $this->Main_Model->concierto(1);
	$data['tipo'] = $this->router->fetch_method();
	$data['class'] = $this->router->fetch_class();
	$data['calendario'] = $this->Main_Model->getCalendario();
	
	$data['TwitterText'] = $this->Main_Model->getIcono(7)[0]->titulo;
	$data['TwitterUrl'] = $this->Main_Model->getIcono(7)[0]->url;
	
	$data['FaceBookText'] = $this->Main_Model->getIcono(8)[0]->titulo;
	$data['FaceBookUrl'] = $this->Main_Model->getIcono(8)[0]->url;
	
	$data['youtubeText'] = $this->Main_Model->getIcono(9)[0]->titulo;
	$data['youtubeUrl'] = $this->Main_Model->getIcono(9)[0]->url;
	
	$this->load->view('concierto.php', $data);
	
}


public function municipales(){
	
	
	$data['resultado'] = $this->Main_Model->concierto(2);
	$data['tipo'] = $this->router->fetch_method();
	$data['class'] = $this->router->fetch_class();
	$data['calendario'] = $this->Main_Model->getCalendario();
	
	$data['TwitterText'] = $this->Main_Model->getIcono(7)[0]->titulo;
	$data['TwitterUrl'] = $this->Main_Model->getIcono(7)[0]->url;
	
	$data['FaceBookText'] = $this->Main_Model->getIcono(8)[0]->titulo;
	$data['FaceBookUrl'] = $this->Main_Model->getIcono(8)[0]->url;
	
	$data['youtubeText'] = $this->Main_Model->getIcono(9)[0]->titulo;
	$data['youtubeUrl'] = $this->Main_Model->getIcono(9)[0]->url;
	
	$this->load->view('municipales.php', $data);
	
}

public function didacticos(){
	
	
	$data['resultado'] = $this->Main_Model->concierto(3);
	$data['tipo'] = $this->router->fetch_method();
	$data['class'] = $this->router->fetch_class();
	$data['calendario'] = $this->Main_Model->getCalendario();
	
	$data['TwitterText'] = $this->Main_Model->getIcono(7)[0]->titulo;
	$data['TwitterUrl'] = $this->Main_Model->getIcono(7)[0]->url;
	
	$data['FaceBookText'] = $this->Main_Model->getIcono(8)[0]->titulo;
	$data['FaceBookUrl'] = $this->Main_Model->getIcono(8)[0]->url;
	
	$data['youtubeText'] = $this->Main_Model->getIcono(9)[0]->titulo;
	$data['youtubeUrl'] = $this->Main_Model->getIcono(9)[0]->url;
	
	$this->load->view('didacticos.php', $data);
	
}

public function especiales(){
	
	
	$data['resultado'] = $this->Main_Model->concierto(4);
	$data['tipo'] = $this->router->fetch_method();
	$data['class'] = $this->router->fetch_class();
	$data['calendario'] = $this->Main_Model->getCalendario();
	
	$data['TwitterText'] = $this->Main_Model->getIcono(7)[0]->titulo;
	$data['TwitterUrl'] = $this->Main_Model->getIcono(7)[0]->url;
	
	$data['FaceBookText'] = $this->Main_Model->getIcono(8)[0]->titulo;
	$data['FaceBookUrl'] = $this->Main_Model->getIcono(8)[0]->url;
	
	$data['youtubeText'] = $this->Main_Model->getIcono(9)[0]->titulo;
	$data['youtubeUrl'] = $this->Main_Model->getIcono(9)[0]->url;
	
	$this->load->view('especiales.php', $data);
	
}

public function nosotros($tipo){
	$data['TwitterText'] = $this->Main_Model->getIcono(7)[0]->titulo;
	$data['TwitterUrl'] = $this->Main_Model->getIcono(7)[0]->url;
	
	$data['FaceBookText'] = $this->Main_Model->getIcono(8)[0]->titulo;
	$data['FaceBookUrl'] = $this->Main_Model->getIcono(8)[0]->url;
	
	$data['youtubeText'] = $this->Main_Model->getIcono(9)[0]->titulo;
	$data['youtubeUrl'] = $this->Main_Model->getIcono(9)[0]->url;
	
	$data['tipo'] = $tipo;
	
	$data['nota'] = $this->Main_Model->GetNosotros($tipo);
	
	$this->load->view('Nosotros.php', $data);
}

}
?>