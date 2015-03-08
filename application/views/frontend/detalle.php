<div>
  <h1 class="titulo_detalle"><?php echo $post[0]->titulo?></h1>
  <iframe id="frame_reel" src="//player.vimeo.com/video/<?php echo $post[0]->link_vimeo?>?color=9be0b7&autoplay=1" width="780" height="439" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
  <div class="well descripcion_detalle">
    <?php echo $post[0]->descripcion?>
  </div>
  <div class="div_imagenes_detalle">
    <?php foreach($imagenes as $imagen):?>
      <img src="<?php echo base_url('uploads/'.$imagen->ruta)?>" class="img-polaroid imagen_detalle" />
    <?php endforeach;?>
  </div>
    <?php //print_r($imagenes)?>
</div>
<?php
    
    
?>