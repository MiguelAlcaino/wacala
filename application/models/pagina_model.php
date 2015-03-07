<?php 
	class pagina_model extends CI_Model
	{
		function __contruct()
		{
			parent::__construct();	
		}	 
		 
		public function getPaginas($cantidad, $registroInicial)
		{			
			$query=$this->db			
				->select("id, titulo, contenido, fecha_creacion, fecha_edicion, usuario_id, CASE WHEN estado = 0 THEN 'Inactiva' ELSE 'Activa' END as estado", FALSE)
				->from("pagina")
				->order_by("id", "asc")	
				->limit($cantidad, $registroInicial)							
				->get();
				return $query->result();		
		}	
		
	//case when ord.name is null then orc.name else ord.name end as name
		
		public function insert($pagina=array())
		{
			$this->db->insert("pagina", $pagina);
			$id_pagina = $this->db->insert_id();
			
			return $id_pagina;
		}
		
		public function edit($pagina=array(), $pagina_id)
		{
					
			$this->db->where('id', $pagina_id);			
			$this->db->update('pagina', $pagina);		
		}
		
		public function delete(int $pagina_id)
		{
			$this->db->delete('pagina', array('id' => $pagina_id));
			return true;		
		}
		
		public function getPagina($pagina_id)
		{
			$where=array("id"=> $pagina_id);			
			$query=$this->db			
				->select("titulo, contenido, fecha_creacion, fecha_edicion, usuario_id, estado")
				->from("pagina")
				->where($where)						
				->get();
				return $query->result();				
		}
	}	
?>