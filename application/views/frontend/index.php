<ul id="contenedor_thumbnails" class="thumbnails">
<?php $i=0;?>
<?php foreach($posts as $post):?>
  <?php if($i==0):?>
    <li class="span9" style="margin-right: 4px; margin-left: -2px;">
      <div class="imagen_post red-tooltip" data-toggle="tooltip" >
        <img class="ultimo_trabajo" src="<?php echo base_url('img/ultimo_trabajo_2.png')?>" />
        <iframe src="//player.vimeo.com/video/<?php echo $post->link_vimeo?>?color=9be0b7" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </div>
    </li>
  <?php else:?>
    <li class="span2">
      <div class="imagen_post red-tooltip" style="width: 120px;">
      <div onclick="abrirVideo(<?php echo $post->id?>, '<?php echo $post->titulo?>');" class="encima_thumbnail" style="width: 120px;"></div>
      <div class="titulo_post" style="width: 120px;"></div>
      <span style="width: 120px;" onclick="javascript:$('#mymodal .modal-body').load('<?php echo site_url('frontend/modalVideo/'.$post->id)?>',function(e){$('#mymodal').modal('show');});" class="titulo_texto"><div><?php echo $post->titulo?></div></span>
      <a  href="javascript:$('#mymodal .modal-body').load('<?php echo site_url('frontend/modalVideo/'.$post->id)?>',function(e){$('#mymodal').modal('show');});"><img src="<?php echo base_url("uploads/thumb_".$post->ruta)?>"/></a>
      
      <!--<span class="texto-nuevo">New!</span>-->
      </div>
    </li>
  <?php endif;?>  
  
<?php $i++?>  
<?php endforeach?>
</ul>
<div class="modal hide fade" id="mymodal">
    <table class="modal-header-table">
      <tbody>
        <tr>
          <td class="myModalLabel"></td>
          <td class="linea_header_modal">
            
          </td>
        </tr>
      </tbody>
    </table>
    <!--<div class="modal-header">
      <div id="myModalLabel">
        <div></div>
      </div>
      <div id="linea_header_modal">
        <div></div>
      </div>
    </div> -->
    <div class="modal-body">
      Cargando...
    </div>
    
</div><!-- /.modal-content -->
