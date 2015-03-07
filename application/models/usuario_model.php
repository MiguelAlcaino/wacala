<?php 
	class usuario_model extends CI_Model{
		
		function __contruct()
		{
			parent::__construct();	
		}
		
		public function logueo($usuario, $password)
		{
			$query=$this->db
				->select("id, usuario, password, tipo_usuario, estado, email")
				->from("usuario")
				->where(array("usuario"=>$usuario, "password"=>$password))
				->get();
				return $query->result();	
		}	
		
		public function changePassword($usuario, $password)
		{
			$this->db->where('id', $usuario);			
			$this->db->update('usuario', array("password"=>$password));
		}
		
	  /*  public function getUsuarios()
		{			
		   	$query=$this->db			
				->select("post.id, post.titulo, post.link_vimeo, post.descripcion, post.fecha_creacion, post.fecha_edicion, media.ruta")
				->from("usuario")				
				->order_by("id", "desc")				
				->get();
				return $query->result();			
		}*/
		
		public function getAllUsers()//devuelve todos los posts con su imagen principal
		{			
		   	$query=$this->db			
				->select("usuario.id, 
						  usuario.usuario, 
						  usuario.email, 
						  usuario.fecha_edicion, 
						  usuario.fecha_creacion, 
						  CASE WHEN usuario.estado = 0 THEN 'Inactivo' 
						  	   ELSE 'Activo' 
						  END as estado", FALSE)
				->from("usuario")			
				->order_by("usuario.usuario", "asc")				
				->get();
				return $query->result();			
		}
		
		public function getUsuario($id_usuario)
		{
			$where=array("id"=> $id_usuario);
			$query=$this->db			
				->select("usuario.id, 
				          usuario.usuario, 
				          usuario.email, 
				          usuario.fecha_edicion, 
				          usuario.fecha_creacion, 
				          CASE WHEN usuario.estado = 0 THEN 'Inactivo' 
						  	   ELSE 'Activo' 
						  END as estado", FALSE)
				->from("usuario")
				->where($where)						
				->get();
				return $query->result();
		}
		
		public function edit($usuario=array(), $usuario_id)
		{			
			$this->db->where('id', $usuario_id);
			$this->db->update('usuario', $usuario);
		}
	}	
?>