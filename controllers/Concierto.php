<?
class Concierto extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Concierto_Model','',TRUE);
		$this->load->library("pagination");
		$this->load->helper(array('form', 'url'));
	}
	
	public function index($offset = 0){
		if($this->session->userdata('logged_in'))
		{
				
			$offset = ($this->uri->segment(2) != '' ? $this->uri->segment(2): 0);
			$data['offset'] = $offset;
			$config['total_rows'] = $this->Concierto_Model->conciertoCount(($this->input->get('tipo') == null ? null : $this->input->get('tipo')));;
			$config['per_page']= 10;
			$config['first_link'] = 'Primero';
			$config['last_link'] = 'Último';
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
			$data['resultado'] = $this->Concierto_Model->conciertos($config["per_page"], $offset, ($this->input->get('tipo') == null ? null : $this->input->get('tipo')));
			$data['tipo'] = $this->router->fetch_method();
			$data['offset'] = $offset;
			$data['class'] = $this->router->fetch_class();
	
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/Concierto.php', $data);
			$this->load->view('administrador/footer.php', $data);
	
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	public function EditaConcierto($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			$data['tipo'] = $this->router->fetch_method();
			$data['class'] = $this->router->fetch_class();
			$data['offset'] = $offset;
				
			if ($offset > 0){
				$data['resultado'] = $this->Concierto_Model->GetConcierto($offset);
			}else{
				$data['resultado'] = false;
			}
				
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/EditaConcierto.php', $data);
			$this->load->view('administrador/footer.php', $data);
				
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	
	public function AgregaConcierto(){
		$tiempo = time();
		
		$config_main['upload_path']   = 'uploads/Concierto/main/';
		$config_main['allowed_types'] = 'jpg';
		$config_main['file_name'] = $tiempo;
		$config_main['min_width']  = '1910';
		$config_main['min_height']  = '750';
		$config_main['max_width']  = '1930';
		$config_main['max_height']  = '775';
		
		
		$config_thumb['upload_path']   = 'uploads/Concierto/thumb/';
		$config_thumb['allowed_types'] = 'jpg';
		$config_thumb['file_name'] = $tiempo;
		$config_thumb['min_width']  = '180';
		$config_thumb['min_height']  = '360';
		$config_thumb['max_width']  = '190';
		$config_thumb['max_height']  = '370';
	
		$config_boleto['upload_path']   = 'uploads/Concierto/boleto/';
		$config_boleto['allowed_types'] = 'jpg';
		$config_boleto['file_name'] = $tiempo;
		
		$config_flyer['upload_path'] = 'uploads/Concierto/flyer/';
		$config_flyer['allowed_types'] = 'jpg';
		$config_flyer['file_name'] = $tiempo;
	
	
		$this->load->library('upload');
	
		if($this->session->userdata('logged_in'))
			{
			
			
			if ($this->input->post('id') != null)
				{
					
					if (!empty($_FILES['fileMain']['name']))
					{
						$this->upload->initialize($config_main);
						if ($this->upload->do_upload('fileMain'))
						{
							unlink(FCPATH.'uploads/concierto/main/'.$this->input->post('main'));
							$main = $tiempo.'.jpg';
						}else{
							redirect("Concierto?action=archivo");
						}
					}else{
						$main= $this->input->post('main');
					}
						
					
					if (!empty($_FILES['fileThumb']['name']))
						{
							$this->upload->initialize($config_thumb);
							if ($this->upload->do_upload('fileThumb'))
								{
									unlink(FCPATH.'uploads/concierto/thumb/'.$this->input->post('boletothumb'));
									$boletothumb = $tiempo.'.jpg';
								}else{
									redirect("Concierto?action=archivo");
								}
						}else{
							$boletothumb = $this->input->post('boletothumb');
						}
			
			
			

					if (!empty($_FILES['fileBoleto']['name']))
						{
							$this->upload->initialize($config_boleto);
							if ($this->upload->do_upload('fileBoleto')){
								unlink(FCPATH.'uploads/concierto/boleto/'.$this->input->post('boleto'));
								$boleto = $tiempo.'.jpg';
							}else{
								redirect("Concierto?action=archivo");
							}
						}else{
							$boleto = $this->input->post('boleto');
						}
			
			
		
					if (!empty($_FILES['fileFlyer']['name']))
						{
							$this->upload->initialize($config_flyer);
							if ($this->upload->do_upload('fileFlyer'))
								{
									unlink(FCPATH.'uploads/concierto/flyer/'.$this->input->post('flyer'));
									$flyer = $tiempo.'.jpg';
								}else{
									redirect("Concierto?action=archivo");
								}
						}else{
							$flyer = $this->input->post('flyer');
						}
			
					$this->Concierto_Model->EditarConcierto($this->input->post('id'),$this->input->post('titulo'), $main,$this->input->post('locacion'),$this->input->post('latitud'),$this->input->post('longitud'),$this->input->post('inicio'),$this->input->post('duracion'),$boletothumb,$boleto,$this->input->post('programa'),$this->input->post('notas'),$this->input->post('solista'),$flyer,$this->input->post('video'), $this->input->post('tipo'));
			
			}else{
			
				if (!empty($_FILES['fileMain']['name']))
				{
					$this->upload->initialize($config_main);
					if ($this->upload->do_upload('fileMain'))
					{
						$main = $tiempo.'.jpg';
					}else{
						redirect("Concierto?action=archivo");
					}
				}else{
					$main= '';
				}
				
					if (!empty($_FILES['fileThumb']['name']))
						{
							$this->upload->initialize($config_thumb);
							if ($this->upload->do_upload('fileThumb'))
								{
									$boletothumb = $tiempo.'.jpg';
								}else{
									redirect("Concierto?action=archivo");
								}
						}else{
							$boletothumb = '';
						}
				
				
				
		
					if (!empty($_FILES['fileBoleto']['name']))
						{
							$this->upload->initialize($config_boleto);
							if ($this->upload->do_upload('fileBoleto')){
								$boleto = $tiempo.'.jpg';
							}else{
								redirect("Concierto?action=archivo");
							}
					
						}else{
							$boleto = '';
						}
				
				

					if (!empty($_FILES['fileFlyer']['name']))
						{
							$this->upload->initialize($config_flyer);
							if ($this->upload->do_upload('fileFlyer'))
								{
									$flyer = $tiempo.'.jpg';
								}else{
									redirect("Concierto?action=archivo");
								}
					
						}else{
							$flyer = '';
						}
			
						$this->Concierto_Model->AgregaConcierto($this->input->post('titulo'), $main,$this->input->post('locacion'),$this->input->post('latitud'),$this->input->post('longitud'),$this->input->post('inicio'),$this->input->post('duracion'),$boletothumb,$boleto,$this->input->post('programa'),$this->input->post('notas'),$this->input->post('solista'),$flyer,$this->input->post('video'), $this->input->post('tipo'));
			
			
			}
		
		redirect("Concierto?action=actualizado");
			
			
			
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	
	
	}
	
	public function Borrar($id = 0){
		if ($id > 0){
			$data['resultado'] = $this->Concierto_Model->GetConcierto($id);
			
			unlink(FCPATH.'uploads/Concierto/main/'.$data['resultado'][0]->main);
			unlink(FCPATH.'uploads/Concierto/thumb/'.$data['resultado'][0]->boletothumb);
			unlink(FCPATH.'uploads/Concierto/boleto/'.$data['resultado'][0]->boleto);
			unlink(FCPATH.'uploads/Concierto/flyer/'.$data['resultado'][0]->flyer);
				
			$this->Concierto_Model->BorrarConcierto($id);
			redirect("Concierto?action=borrado");
		}
	}
	
}
?>