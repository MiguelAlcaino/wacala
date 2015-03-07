<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagina extends CI_Controller 
{
	private $session_id;
	
	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('template2');
		$this->load->model('pagina_model');
		$this->session_id = $this->session->userdata('login');	
	}


	
	public function index()
	{
		if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
		{
			$data['paginas']=$this->pagina_model->getPaginas("100", "0");		
  			$this->layout->view('index', $data);			
		}
		else
		{
			redirect(base_url().'index.php/usuario/login',301);
		}			
		//$data['query']=$this->post_model->getPosts();  		
	}
	
	
	public function newPagina()
	{
		if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
		{
			if($this->input->post())
			{
				if($this->form_validation->run("pagina/newpagina"))
				{					
					$this->createPagina();			
				}
				else
				{
					$this->layout->view('newpagina');					
				}		
			}
			else 
			{
				$this->layout->view('newpagina');
			}	
		}
		else
		{
			redirect(base_url().'index.php/usuario/login',301);
		}		
	}
	
	private function createPagina()
	{
		$datosPagina=array
			(
				"titulo"=>$this->input->post("titulo"),
				"contenido" =>$this->input->post("contenido"),			
				"fecha_creacion"=>date("Y-m-d h:m:s"),
				"fecha_edicion"=>date("Y-m-d h:m:s"),
				"estado"=>$this->input->post("estado"),
				"usuario_id"=>"2"					
			);
			
			$this->id_pagina = $this->pagina_model->insert($datosPagina);
			
			redirect('/pagina/editPagina/'.(string)$id_pagina,301);						
	}
	
	
	public function editPagina()
	{
		if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
		{
			$pagina_id = $this->uri->segment(3);
		
			if($this->input->post())
			{			
				if($this->form_validation->run("pagina/newpagina"))
				{				
					$this->updatePagina();	
				    //$datos=$this->pagina_model->getPagina($this->uri->segment(3));				
					//$this->layout->view("editPagina", compact("datos"));	
					redirect('/pagina/index/'.(string)$id_pagina,301);				
				}
				else
				{
					$datos=$this->pagina_model->getPagina($pagina_id );				
					$this->layout->view("editPagina", compact("datos"));					
				}	
			}
			else
			{					
				$datos=$this->pagina_model->getPagina($pagina_id);
				$this->layout->view("editPagina", compact("datos"));			
			}	
		}
		else
		{
			redirect(base_url().'index.php/usuario/login',301);
		}			
	}
	
	private function updatePagina()
	{
		$datosUpdate=array
			(
				"titulo"=>$this->input->post("titulo"),
				"contenido" =>$this->input->post("contenido"),
				"estado"=>$this->input->post("estado"),
				"fecha_edicion" =>date("Y-m-d h:m:s")
			);
			
			$this->pagina_model->edit($datosUpdate, $this->uri->segment(3));
	}
	
	public function deletePagina()
	{
		
	}

}