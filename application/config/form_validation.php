<?php
$config=array
(   
	'post/newpost'
		=> array(
			array('field' => 'titulo',			'label' => 'Titulo',			'rules' => 'required|is_string|trim|xss_clean|max_length[45]'),
            array('field' => 'link_vimeo',		'label' => 'Link Vimeo',		'rules' => 'required|is_natural|trim|xss_clean'),
            array('field' => 'descripcion',		'label' => 'Descripcion',		'rules' => 'required|is_string|trim|xss_clean|max_length[8000]')
		),
        
		
	'post/editpost'
		=> array(
			array('field' => 'titulo',			'label' => 'Titulo',			'rules' => 'required|is_string|trim|xss_clean|max_length[45]'),
            array('field' => 'link_vimeo',		'label' => 'Link Vimeo',		'rules' => 'required|is_natural|trim|xss_clean|max_length[200]'),
            array('field' => 'descripcion',		'label' => 'Descripcion',		'rules' => 'required|is_string|trim|xss_clean|max_length[8000]')
		),
		
		
	'pagina/newpagina'
		=> array(
			array('field' => 'titulo',			'label' => 'Título',			'rules' => 'required|is_string|trim|xss_clean|max_length[45]'),
            array('field' => 'contenido',		'label' => 'Contenido',			'rules' => 'required|is_string|trim|xss_clean|max_length[2000]')//,
            //array('field' => 'estado',			'label' => 'Estado',			'rules' => 'required|xss_clean|validaSelect')      
		),
		
	'usuario/login'
		=> array(
			array('field' => 'usuario',			'label' => 'Usuario',			'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'password',		'label' => 'Contraseña',		'rules' => 'required|is_string|trim|xss_clean')     
		),
		
		
	'usuario/changepassword'
		=> array(
			array('field' => 'password',		'label' => 'Contraseña actual',				'rules' => 'required|is_string|trim|xss_clean|max_length[45]|min_length[6]'),
            array('field' => 'passwordnew',		'label' => 'Contraseña nueva',				'rules' => 'required|is_string|trim|xss_clean|max_length[45]|min_length[6]'),
            array('field' => 'confpasswordnew',	'label' => 'Confirmacion contraseña nueva',	'rules' => 'required|is_string|trim|xss_clean|max_length[45]|min_length[6]')
		),			
        
	'usuario/editusuario'
		=> array(
			array('field' => 'email',			'label' => 'Email',							'rules' => 'required|is_string|trim|xss_clean|max_length[45]|min_length[6]|valid_email')
		),
); 

