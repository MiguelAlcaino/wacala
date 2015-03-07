<ul class="thumbnails">
  <?php foreach($posts as $post):?>
    <li class="imagen_li span2">
      <div class="imagen_post_archive red-tooltip">
      <div onclick="abrirVideo(<?php echo $post->id?>, '<?php echo $post->titulo?>');ajustarTituloBarra();" class="encima_thumbnail"></div>
      <div class="titulo_post"></div>
      <span onclick="javascript:$('#mymodal .modal-body').load('<?php echo site_url('frontend/modalVideo/'.$post->id)?>',function(e){$('#mymodal').modal('show');});" class="titulo_texto"><div><?php echo $post->titulo?></div></span>
      <a  href="javascript:$('#mymodal .modal-body').load('<?php echo site_url('frontend/modalVideo/'.$post->id)?>',function(e){$('#mymodal').modal('show');});"><img src="<?php echo base_url("uploads/".$post->ruta)?>"/></a>
      
      <!--<span class="texto-nuevo">New!</span>-->
      </div>
    </li>
  <?php endforeach;?>
</ul>

<div class="modal hide fade" id="mymodal">
    <table class="modal-header-table">
      <tbody>
        <tr>
          <td class="myModalLabel">Trabajo numero 2</td>
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
