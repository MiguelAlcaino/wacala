<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	private $session_id;
	//contructor
	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('template2');
		$this->load->model('usuario_model');
		$this->session_id = $this->session->userdata('login');
	}

	public function index()
	{
		
		if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
		{
			//print_r($this->session->all_userdata());
			//exit;
			$data['usuarios']=$this->usuario_model->getAllUsers();//getPosts("100", "0");		
  			$this->layout->view('index', $data);
										
		/*	$datos = array(		
						'id' => $this->session->userdata('id'),				
						'usuario' => $this->session->userdata('usuario'),
						'tipo_usuario' => $this->session->userdata('tipo_usuario'),
						'email' => $this->session->userdata('email')											
			);			*/

			//$this->layout->view('index', compact("datos"));
		}
		else 
		{
			redirect(base_url().'index.php/usuario/login',301);
		}		
	}	
	
	public function login()
	{
		//print_r($this->session->all_userdata());
		//exit;						
				
		if($this->input->post())
		{
			$datos=$this->usuario_model->logueo($this->input->post("usuario", true), sha1($this->input->post("password",true)));
						
			if($datos!=null)
			{
				$this->session->set_userdata("wacala_usuario");//nombre sesion				
				
				$newdata = array(
								'id' => $datos[0]->id,
								'usuario' => $datos[0]->usuario,
								'password' => $datos[0]->password,
								'tipo_usuario' => $datos[0]->tipo_usuario,
								'estado' => $datos[0]->estado,
								'email' => $datos[0]->email,
								'logged_in' => TRUE
				);
				$this->session->set_userdata($newdata);
								
				redirect(base_url().'index.php/post/index',301);	
			}
			else
			{
				$this->session->set_flashdata('ControllerMessage', 'Usuario y/o contraseña inválida.');
				redirect(base_url().'index.php/usuario/login',301);	
			}			
		}else{
			$this->layout->view("login");	
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata(array('id' => '', 'usuario' => '', 
											 'tipo_usuario' => '',	'estado' => '',
											 'logged_in' => FALSE));//se pueden porner mas si esque hay que limpiarlos
		$this->session->sess_destroy("wacala_usuario");//nombre session
		redirect(base_url().'index.php/usuario/login', 301);
	}

	public function changePassword()
	{
		if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
		{
			if($this->input->post())
			{
				if($this->form_validation->run("usuario/changepassword"))//se cumplen las validaciones? config/form_validation
				{
					if(sha1($this->input->post("password", true)) == $this->session->userdata('password'))
					{
						if($this->input->post("passwordnew", true) == $this->input->post("confpasswordnew", true))
						{
							$this->usuario_model->changePassword($this->session->userdata('id'), sha1($this->input->post("passwordnew",true)));//cambiar password
							$this->layout->view("changepassword");
						}
						else
						{
							//error contraseña no coincide
							$this->session->set_flashdata('ControllerMessage', 'La nueva contraseña con su confirmacion no coinciden.');
							redirect(base_url().'index.php/usuario/changepassword',301);	
						}			
					}
					else
					{
						//error password actual incorrecto
						$this->session->set_flashdata('ControllerMessage', 'Contraseña actual inválida.');
						redirect(base_url().'index.php/usuario/changepassword',301);	
					}		
				}
				else
				{
					$this->layout->view('changepassword');	
				}		
							
			}
			else
			{
				$this->layout->view("changepassword");
			}
		}
		else
		{
			redirect(base_url().'index.php/usuario/login',301);
		}		
	}

	public function editUsuario()
	{
		if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
		{
			$usuario_id = $this->uri->segment(3);	
			
			if($this->input->post())//presiona boton Actualizar trabajo
			{				
				if($this->form_validation->run("usuario/editusuario"))//se cumplen las validaciones?
				{						
					$this->updateUsuario($usuario_id);					
					$datos=$this->usuario_model->getUsuario($usuario_id);														
					$this->layout->view("update", compact("datos"));		
				}
				else
				{
					$datos=$this->usuario_model->getUsuario($usuario_id);					
					$this->layout->view('update', compact("datos"));
				}	
			}
			else
			{
				$datos=$this->usuario_model->getUsuario($usuario_id);			    						
				$this->layout->view("update", compact("datos"));				
			}		
		}
		else
		{
			redirect(base_url().'index.php/usuario/login',301);
		}	
		
	}

	private function updateUsuario($usuario_id)
	{
		$datosUpdate=array
		(
			"email"=>$this->input->post("email"),
			"fecha_edicion"	=> date("Y-m-d h:m:s")
		);	
			
		$this->usuario_model->edit($datosUpdate, $usuario_id);
	}


}




