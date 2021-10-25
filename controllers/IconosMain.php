<?
class IconosMain extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('IconosMain_Model','',TRUE);
		$this->load->helper(array('form', 'url'));
	}
	
	public function index($offset = 0){
		if($this->session->userdata('logged_in'))
		{
	
			 
			 
			$data['action'] = ($this->input->get('action') ? $this->input->get('action') : false);
			$data['resultado'] = $this->IconosMain_Model->iconos();
			$data['offset'] = 0;
			$data['tipo'] = $this->router->fetch_method();
			$data['class'] = $this->router->fetch_class();
			 
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/IconosMain.php', $data);
			$this->load->view('administrador/footer.php', $data);
			 
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	 
	 
	 
	public function Editalo(){
		$tiempo = time();
		$config['upload_path']   = 'uploads/IconosMain/706px/';
		$config['allowed_types'] = 'jpg';
		$config['file_name'] = $tiempo;
		$config['min_width']  = '700';
		$config['min_height']  = '418';
		$config['max_width']  = '706';
		$config['max_height']  = '421';
		

		
		
		$this->load->library('upload', $config);
		
		if($this->session->userdata('logged_in'))
		{
				if (!empty($_FILES['imagen']['name']))
				{
					if ($this->upload->do_upload('imagen'))
					{
						
						unlink(FCPATH.'uploads/IconosMain/706px/'.$this->input->post('archivo'));
						
						$archivo = $tiempo.'.jpg';
		
						$this->IconosMain_Model->EditarIconoMain($this->input->post('id'),$this->input->post('titulo'), $archivo, $this->input->post('titulo2'));
						redirect("IconosMain?action=actualizado");
					}else{
						redirect("IconosMain?action=archivo");
					}
						
				}else{
					$this->IconosMain_Model->EditarIconoMain($this->input->post('id'),$this->input->post('titulo'), $this->input->post('archivo'), $this->input->post('titulo2'));
					redirect("IconosMain?action=actualizado");
				}
					 
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
		
		


	}
	
	public function EditaIconosMain($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			$data['tipo'] = $this->router->fetch_method();
			$data['offset'] = $offset;
			$data['class'] = $this->router->fetch_class();
				
			if ($offset > 0){
				$data['resultado'] = $this->IconosMain_Model->GetIconoMain($offset);
			}else{
				$data['resultado'] = false;
			}
				
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/EditaIconosMain.php', $data);
			$this->load->view('administrador/footer.php', $data);
				
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
}
?>