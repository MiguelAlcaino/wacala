<script type="text/javascript" src="<?php echo base_url('js/funciones.js')?>"></script>
<h3><em>Nuevo Trabajo</em></h3>
<hr>
<?php
$atributos = array('id' => 'formulario', 'name' => 'form');
echo form_open_multipart(null, $atributos);//preparar el formulario para hacer envio de archivos-> le indica al navegador que el furmulario puede enviar erchivos
?>
<table>
  <tr>
    <td width="105px">
      Código Vimeo:
    </td>
    <td width="200px">
      <input id="post_link" onchange="cambiarLinkVimeo(this)" class="input-small" type="text" name="link_vimeo"  placeholder="Link Vimeo" value="<?php echo set_value("link_vimeo");?>"/>
    </td>
    <td>
      <?php echo form_error('link_vimeo');?>
    </td>
  </tr>
	<tr>
		<td width="105px"> 
			Título:
		</td>
		<td width="200px">
			<input id="post_titulo" class="input-xxlarge" type="text" maxlength="45" name="titulo"  placeholder="Título" value="<?php echo set_value("titulo");?>"/>
		</td>	
		<td>
			<?php echo form_error('titulo');?>
		</td>			
	</tr>
	
	<tr>
		<td width="105px">
			Descripción:
		</td>
		<td width="200px">
			<textarea id="post_descripcion" class="form-control" rows="10" cols="50" name="descripcion"><?php echo set_value("descripcion");?></textarea>
		</td>
		<td>
			<?php echo form_error('descripcion');?>
		</td>	
	</tr>
	
</table>

<?php
if($this->session->flashdata('ControllerMessage')!='')
{
?>
	<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage');?></p>
<?php		
}
?>	

<br />
<div class="well">
  <h4>Seleccione imagenes para ser cargadas</h4>
   <div class="alert alert-info">
   <small><ul>
     <li>La primera imagen será la mostrada en el thumbnail de cada video.</li>
     <li>Las imagenes cargadas deben tener dimensión de 640x360 pixels. El sistema no permite otras resoluciones.</li>
     </ul>
   </small>
 </div>
<span class="btn" onclick="AgregarImagenes();"><i class="icon-plus-sign"></i> Agregar Imagen</span>
<div id="campos"></div>
</div>

 
 
<br/>
<br/>

<?php
	//echo validation_errors();
?>

<?php

echo form_submit('mienvio', 'Crear trabajo', 'class="btn btn-success"');
?>


<hr/>
<?php echo form_close();?>



<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">
	var imagen_id = 0;
		
	function AgregarImagenes(){
	
		if (imagen_id <=4)
		{
			campo = '<li id="li_imagen_'+imagen_id+'"><input type="file" size="20" id="imagen' + imagen_id + '"  name="imagen' + imagen_id + '"  /></li>';
			$j("#campos").append(campo);
			imagen_id++;
		}	
	}
	
	
	tinymce.init({
    	selector: "textarea"
 	});
</script>






