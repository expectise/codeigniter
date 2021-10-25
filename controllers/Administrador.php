<?
class Administrador extends CI_Controller{     
     public function __construct()
     {
     	parent::__construct();
     	$this->load->model('Users','',TRUE);
     	$this->load->helper(array('form', 'url'));
     }
     
     public function index()
     	{
     		if($this->session->userdata('logged_in'))
     		{
				redirect('Administrador/home', 'refresh');	
     		}else{
     			//If no session, redirect to login page
				if ($this->uri->segment(2) == null){
					redirect('Administrador/index', 'refresh');
				}else{
					$this->load->view('administrador/index.php');
				}
     		}
     		
     	}
     

     function login()
     {
   
     	//This method will have the credentials validation
     	$this->load->library('form_validation');
     
     	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
     	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
     
     	if($this->form_validation->run() == FALSE)
     	{
     		//Field validation failed.  User redirected to login page
 
     		$this->load->view('administrador/index.php');
     	}else{
     		//Go to private area
     		redirect('Administrador/home', 'refresh');
     	}
     
     }
     
     function check_database($password)
     {
     	//Field validation succeeded.  Validate against database
     	$username = $this->input->post('username');
     
     	//query the database
     	$result = $this->Users->login($username, $password);
     
     	if($result)
     	{
     		$sess_array = array();
     		foreach($result as $row)
     		{
     			$sess_array = array(
     					'id' => $row->id,
     					'username' => $row->user
     			);
     			$this->session->set_userdata('logged_in', $sess_array);
     		}
     		return TRUE;
     	}else{
     		$this->session->unset_userdata('logged_in');
     		$this->form_validation->set_message('check_database', 'Usuario o contraseña inválido');
     		return false;
     	}
     }
    
     
     function logout()
     {
     	$this->session->unset_userdata('logged_in');
     	session_destroy();
     	redirect('Administrador/', 'refresh');
     }
     
 
     
     public function home($offset = 0){
     	if($this->session->userdata('logged_in'))
     	{
     		$data['offset'] = $offset;
     		$data['tipo'] = $this->router->fetch_method();
     		$data['class'] = $this->router->fetch_class();
     			
     		$this->load->view('administrador/header.php', $data);
     		$this->load->view('administrador/menu.php', $data);
     		$this->load->view('administrador/home.php', $data);
     		$this->load->view('administrador/footer.php', $data);
     		 
     	}else{
     		//If no session, redirect to login page
     		redirect('Administrador/', 'refresh');
     	}
     }
     
     
     
     
     

}
?>