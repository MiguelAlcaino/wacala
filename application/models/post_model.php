<?php 
	class post_model extends CI_Model
	{
		function __contruct()
		{
			parent::__construct();	
		}
		
		public function getPosts($cantidad, $registroInicial)//devuelve un rango de posts c
		{			
		   	$query=$this->db			
				->select("post.id, 
				          post.titulo, 
				          post.link_vimeo, 
				          post.descripcion, 
				          post.fecha_creacion, 
				          post.fecha_edicion, 
				          media.ruta")
				->from("post")
				->join('media', 'media.post_id = post.id AND media.orden = 1', 'left')
				->order_by("post.fecha_creacion", "desc")		
        ->where("estado",1)
				->limit($cantidad, $registroInicial)
				->get();
				return $query->result();			
		}	
		
		public function getAllPosts()//devuelve todos los posts con su imagen principal
		{			
		   	$query=$this->db			
				->select("post.id, 
						  post.titulo, 
						  post.link_vimeo, 
						  post.descripcion, 
						  post.fecha_creacion, 
						  post.fecha_edicion, 
						  CASE WHEN post.estado = 0 THEN 'Inactiva' 
						  	   ELSE 'Activo' 
						  END as estado, 
						  media.ruta, 
						  usuario.usuario,
						  CASE WHEN post.reel = 1 THEN 'Si'
						       ELSE 'No'
						  END as reel", FALSE)
				->from("post")
				->join('media', 'media.post_id = post.id AND media.orden = 1', 'left')	
				->join('usuario', 'post.id_usuario = usuario.id')
				->order_by("post.fecha_creacion", "desc")				
				->get();
				return $query->result();			
		}	
		
		
		public function insert($post=array())
		{
			$this->db->insert("post", $post);
			$post_id = $this->db->insert_id();
			
			return $post_id;
		}
		
				
		public function edit($post=array(), $post_id)
		{
		  
      //$post_reel = $this->getPostReel();
      $post_reel = $this->getPost($post_id);
      
			if($post['reel'] == 1)
			{ 
			  if($post_reel[0]->reel == 1){
			    
			  }else{
			    $this->db->where('reel', 1);
          $this->db->update('post', array("reel"=> 0));
			  }
				
			}			
			
			
			$this->db->where('id', $post_id);
			$this->db->update('post', $post);
		}
		
		
		public function delete($post_id)
		{		
			return $this->db->delete('post', array('id' => $post_id));
		}
		
		public function setCuadrosDeStilos($cuadros_de_estilo=array())
		{
						
		}
		
		public function getPost($post_id)
		{
			$where=array("id"=> $post_id);
			$query=$this->db			
				->select("post.id, 
				          post.titulo, 
				          post.link_vimeo, 
				          post.descripcion, 
				          post.fecha_creacion, 
				          post.fecha_edicion,
				          post.estado,
				          post.reel", 
						  FALSE)
				->from("post")
				->where($where)						
				->get();
				return $query->result();
		}
		
		public function contadorImagenes($post_id)
		{
			$query=$this->db
				->select("id")
				->from("media")
				->where(array("post_id"=>$post_id))
				->count_all_results();

				return $query;	
		}
		
		public function getPostReel()
		{
			$where=array("reel"=> 1);
			$query=$this->db
				->select("post.id,
						  post.titulo, 
						  post.link_vimeo, 
						  post.descripcion, 
						  post.fecha_creacion, 
						  post.fecha_edicion, 
						  CASE WHEN post.estado = 0 THEN 'Inactiva' 
						  	   ELSE 'Activo' 
						  END as estado, 
						  media.ruta, 						
						  CASE WHEN post.reel = 1 THEN 'Si'
						       ELSE 'No'
						  END as reel", FALSE)
				->from('post')
				->join('media', 'media.post_id = post.id AND media.orden = 1', 'left')	
				->where($where)
				->get();
				return $query->result();				
		}
	}	
?>