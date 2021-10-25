<?
class Rotador extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rotador_Model','',TRUE);
		$this->load->library("pagination");
		$this->load->helper(array('form', 'url'));
		$this->load->library('image_lib');
	}
	
	public function index($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			
			$offset = ($this->uri->segment(2) != '' ? $this->uri->segment(2): 0);
			$data['offset'] = $offset;
			$config['total_rows'] = $this->Rotador_Model->rotadorCount();;
			$config['per_page']= 10;
			$config['first_link'] = 'Primero';
			$config['last_link'] = utf8_encode('Último');
			$config['uri_segment'] = 2;
			$config["num_links"] = 10;
			$config['base_url']= base_url().'/Rotador';
			$config['suffix'] = '?'.http_build_query($_GET, '', "&");
			$this->pagination->initialize($config);
			$data['paginglinks'] = $this->pagination->create_links();
			// Showing total rows count
			if($data['paginglinks']!= '') {
				$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page);
			}
	
			 
			 
			$data['action'] = ($this->input->get('action') ? $this->input->get('action') : false);
			$data['resultado'] = $this->Rotador_Model->rotador($config["per_page"], $offset);
			$data['tipo'] = $this->router->fetch_method();
			$data['offset'] = $offset;
			$data['class'] = $this->router->fetch_class();
			 
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/Rotador.php', $data);
			$this->load->view('administrador/footer.php', $data);
			 
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	 
	 
	public function NuevoRotador($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			$data['tipo'] = $this->router->fetch_method();
			$data['class'] = $this->router->fetch_class();
			$data['offset'] = $offset;
			
			if ($offset > 0){
				$data['resultado'] = $this->Rotador_Model->GetRotador($offset);
			}else{
				$data['resultado'] = false;
			}
			
			 
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/NuevoRotador.php', $data);
			$this->load->view('administrador/footer.php', $data);
			
			 
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	public function Borrar($id = 0){
		if ($id > 0){
			$data['resultado'] = $this->Rotador_Model->GetRotador($id);
			unlink(FCPATH.'uploads/Rotador/1920px/'.$data['resultado'][0]->archivo);
			/*
			unlink(FCPATH.'uploads/Rotador/1280px/'.$data['resultado'][0]->archivo);
			unlink(FCPATH.'uploads/Rotador/853px/'.$data['resultado'][0]->archivo);
			unlink(FCPATH.'uploads/Rotador/568px/'.$data['resultado'][0]->archivo);
			unlink(FCPATH.'uploads/Rotador/378px/'.$data['resultado'][0]->archivo);
			*/
			$this->Rotador_Model->BorrarRotador($id);
			redirect("Rotador?action=borrado");
		}
	}
	 
	 
	public function AgregaRotador(){
		$tiempo = time();
		$config['upload_path']   = 'uploads/Rotador/1920px/';
		$config['allowed_types'] = 'jpg';
		$config['file_name'] = $tiempo;
		$config['min_width']  = '1920';
		$config['min_height']  = '832';
		$config['max_width']  = '1920';
		$config['max_height']  = '832';
		

		
		
		$this->load->library('upload', $config);
		
		if($this->session->userdata('logged_in'))
		{
			if ($this->input->post('id') != null){
				if (!empty($_FILES['imagen']['name'])){
					if ($this->upload->do_upload('imagen')){
						
						unlink(FCPATH.'uploads/Rotador/1920px/'.$this->input->post('archivo'));
						/*
						unlink(FCPATH.'uploads/Rotador/1280px/'.$this->input->post('archivo'));
						unlink(FCPATH.'uploads/Rotador/853px/'.$this->input->post('archivo'));
						unlink(FCPATH.'uploads/Rotador/568px/'.$this->input->post('archivo'));
						unlink(FCPATH.'uploads/Rotador/378px/'.$this->input->post('archivo'));
						*/
						
						$archivo = $tiempo.'.jpg';
						
						/*
						$configIm1['image_library'] = 'gd';
						$configIm1['source_image'] = 'uploads/Rotador/1920px/'.$tiempo.'.jpg';
						$configIm1['new_image'] = 'uploads/Rotador/1280px/'.$tiempo.'.jpg';
						$configIm1['create_thumb'] = FALSE;
						$configIm1['maintain_ratio'] = TRUE;
						$configIm1['width'] = 1280;
						$configIm1['quality'] = 100;
						
						
						$configIm2['image_library'] = 'gd';
						$configIm2['source_image'] = 'uploads/Rotador/1920px/'.$tiempo.'.jpg';
						$configIm2['new_image'] = 'uploads/Rotador/853px/'.$tiempo.'.jpg';
						$configIm2['create_thumb'] = FALSE;
						$configIm2['maintain_ratio'] = TRUE;
						$configIm2['width'] = 853;
						$configIm2['quality'] = 100;
						
						$configIm3['image_library'] = 'gd';
						$configIm3['source_image'] = 'uploads/Rotador/1920px/'.$tiempo.'.jpg';
						$configIm3['new_image'] = 'uploads/Rotador/568px/'.$tiempo.'.jpg';
						$configIm3['create_thumb'] = FALSE;
						$configIm3['maintain_ratio'] = TRUE;
						$configIm3['width'] = 568;
						$configIm3['quality'] = 100;
						
						
						$configIm4['image_library'] = 'gd';
						$configIm4['source_image'] = 'uploads/Rotador/1920px/'.$tiempo.'.jpg';
						$configIm4['new_image'] = 'uploads/Rotador/378px/'.$tiempo.'.jpg';
						$configIm4['create_thumb'] = FALSE;
						$configIm4['maintain_ratio'] = TRUE;
						$configIm4['width'] = 378;
						$configIm4['quality'] = 100;
						
						$this->image_lib->initialize($configIm1);
						$this->image_lib->resize();
						
						$this->image_lib->initialize($configIm2);
						$this->image_lib->resize();
						
						$this->image_lib->initialize($configIm3);
						$this->image_lib->resize();
						
						$this->image_lib->initialize($configIm4);
						$this->image_lib->resize();
						*/
						
						$this->Rotador_Model->EditarRotador($this->input->post('id'),$this->input->post('titulo'), $archivo);
						redirect("Rotador?action=actualizado");
						
					}else{
						redirect("Rotador?action=archivo");
					}
				}else{
					$archivo = $this->input->post('archivo');
					$this->Rotador_Model->AgregaRotador($this->input->post('titulo'), $archivo);
					redirect("Rotador?action=actualizado");
				}
				
	
			}else{

				
				if (!$this->upload->do_upload('imagen')) {
					redirect("Rotador?action=archivo");
				}else {
					/*
					$configIm1['image_library'] = 'gd';
					$configIm1['source_image'] = 'uploads/Rotador/1920px/'.$tiempo.'.jpg';
					$configIm1['new_image'] = 'uploads/Rotador/1280px/'.$tiempo.'.jpg';
					$configIm1['create_thumb'] = FALSE;
					$configIm1['maintain_ratio'] = TRUE;
					$configIm1['width'] = 1280;
					$configIm1['quality'] = 100;
					
					
					$configIm2['image_library'] = 'gd';
					$configIm2['source_image'] = 'uploads/Rotador/1920px/'.$tiempo.'.jpg';
					$configIm2['new_image'] = 'uploads/Rotador/853px/'.$tiempo.'.jpg';
					$configIm2['create_thumb'] = FALSE;
					$configIm2['maintain_ratio'] = TRUE;
					$configIm2['width'] = 853;
					$configIm2['quality'] = 100;
					
					$configIm3['image_library'] = 'gd';
					$configIm3['source_image'] = 'uploads/Rotador/1920px/'.$tiempo.'.jpg';
					$configIm3['new_image'] = 'uploads/Rotador/568px/'.$tiempo.'.jpg';
					$configIm3['create_thumb'] = FALSE;
					$configIm3['maintain_ratio'] = TRUE;
					$configIm3['width'] = 568;
					$configIm3['quality'] = 100;
					
					
					$configIm4['image_library'] = 'gd';
					$configIm4['source_image'] = 'uploads/Rotador/1920px/'.$tiempo.'.jpg';
					$configIm4['new_image'] = 'uploads/Rotador/378px/'.$tiempo.'.jpg';
					$configIm4['create_thumb'] = FALSE;
					$configIm4['maintain_ratio'] = TRUE;
					$configIm4['width'] = 378;
					$configIm4['quality'] = 100;
					
					$this->image_lib->initialize($configIm1);
					$this->image_lib->resize();
					
					$this->image_lib->initialize($configIm2);
					$this->image_lib->resize();
					
					$this->image_lib->initialize($configIm3);
					$this->image_lib->resize();
					
					$this->image_lib->initialize($configIm4);
					$this->image_lib->resize();
					*/
					
					$this->Rotador_Model->AgregaRotador($this->input->post('titulo'), $config['file_name'].'.jpg');
					redirect("Rotador?action=agregado");
				}
				
				

			}
			
	

			 
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
		
	
	}
	
	
}
?>