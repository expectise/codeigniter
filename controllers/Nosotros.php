<?
class Nosotros extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Nosotros_Model','',TRUE);
		$this->load->library("pagination");
		$this->load->helper(array('form', 'url'));
	}
	
	public function index($offset = 0){
		if($this->session->userdata('logged_in'))
		{
				
			$offset = ($this->uri->segment(2) != '' ? $this->uri->segment(2): 0);
			$data['offset'] = $offset;
			$config['total_rows'] = $this->Nosotros_Model->nosotrosCount();;
			$config['per_page']= 10;
			$config['first_link'] = 'Primero';
			$config['last_link'] = 'Último';
			$config['uri_segment'] = 2;
			$config["num_links"] = 10;
			$config['base_url']= base_url().'/Nosotros';
			$config['suffix'] = '?'.http_build_query($_GET, '', "&");
			$this->pagination->initialize($config);
			$data['paginglinks'] = $this->pagination->create_links();
			// Showing total rows count
			if($data['paginglinks']!= '') {
				$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page);
			}
	
	
	
			$data['action'] = ($this->input->get('action') ? $this->input->get('action') : false);
			$data['resultado'] = $this->Nosotros_Model->nosotros($config["per_page"], $offset);
			$data['tipo'] = $this->router->fetch_method();
			$data['offset'] = $offset;
			$data['class'] = $this->router->fetch_class();
	
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/nosotros.php', $data);
			$this->load->view('administrador/footer.php', $data);
	
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	public function EditaNosotros($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			$data['tipo'] = $this->router->fetch_method();
			$data['class'] = $this->router->fetch_class();
			$data['offset'] = $offset;
				
			if ($offset > 0){
				$data['resultado'] = $this->Nosotros_Model->GetNosotros($offset);
			}else{
				$data['resultado'] = false;
			}
				
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/EditaNosotros.php', $data);
			$this->load->view('administrador/footer.php', $data);
				
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	
	public function AgregaNosotros(){
		$tiempo = time();
		
		$config_foto['upload_path']   = 'uploads/Nosotros/foto/';
		$config_foto['allowed_types'] = 'jpg';
		$config_foto['file_name'] = $tiempo;
		$config_foto['min_width']  = '1910';
		$config_foto['min_height']  = '750';
		$config_foto['max_width']  = '1930';
		$config_foto['max_height']  = '775';
		
		
	

	
	
		$this->load->library('upload');
	
		if($this->session->userdata('logged_in'))
			{
			
			
			if ($this->input->post('id') != null)
				{
					
					if (!empty($_FILES['fileFoto']['name']))
					{
						$this->upload->initialize($config_foto);
						if ($this->upload->do_upload('fileFoto'))
						{
							unlink(FCPATH.'uploads/Nosotros/foto/'.$this->input->post('foto'));
							$foto = $tiempo.'.jpg';
						}else{
							redirect("Nosotros?action=archivo");
						}
					}else{
						$foto= $this->input->post('foto');
					}
						
					
			
			

					
			
					$this->Nosotros_Model->EditarNosotros($this->input->post('id'), $this->input->post('nota'), $foto, $this->input->post('tipo'));
			
			}else{
			
				if (!empty($_FILES['fileFoto']['name']))
				{
					$this->upload->initialize($config_foto);
					if ($this->upload->do_upload('fileFoto'))
					{
						$foto = $tiempo.'.jpg';
					}else{
						redirect("Nosotros?action=archivo");
					}
				}else{
					$foto= '';
				}
				
				
				
				
		
				$this->Nosotros_Model->AgregaNosotros($this->input->post('nota'), $foto, $this->input->post('tipo'));
			
			}
		
		redirect("Nosotros?action=actualizado");
			
			
			
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	
	
	}
	
	public function Borrar($id = 0){
		if ($id > 0){
			$data['resultado'] = $this->Nosotros_Model->GetNosotros($id);
			
			unlink(FCPATH.'uploads/Nosotros/foto/'.$data['resultado'][0]->foto);

				
			$this->Nosotros_Model->BorrarNosotros($id);
			redirect("Nosotros?action=borrado");
		}
	}
	
}
?>