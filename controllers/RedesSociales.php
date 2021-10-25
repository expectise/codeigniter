<?
class RedesSociales extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('RedesSociales_Model','',TRUE);
		$this->load->helper(array('form', 'url'));
	}
	
	public function index($offset = 0){
		if($this->session->userdata('logged_in'))
		{
	
			 
			 
			$data['action'] = ($this->input->get('action') ? $this->input->get('action') : false);
			$data['resultado'] = $this->RedesSociales_Model->redes();
			$data['offset'] = 0;
			$data['tipo'] = $this->router->fetch_method();
			$data['class'] = $this->router->fetch_class();
			 
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/RedesSociales.php', $data);
			$this->load->view('administrador/footer.php', $data);
			 
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	 
	 
	 
	public function Editalo(){
		
		
		if($this->session->userdata('logged_in'))
		{
	

		
			$this->RedesSociales_Model->EditarRedes($this->input->post('id'),$this->input->post('titulo'), $this->input->post('url'));
			redirect("RedesSociales?action=actualizado");
		
	
					 
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
		
		


	}
	
	public function EditaRedes($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			$data['tipo'] = $this->router->fetch_method();
			$data['offset'] = $offset;
			$data['class'] = $this->router->fetch_class();
				
			if ($offset > 0){
				$data['resultado'] = $this->RedesSociales_Model->GetRedes($offset);
			}else{
				$data['resultado'] = false;
			}
				
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/EditaRedes.php', $data);
			$this->load->view('administrador/footer.php', $data);
				
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
}
?>