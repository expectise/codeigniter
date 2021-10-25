<?
class Foto extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Fotos_Model','',TRUE);
		$this->load->library("pagination");
		$this->load->helper(array('form', 'url'));
		$this->load->library('image_lib');
	}
	
	public function index($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			
			$offset = ($this->uri->segment(2) != '' ? $this->uri->segment(2): 0);
			$data['offset'] = $offset;
			$config['total_rows'] = $this->Fotos_Model->fotoCount();;
			$config['per_page']= 10;
			$config['first_link'] = 'Primero';
			$config['last_link'] = utf8_encode('Último');
			$config['uri_segment'] = 2;
			$config["num_links"] = 10;
			$config['base_url']= base_url().'/Foto';
			$config['suffix'] = '?'.http_build_query($_GET, '', "&");
			$this->pagination->initialize($config);
			$data['paginglinks'] = $this->pagination->create_links();
			// Showing total rows count
			if($data['paginglinks']!= '') {
				$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page);
			}
			
			
			
			$data['action'] = ($this->input->get('action') ? $this->input->get('action') : false);
			$data['resultado'] = $this->Fotos_Model->foto($config["per_page"], $offset);
			$data['tipo'] = $this->router->fetch_method();
			$data['offset'] = $offset;
			$data['class'] = $this->router->fetch_class();
			
			
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/Foto.php', $data);
			$this->load->view('administrador/footer.php', $data);
			
			
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	
	public function NuevoFoto($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			$data['tipo'] = $this->router->fetch_method();
			$data['class'] = $this->router->fetch_class();
			$data['offset'] = $offset;
			
			if ($offset > 0){
				$data['resultado'] = $this->Fotos_Model->GetFoto($offset);
			}else{
				$data['resultado'] = false;
			}
			
			
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/NuevoFoto.php', $data);
			$this->load->view('administrador/footer.php', $data);
			
			
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	public function Borrar($id = 0){
		if ($id > 0){
			$data['resultado'] = $this->Fotos_Model->GetFoto($id);
			unlink(FCPATH.'uploads/Fotos/1045px/'.$data['resultado'][0]->archivo);
			unlink(FCPATH.'uploads/Fotos/209px/'.$data['resultado'][0]->archivo);
		
			$this->Fotos_Model->BorrarFoto($id);
			redirect("Foto?action=borrado");
		}
	}
	
	
	public function AgregaFoto(){
		$tiempo = time();
		$config['upload_path']   = 'uploads/Fotos/1045px/';
		$config['allowed_types'] = 'jpg';
		$config['file_name'] = $tiempo;
		$config['min_width']  = '1035';
		$config['min_height']  = '685';
		$config['max_width']  = '1055';
		$config['max_height']  = '705';
		
		
		
		
		$this->load->library('upload', $config);
		
		if($this->session->userdata('logged_in'))
		{
			if ($this->input->post('id') != null){
				if (!empty($_FILES['imagen']['name'])){
					if ($this->upload->do_upload('imagen')){
						
						unlink(FCPATH.'uploads/Fotos/1045px/'.$this->input->post('archivo'));
						unlink(FCPATH.'uploads/Fotos/209px/'.$this->input->post('archivo'));
						
						$archivo = $tiempo.'.jpg';
					
						 $configIm1['image_library'] = 'gd2';
						 $configIm1['source_image'] = 'uploads/Fotos/1045px/'.$tiempo.'.jpg';
						 $configIm1['new_image'] = 'uploads/Fotos/209px/'.$tiempo.'.jpg';
						 $configIm1['create_thumb'] = FALSE;
						 $configIm1['maintain_ratio'] = TRUE;
						 $configIm1['width'] = 209;
						 $configIm1['quality'] = 100;
						 
						 
						
						 $this->image_lib->initialize($configIm1);
						 $this->image_lib->resize();
						 
					
						
						$this->Fotos_Model->EditarFoto($this->input->post('id'),$this->input->post('titulo'), $archivo);
						redirect("Foto?action=actualizado");
						
					}else{
						redirect("Foto?action=archivo");
					}
				}else{
					$archivo = $this->input->post('archivo');
					$this->Fotos_Model->AgregaFoto($this->input->post('titulo'), $archivo);
					redirect("Foto?action=actualizado");
				}
				
				
			}else{
				
				
				if (!$this->upload->do_upload('imagen')) {
					redirect("Foto?action=archivo");
				}else {
					
						 $configIm1['image_library'] = 'gd2';
						 $configIm1['source_image'] = 'uploads/Fotos/1045px/'.$tiempo.'.jpg';
						 $configIm1['new_image'] = 'uploads/Fotos/209px/'.$tiempo.'.jpg';
						 $configIm1['create_thumb'] = FALSE;
						 $configIm1['maintain_ratio'] = TRUE;
						 $configIm1['width'] = 209;
						 $configIm1['quality'] = 100;
						 
						 
						
						 $this->image_lib->initialize($configIm1);
						 $this->image_lib->resize();
					
					$this->Fotos_Model->AgregaFoto($this->input->post('titulo'), $config['file_name'].'.jpg');
					redirect("Foto?action=agregado");
				}
				
				
				
			}
			
			
			
			
			
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
		
		
	}
	
	
}
?>