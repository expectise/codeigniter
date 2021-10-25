<?
class VideoSemana extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('VideoSemana_Model','',TRUE);
		$this->load->library("pagination");
		$this->load->helper(array('form', 'url'));
		$this->load->library('image_lib');
	}
	
	public function index($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			
			$offset = ($this->uri->segment(2) != '' ? $this->uri->segment(2): 0);
			$data['offset'] = $offset;
			$config['total_rows'] = $this->VideoSemana_Model->videoCount();;
			$config['per_page']= 10;
			$config['first_link'] = 'Primero';
			$config['last_link'] = utf8_encode('Último');
			$config['uri_segment'] = 2;
			$config["num_links"] = 10;
			$config['base_url']= base_url().'/VideoSemana';
			$config['suffix'] = '?'.http_build_query($_GET, '', "&");
			$this->pagination->initialize($config);
			$data['paginglinks'] = $this->pagination->create_links();
			// Showing total rows count
			if($data['paginglinks']!= '') {
				$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page);
			}
			
			
			
			$data['action'] = ($this->input->get('action') ? $this->input->get('action') : false);
			$data['resultado'] = $this->VideoSemana_Model->video($config["per_page"], $offset);
			$data['tipo'] = $this->router->fetch_method();
			$data['offset'] = $offset;
			$data['class'] = $this->router->fetch_class();
			
			
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/VideoSemana.php', $data);
			$this->load->view('administrador/footer.php', $data);
			
			
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	
	public function NuevoVIdeo($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			$data['tipo'] = $this->router->fetch_method();
			$data['class'] = $this->router->fetch_class();
			$data['offset'] = $offset;
			
			if ($offset > 0){
				$data['resultado'] = $this->VideoSemana_Model->GetVideo($offset);
			}else{
				$data['resultado'] = false;
			}
			
			
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/NuevoVideoSemana.php', $data);
			$this->load->view('administrador/footer.php', $data);
			
			
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	public function Borrar($id = 0){
		if ($id > 0){		
			$this->VideoSemana_Model->BorrarVideo($id);
			redirect("VideoSemana?action=borrado");
		}
	}
	
	
	public function AgregaVideo(){
		
		
		if($this->session->userdata('logged_in'))
		{
			if ($this->input->post('id') != null)
				{		 
					
					$this->VideoSemana_Model->EditarVideo($this->input->post('id'),$this->input->post('titulo'), $this->input->post('url'));
					redirect("VideoSemana?action=actualizado");
						
				}else{
					$this->VideoSemana_Model->AgregaVideo($this->input->post('titulo'), $this->input->post('url'));
					redirect("VideoSemana?action=actualizado");
				}	
			
			
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
		
		
	}
	
	
}
?>