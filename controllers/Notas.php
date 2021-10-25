<?
class Notas extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Notas_Model','',TRUE);
		$this->load->library("pagination");
		$this->load->helper(array('form', 'url'));
	}
	
	public function index($offset = 0){
		if($this->session->userdata('logged_in'))
		{
				
			$offset = ($this->uri->segment(2) != '' ? $this->uri->segment(2): 0);
			$data['offset'] = $offset;
			$config['total_rows'] = $this->Notas_Model->notasCount();;
			$config['per_page']= 10;
			$config['first_link'] = 'Primero';
			$config['last_link'] = 'Último';
			$config['uri_segment'] = 2;
			$config["num_links"] = 10;
			$config['base_url']= base_url().'/Notas';
			$config['suffix'] = '?'.http_build_query($_GET, '', "&");
			$this->pagination->initialize($config);
			$data['paginglinks'] = $this->pagination->create_links();
			// Showing total rows count
			if($data['paginglinks']!= '') {
				$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page);
			}
	
	
	
			$data['action'] = ($this->input->get('action') ? $this->input->get('action') : false);
			$data['resultado'] = $this->Notas_Model->notas($config["per_page"], $offset);
			$data['tipo'] = $this->router->fetch_method();
			$data['offset'] = $offset;
			$data['class'] = $this->router->fetch_class();
	
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/notas.php', $data);
			$this->load->view('administrador/footer.php', $data);
	
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	public function EditaNota($offset = 0){
		if($this->session->userdata('logged_in'))
		{
			$data['tipo'] = $this->router->fetch_method();
			$data['class'] = $this->router->fetch_class();
			$data['offset'] = $offset;
				
			if ($offset > 0){
				$data['resultado'] = $this->Notas_Model->GetNota($offset);
			}else{
				$data['resultado'] = false;
			}
				
	
			$this->load->view('administrador/header.php', $data);
			$this->load->view('administrador/menu.php', $data);
			$this->load->view('administrador/EditaNota.php', $data);
			$this->load->view('administrador/footer.php', $data);
				
	
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	}
	
	
	public function AgregaNota(){
		$tiempo = time();
		
		$config_foto['upload_path']   = 'uploads/Notas/foto/';
		$config_foto['allowed_types'] = 'jpg';
		$config_foto['file_name'] = $tiempo;
		$config_foto['min_width']  = '1910';
		$config_foto['min_height']  = '750';
		$config_foto['max_width']  = '1930';
		$config_foto['max_height']  = '775';
		
		
		$config_thumb['upload_path']   = 'uploads/Notas/thumb/';
		$config_thumb['allowed_types'] = 'jpg';
		$config_thumb['file_name'] = $tiempo;
		$config_thumb['min_width']  = '335';
		$config_thumb['min_height']  = '245';
		$config_thumb['max_width']  = '360';
		$config_thumb['max_height']  = '272';
	

	
	
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
							unlink(FCPATH.'uploads/Notas/foto/'.$this->input->post('foto'));
							$foto = $tiempo.'.jpg';
						}else{
							redirect("Notas?action=archivo");
						}
					}else{
						$foto= $this->input->post('foto');
					}
						
					
					if (!empty($_FILES['fileThumb']['name']))
						{
							$this->upload->initialize($config_thumb);
							if ($this->upload->do_upload('fileThumb'))
								{
									unlink(FCPATH.'uploads/Notas/thumb/'.$this->input->post('thumb'));
									$thumb = $tiempo.'.jpg';
								}else{
									redirect("Notas?action=archivo");
								}
						}else{
							$thumb = $this->input->post('thumb');
						}
			
			
			

					
			
					$this->Notas_Model->EditarNota($this->input->post('id'),$this->input->post('titulo'), $this->input->post('subtitulo'), $this->input->post('nota'), $thumb, $foto);
			
			}else{
			
				if (!empty($_FILES['fileFoto']['name']))
				{
					$this->upload->initialize($config_foto);
					if ($this->upload->do_upload('fileFoto'))
					{
						$foto = $tiempo.'.jpg';
					}else{
						redirect("Notas?action=archivo");
					}
				}else{
					$foto= '';
				}
				
					if (!empty($_FILES['fileThumb']['name']))
						{
							$this->upload->initialize($config_thumb);
							if ($this->upload->do_upload('fileThumb'))
								{
									$thumb = $tiempo.'.jpg';
								}else{
									redirect("Notas?action=archivo");
								}
						}else{
							$thumb = '';
						}
				
				
				
		
						$this->Notas_Model->AgregaNota($this->input->post('titulo'), $this->input->post('subtitulo'), $this->input->post('nota'), $thumb, $foto);
			
			}
		
		redirect("Notas?action=actualizado");
			
			
			
		}else{
			//If no session, redirect to login page
			redirect('Administrador/', 'refresh');
		}
	
	
	}
	
	public function Borrar($id = 0){
		if ($id > 0){
			$data['resultado'] = $this->Notas_Model->GetNota($id);
			
			unlink(FCPATH.'uploads/Notas/foto/'.$data['resultado'][0]->foto);
			unlink(FCPATH.'uploads/Notas/thumb/'.$data['resultado'][0]->thumb);

				
			$this->Notas_Model->BorrarNota($id);
			redirect("Notas?action=borrado");
		}
	}
	
}
?>