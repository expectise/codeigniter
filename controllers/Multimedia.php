<?
class Multimedia extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Multimedia_Model','',TRUE);
		$this->load->helper(array('form', 'url'));
	}
	
	public function index($offset = 0){
		if($this->session->userdata('logged_in'))
		{
	
			 
			 
			$data['action'] = ($this->input->get('action') ? $this->input->get('action') : false);
			$data['resultado'] = $this->Multimedia_Model->image();
			$data['offset'] = 0;
			$data['tipo'] = $this->router->fetch_method();
			$data['class'] = $this->router->fetch_class();
			 
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/Multimedia.php', $data);
			$this->load->view('administrador/footer.php', $data);
			 
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	 
	 
	 
	public function Editalo(){
		$tiempo = time();
		$config['upload_path']   = 'uploads/Multimedia/1920px/';
		$config['allowed_types'] = 'jpg';
		$config['file_name'] = $tiempo;
		$config['min_width']  = '1915';
		$config['max_width']  = '1930';
		

		
		
		$this->load->library('upload', $config);
		
		if($this->session->userdata('logged_in'))
		{
				if (!empty($_FILES['imagen']['name']))
				{
					if ($this->upload->do_upload('imagen'))
					{
						
						unlink(FCPATH.'uploads/Multimedia/1920px/'.$this->input->post('archivo'));
						
						$archivo = $tiempo.'.jpg';
		
						$this->Multimedia_Model->EditarImage($this->input->post('id'),$this->input->post('titulo'), $archivo);
						redirect("Multimedia?action=actualizado");
					}else{
						redirect("Multimedia?action=archivo");
					}
						
				}else{
					$this->Multimedia_Model->EditarImage($this->input->post('id'),$this->input->post('titulo'), $this->input->post('archivo'));
					redirect("Multimedia?action=actualizado");
				}
					 
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
		
		


	}
	
	public function EditaMultimedia($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			$data['tipo'] = $this->router->fetch_method();
			$data['offset'] = $offset;
			$data['class'] = $this->router->fetch_class();
			
			if ($offset > 0){
				$data['resultado'] = $this->Multimedia_Model->GetImage($offset);
			}else{
				$data['resultado'] = false;
			}
				
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/EditaMultimedia.php', $data);
			$this->load->view('administrador/footer.php', $data);
				
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
}
?>