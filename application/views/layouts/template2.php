<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php $this->layout->setTitle('Wacala.tv')?>
	<title><?php echo $this->layout->getTitle(); ?></title>
	<meta name="description" content="<?php echo $this->layout->getDescripcion(); ?>">
	<meta name="keywords" content="<?php echo $this->layout->getKeywords(); ?>" />
	
	<?php $this->layout->css(
	  array(
	    base_url('css/bootstrap.min.css'),
	    base_url('css/main.css')
	    )); ?>
	<?php echo $this->layout->css?>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="application/javascript">$j = jQuery.noConflict();</script>
	<?php $this->layout->js(array(
	    base_url('js/bootstrap.min.js'),
	    base_url('js/main.js'),
	    base_url('js/prototype.js'),
	    base_url('js/scriptaculous.js')
	    )); ?>
	<?php echo $this->layout->js?>  
	
	
</head>

<body style>
	
    <!--<h1>Base CSS</h1>-->
    <!--<p class="lead">Fundamental HTML elements styled and enhanced with extensible classes.</p>-->
    
  
  <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Admin Wacala.tv</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo site_url("home")?>">Home</a></li>
              <li class="active"><a target="_blank" href="http://www.wacala.tv:2095/">Mail</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  
  <div class="container-fluid contenedor-admin">
    <!--<div id="cabecera" class="row-fluid show-grid">
      <div class="span12">
        <img src="<?php echo base_url('img/wacala_logo.png')?>" />
      </div>          
    </div>-->
    
    <div id="menu_admin" class="row-fluid">
      <!--Sidebar content-->
      <div class="span2">
      	<div class="well sidebar-nav">
        <ul class="nav nav-pills nav-stacked">
          <li class="<?php echo ($this->uri->segment(1) == 'post') ? 'active': ''?>"><?php echo anchor('post/index','<i class="icon-film"></i> Trabajos')?></li>
          <!--<li class="<?php echo ($this->uri->segment(1) == 'pagina') ? 'active': ''?>"><?php echo anchor('pagina/index','<i class="icon-file"></i> Páginas')?></li>
          <li class="<?php echo ($this->uri->segment(1) == 'usuario') ? 'active': ''?>"><?php echo anchor('usuario/index','<i class="icon-user"></i> Usuario')?></li> -->          
          <br/>
          <br/>          
          <br/> 
          <br/>
          <li><?php echo anchor('usuario/logout','<i class="icon-off"></i> Salir')?></li>       
        </ul>		
       </div>
      </div>
      <div id="contenido"  class="well span10">
      	 <!--Body content-->
        <?php echo $content_for_layout;/*llama a variable $content_for_layout. codigo que carga dentro del body*/ ?>
      </div>
    </div>
    <div id="pie" class="row-fluid">
      <div class="span12">
        <span>Wacala 2013, todos los derechos reservados</span>
      </div>
    </div>
  </div>
</body>
</html>




