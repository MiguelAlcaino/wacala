<?php date_default_timezone_set("Chile/Continental");?>
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
<link rel="stylesheet" href="<?php echo base_url('fonts/HelveticaNeueLTStd-MdCn/helveticaneueltstd-mdcn.css')?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url('fonts/AkzidenzGrotesk-LightCond/akzidenzgrotesk-lightcond.css')?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url('fonts/HelveticaNeueLTStd-LtCnO/helveticaneueltstd-ltcno.css')?>" type="text/css"/>
<?php $this->layout->js(array(
    base_url('js/jquery-1.11.1.min.js'),
    //'http://code.jquery.com/jquery-1.10.1.min.js',
    //'http://code.jquery.com/jquery-migrate-1.2.1.min.js',
    base_url('js/bootstrap.min.js'),
    base_url('js/jquery.waitforimages.min.js'),
    base_url('js/main.js')
    )); ?>
<?php echo $this->layout->js?>

<script>
  function abrirVideo(id, titulo){
  $('#mymodal .modal-body').load('<?php echo site_url('frontend/modalVideo/')?>/'+id,
    function(e){$('#mymodal').modal('show');
    });
  //$('.myModalLabel').text(titulo+" (Ver más)");
  $('.myModalLabel').empty();
  $('.myModalLabel').append("<a href='<?php echo site_url('frontend/detalle/')?>/"+ id +"'>"+titulo+"</a>");
  //$('#myModalLabel').width($('#myModalLabel div').width());
  //$('#linea_header_modal').width($('#myModalLabel').width());
}
  function ajustarTituloBarra(){
    
    
  }
</script>

</head>

<body>
  <div  id="contenedor" class="container">
    <div id="contenedor_central" class="span11">
    <div id="cabecera" class="span11">
        <img src="<?php echo base_url('img/Logo_Wacala_300.jpg')?>" />
        <!-- <div id="barra_bajo_logo"></div> -->         
    </div>
    <div id="menu" class="span11">
        <ul id="menu_elementos" >
          <li class="<?php echo ($this->uri->segment(1) == 'home') || ($this->uri->segment(1) == '') ? 'active': ''?>"><div><?php echo anchor('frontend/index','HOME')?><div class="barra_bajo_boton_menu"></div></div></li>
          <li class="<?php echo ($this->uri->segment(1) == 'work') ? 'active': ''?>"><div><?php echo anchor('frontend/archive','WORK')?><div class="barra_bajo_boton_menu"></div></div></li>
          <li class="<?php echo ($this->uri->segment(1) == 'reel') ? 'active': ''?>"><div><?php echo anchor('frontend/reel','REEL')?><div class="barra_bajo_boton_menu"></div></div></li>
          <li class="<?php echo ($this->uri->segment(1) == 'aboutUs') ? 'active': ''?>"><div><?php echo anchor('frontend/aboutUs','ABOUT US')?><div class="barra_bajo_boton_menu"></div></div></li>
          <li class="<?php echo ($this->uri->segment(1) == 'contact') ? 'active': ''?>"><div class="ultimo"><?php echo anchor('frontend/contacto', 'CONTACT')?><div class="barra_bajo_boton_menu"></div></div></li>
        </ul>
        <div id="barra_bajo_menu"></div>
      </div>
      
      <div id="contenido" class="span11">
        <?php echo $content_for_layout;/*llama a variable $content_for_layout. codigo que carga dentro del body*/ ?>
        <div id="barra_arriba_footer"></div>
      </div>
      
        <div id="footer" class=" span11">
          <div id="cajon_social">
            <a href="https://es-es.facebook.com/pages/Wacala-design-animation/173554562794086" target="_blank" alt="Facebook Wacala"><img onmouseout="this.src='<?php echo base_url("img/icons/facebook_naranjo.png")?>'" onmouseover="this.src='<?php echo base_url("img/icons/facebook_color.png")?>'" src="<?php echo base_url("img/icons/facebook_naranjo.png")?>" /></a>
            <a href="https://www.behance.net/wacalada" target="_blank" alt="Behance Wacala"><img  onmouseout="this.src='<?php echo base_url("img/icons/behance_naranjo.png")?>'" onmouseover="this.src='<?php echo base_url("img/icons/behance_color.png")?>'" src="<?php echo base_url("img/icons/behance_naranjo.png")?>" /></a>
            <a href="https://twitter.com/wacalada" target="_blank" alt="Twitter Wacala"><img onmouseout="this.src='<?php echo base_url("img/icons/twitter_naranjo.png")?>'" onmouseover="this.src='<?php echo base_url("img/icons/twitter_color.png")?>'" src="<?php echo base_url("img/icons/twitter_naranjo.png")?>" /></a>
            <a alt="Vimeo Wacala"  href="http://vimeo.com/user16736817" target="_blank"><img onmouseout="this.src='<?php echo base_url("img/icons/vimeo_naranjo.png")?>'" onmouseover="this.src='<?php echo base_url("img/icons/vimeo_color.png")?>'" src="<?php echo base_url("img/icons/vimeo_naranjo.png")?>" /></a>
          </div>
          <div id="cajon_izq">
            <div id="wacala_footer">wacala</div>
            <div id="wacala_footer_slogan">design &amp; animation</div>
          </div>
          <div id="pipe_orange"></div>
          <div id="cajon_der">
            <div id="primero">
              <img class="icono" id="icono_casa" src="<?php echo base_url('img/iconos/iconos_const_bk-01.png')?>"> <img class="texto_imagen" src="<?php echo base_url("img/wacala_direccion.png")?>" />
              <img class="icono" id="icono_correo" src="<?php echo base_url('img/iconos/iconos_const_bk-02.png')?>"> <img class="texto_imagen" src="<?php echo base_url("img/wacala_email.png")?>" />
            </div>
            <div id="segundo">
              <img class="icono" id="icono_telefono" src="<?php echo base_url('img/iconos/iconos_const_bk-03.png')?>"> <span></span><img class="texto_imagen" src="<?php echo base_url("img/wacala_telefono.png")?>" />
            </div>
          </div>
        </div>
    
    </div>
  </div>
  <script>
    //ajustarContenedorCentral();

    $( window ).resize(function() {
      ajustarContenedorCentral();
      console.log('Ventana redimensionada'); 
    });
    $('#contenedor').waitForImages(function() {
        // All descendant images have loaded, now slide up.
      console.log('IMAGENES CARGADAS CON LA AYUDA DEL PLUGIN');
      //alert("IMAGENES CARGADAS EN ALERT");
      ajustarContenedorCentral();

    });
  </script>
</body>
</html>