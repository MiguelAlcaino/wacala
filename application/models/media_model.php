<?php 
	class media_model extends CI_Model
	{
		function __contruct()
		{
			parent::__construct();	
		}	 
		 
		public function getMediasByEntidadNombreAndEntidadId(string $entidad_nombre, string $entidad_id)
		{
			$where=array("id"=> $pagina_id);
			$query=$this->db			
				->select("titulo, contenido, fecha_creacion, fecha_edicion", "id_usuario", "estado")
				->from("media")
				->where($where)						
				->get();
				return $query->result();		
		}
		
		
		public function saveMedia($post_id, $orden, $imagen_datos=array())
		{
	
			
			if($imagen_datos != null)
			{				
				$datosMedia=array
				(
					"titulo"=>"imagen".$orden,//$imagen_datos['titulo'],
					"tipo_archivo" =>$imagen_datos['file_type'],
					"ruta"=>$imagen_datos['file_name'],
					"fecha_creacion"=>date("Y-m-d h:m:s"),
					"orden" => $orden,
					"post_id" => $post_id								
				);
				
				$this->db->insert("media", $datosMedia);
				//$media_id = $this->db->insert_id();	

			}			
		}
	

		public function getImages($post_id)
		{
			$where=array("post_id"=> $post_id);
			
			$query=$this->db			
				->select("media.id, media.titulo, media.ruta")
				->from("media")	
			    ->where($where)		
				->order_by("media.orden", "asc")
				->get();
				return $query->result();
		}
		
		
		public function editOrden($media_id, $orden)
		{
			$update=array("orden"=>$orden);
			$where=array("id"=>$media_id);
			$this->db->where($where);			
			$this->db->update('media', $update);
		}
		
		
		public function deleteMedia($media_id)
		{
			return $this->db->delete('media', array('id' => $media_id));	
		}
		
		
		public function countMediaPost($post_id)
		{
			$query=$this->db
				->select("id")
				->from("media")
				->where(array("post_id"=>$post_id))
				->count_all_results();
			
				return $query;	
			
		}
		
		
		public function getMediaRuta($media_id)
		{
			$where=array("id"=> $media_id);
			$query=$this->db			
				->select("ruta")
				->from("media")
				->where($where)						
				->get();
				return $query->result();
		}
		
	}
?>