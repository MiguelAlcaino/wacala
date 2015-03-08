<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends CI_Controller 
{
	//private $session_id;
	//contructor
	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('template1');
		$this->load->model('post_model');
    $this->load->model('media_model');
    $this->load->helper('html');
		//$this->session_id = $this->session->userdata('login');
	}
	
	public function index()
	{		
		$data['posts']=$this->post_model->getPosts(6,0);
    $data['action'] = $this->uri->segment(2);
    /*
    foreach($data['posts'] as $k => $post){
      $video = json_decode(file_get_contents('http://vimeo.com/api/v2/video/'.$post->link_vimeo.'.json'));
      $data['posts'][$k]->video_rest = $video[0];
    }
    */
  	$this->layout->view('index',$data);	
	}
	
	public function archive()//lista post
	{
		$data['posts']=$this->post_model->getPosts(100,0);
    $data['action'] = $this->uri->segment(2);
    /*
    foreach($data['posts'] as $k => $post){
      $video = json_decode(file_get_contents('http://vimeo.com/api/v2/video/'.$post->link_vimeo.'.json'));
      $data['posts'][$k]->video_rest = $video[0];
    }
     
     */
    $this->layout->view('archive',$data);
	}
  
  public function contacto(){
    $data['action'] = $this->uri->segment(2);
    $this->layout->view('contacto', $data);
  }
  
  public function aboutUs(){
    $this->layout->view('about_us');
  }
  
  public function modalVideo(){
    $data['post_id'] = $this->uri->segment(3);
    $data['post'] = $this->post_model->getPost($data['post_id']);
    $this->load->view('frontend/modal_video', $data);
  }
  
  public function detalle(){
    $data['post_id'] = $this->uri->segment(3);
    $data['post'] = $this->post_model->getPost($data['post_id']);
    $data['imagenes'] = $this->media_model->getImages($data['post_id']);  
    $this->layout->view('detalle',$data);
  }
  
  public function reel(){
    $data['post'] = $this->post_model->getPostReel();
    $this->layout->view('reel', $data);
  }
}