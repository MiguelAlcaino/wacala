<?php 
	class frontend_model extends CI_Model
	{
		function __contruct()
		{
			parent::__construct();	
		}
		
		public function getPosts()
		{
			
			$where=array("estado"=> 1);			
			$query=$this->db			
				->select("id,titulo,link_vimeo,descripcion,fecha_creacion, fecha_edicion")
				->from("post")
				->where($where)		
				->order_by("fecha_creacion", "desc")		
				->get();
				return $query->result();
		
		}	
		
	}	
?>