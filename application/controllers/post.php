<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller 
{
  //private $session_id;

  public function __construct()
  {
    parent::__construct();
    $this->layout->setLayout('template2');
    $this->load->model('post_model');
    $this->load->model('media_model');
    $this->load->helper('html');
    $this->session_id = $this->session->userdata('login');
  }
  
  public function index()
  {
    if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
    {
      $data['posts']=$this->post_model->getAllPosts();//getPosts("100", "0");   
        $this->layout->view('index', $data);  
    }
    else
    {
      redirect(base_url().'index.php/usuario/login',301);
    }   
  }
  
    
  public function newPost()
  {
    if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
    {
      if($this->input->post())//se hace post con el boton?
      {
    
        if($this->form_validation->run("post/newpost"))//se cumplen las validaciones? config/form_validation
        {         
          $this->createPost();      
        }
        else//no se cumple
        {
          $this->layout->view('newpost');         
        }   
      }
      else 
      {
        $this->layout->view('newpost');
      }
    }
    else
    {
      redirect(base_url().'index.php/usuario/login',301);
    }     
  }


  private function createPost()
  {
      
    $datosPost=array
    (
      "titulo"=>$this->input->post("titulo"),
      "link_vimeo" =>$this->input->post("link_vimeo"),
      "descripcion"=>$this->input->post("descripcion"),
      "fecha_creacion"=>date("Y-m-d H:i:s"),
      "estado"=>"1",
      "id_usuario"=>$this->session->userdata('id')          
    );
    
    
    $post_id = $this->post_model->insert($datosPost);
    
    
    
    $error = NULL;
    
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';//'pdf|doc|docx';
    //$config['max_size'] = '512000';
    $config['encrypt_name'] = true;
    $config['overwrite'] = false;
    $config['max_width'] = '640';
    $config['max_height'] = '360';
    
        
    $this->load->library('upload', $config);
    
    
    $cont_nuevas_imagenes = 0;
    $orden = 1;
  
    
    while (isset($_FILES['imagen'.$cont_nuevas_imagenes])) 
    {
      if($this->upload->do_upload('imagen'.$cont_nuevas_imagenes))
      {       
        $imagen_datos = $this->upload->data();
        $this->media_model->saveMedia($post_id, $orden, $imagen_datos);
        $orden++; 
        
              
      }
      else
        {         
          $error =  array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('ControllerMessage', $error["error"]);//crea sesion por este formulario solamente
        }
                         
      $cont_nuevas_imagenes++;
    } 
      
      if($error!= null)
      {
        $this->session->set_flashdata('ControllerMessage', $error["error"]);
      }
      /*Array
      (
      [file_name] => mi_pic.jpg
      [file_type] => image/jpeg
      [file_path] => /ruta/a/su/subida/
      [full_path] => /ruta/a/su/subida/jpg.jpg
      [raw_name] => mi_pic
      [orig_name] => mi_pic.jpg
      [client_name] => mi_pic.jpg
      [file_ext] => .jpg
      [file_size] => 22.2
      [is_image] => 1
      [image_width] => 800
      [image_height] => 600
      [image_type] => jpeg
      [image_size_str] => width="800" height="200"
      )
       */
      
      $imagenes_cargadas = $this->media_model->getImages($post_id);
        $config = array();
      foreach($imagenes_cargadas as $imagen_cargada){
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/'.$imagen_cargada->ruta;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width']   = 243;
        $config['height'] = 137;
        $config['new_image'] = './uploads/thumb_'.$imagen_cargada->ruta;
        
        //$this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
      }
      
      redirect('/post/editPost/'. (string)$post_id,301);              
      
  
  }


  public function editPost()
  {
    if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
    {
      $post_id = $this->uri->segment(3);  
      
      if($this->input->post())//presiona boton Actualizar trabajo
      {       
        if($this->form_validation->run("post/editpost"))//se cumplen las validaciones?
        {           
          $this->updatePost($post_id);          
          $datos=$this->post_model->getPost($post_id);
          
          if(count($datos) != 0)
          {
            $datos[0]->imagenes = $this->media_model->getImages($post_id);    
          }
                            
          $this->layout->view("update", compact("datos"));    
        }
        else
        {
          $datos=$this->post_model->getPost($post_id);
          
          if(count($datos) != 0)
          {
            $datos[0]->imagenes = $this->media_model->getImages($post_id);    
          }
          
          $this->layout->view('update', compact("datos"));
        } 
      }
      else
      {
        $datos=$this->post_model->getPost($post_id);
        
        if(count($datos) != 0)  
        {
          $datos[0]->imagenes = $this->media_model->getImages($post_id); 
        }     
                      
        $this->layout->view("update", compact("datos"));        
      }   
    }
    else
    {
      redirect(base_url().'index.php/usuario/login',301);
    }   
  }


  private function updatePost($post_id)
  {
    if (isset($_POST['cbxReel'])) {
      $reel = "1";
    } else {
      $post_actual = $this->post_model->getPost($post_id);
      
      if($post_actual[0]->reel == 1){
        $reel = "1";
      }else{
        $reel = "0";
      }
      
    }
    
    $datosUpdate=array
    (
      "titulo"=>$this->input->post("titulo"),
      "link_vimeo" =>$this->input->post("link_vimeo"),
      "descripcion"=>$this->input->post("descripcion"),
      "estado"=>$this->input->post("estado"),
      "fecha_edicion" => date("Y-m-d H:i:s"),
      "reel" => $reel
    );  
    
    
    
    
    $this->post_model->edit($datosUpdate, $post_id);
    
    

    $ImgEliminadas = $this->input->post("hdnImgEliminadas");    
      
  
    if($this->input->post("imgSerializadas") != '')//reordeno las imagenes
    {
      $orden = 1;
      $imgSerializadas = $this->input->post("imgSerializadas"); 
          
      parse_str($imgSerializadas, $output);   
    
      
      foreach ($output['ulImagenes'] as $key => $media_id) 
      {
        if($ImgEliminadas != '')
        {         
          if(strpos($ImgEliminadas, $media_id.',') === false)
          {
            $this->media_model->editOrden($media_id, $orden);
            $orden++;
          }             
        }
        else//no hay imagenes eliminadas
        {
          $this->media_model->editOrden($media_id, $orden);
          $orden++;
        }     
      }
    }
    else//ordenarlas por BD
    { 
      if($ImgEliminadas != '')
      {
        $orden = 1; 
        $imagenes = $this->media_model->getImages($post_id);  
      
        foreach($imagenes as $imagen)
        {       
          $this->media_model->editOrden($imagen->id, $orden);
        $orden++;       
        }           
      }
    }
    
      
      $orden = $this->media_model->countMediaPost($post_id) + 1;
    
    
    $error = NULL;
    //valido la imagen
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    //$config['max_size'] = '512000';
    $config['encrypt_name'] = true;
    $config['overwrite'] = false;
    $config['max_width'] = '640';
    $config['max_height'] = '360';
    
    
    $cont_nuevas_imagenes = 0;
    
    $this->load->library('upload', $config);
    
    while (isset($_FILES['imagen'.$cont_nuevas_imagenes])) 
    {
      if($this->upload->do_upload('imagen'.$cont_nuevas_imagenes))
      {       
        $imagen_datos = $this->upload->data();
        $this->media_model->saveMedia($post_id, $orden, $imagen_datos);
        $orden++;
      }
                         
      $cont_nuevas_imagenes++;
    }
     
    $imagenes_cargadas = $this->media_model->getImages($post_id);
        
      foreach($imagenes_cargadas as $imagen_cargada){
        if(!file_exists("./uploads/thumb_".$imagen_cargada->ruta)){
          $this->load->library('image_lib');
          $config = array();
          $config['image_library'] = 'gd2';
          $config['source_image'] = './uploads/'.$imagen_cargada->ruta;
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = TRUE;
          $config['width']   = 243;
          $config['height'] = 137;
          $config['new_image'] = './uploads/thumb_'.$imagen_cargada->ruta;
          
         $this->image_lib->initialize($config);
         $this->image_lib->resize(); 
         $this->image_lib->clear();
        }
      }  
    
  }
  
  
  public function deletePost($post_id)
  {
    if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
    {
      
      $imagenes = $this->media_model->getImages($post_id);
      foreach($imagenes as $imagen){
        $this->deleteFile($imagen->id);
        $this->media_model->deleteMedia($imagen->id); 
      }
      $this->post_model->delete($post_id);
      redirect('/post/index/'. (string)$post_id,301);
  
    }
    else
    {
      redirect(base_url().'index.php/usuario/login',301);
    }
  }


  public function getPost($id_post)
  {
      
  }
  
  
  /*public function deleteMedia()
  {
    if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
    {     
      $this->media_model->deleteMedia($this->input->post("id"));      
    } 
  }*/

  public function deleteMedia()
  {
    if($this->session->userdata('logged_in'))//si no esta vacio el usuario se logeo y creo la sesion
    {
      $media_id = $this->input->post("media_id");
      $post_id = $this->input->post("post_id");
      
      $this->deleteFile($media_id);
      
      $ruta = $this->media_model->getMediaRuta($media_id);
      
      $this->media_model->deleteMedia($media_id);       
      
      ordenarMedia($post_id);           
    } 
  }

  private function deleteFile($media_id){
      
    $ruta = $this->media_model->getMediaRuta($media_id);
    $this->media_model->deleteMedia($media_id);       
    
    if(isset($ruta[0]->ruta))
    {
      $dir= "uploads/". $ruta[0]->ruta; //puedes usar dobles comillas si quieres 
      if(file_exists($dir)) 
      { 
        unlink($dir);
        if(file_exists("uploads/thumb_".$ruta[0]->ruta)){
          unlink("uploads/thumb_".$ruta[0]->ruta);
        }
        
      } 
    }
  }
  
  
  private function ordenarMedia($post_id)
  {
    $orden = 1; 
    $imagenes = $this->media_model->getImages($post_id);  
      
    foreach($imagenes as $imagen)
    {       
      $this->media_model->editOrden($imagen->id, $orden);
      $orden++;       
    } 
  }
  
  

}