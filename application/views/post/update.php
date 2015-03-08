<script type="text/javascript" src="<?php base_url('js/funciones.js')?>"></script> 

<h3><em>Actualizar Trabajo</em></h3>


<hr>
<?php
$atributos = array('id' => 'miformulario', 'name' => 'form');
echo form_open_multipart(null, $atributos);//preparar el formulario para hacer envio de archivos-> le indica al navegador que el furmulario puede enviar erchivos
?>


<div class="well">  
<table >
  <tr>
    <td width="105px">
      Código Vimeo:
    </td>
    <td width="800px">
      <input id="post_link" class="input-small" type="text" name="link_vimeo" maxlength="10" value="<?php                      
                                                if($this->input->post()){
                                                  echo set_value("link_vimeo");
                                                }else{
                                                  if($datos != null){
                                                    echo $datos[0]->link_vimeo;
                                                  }
                                                }
                                              ?>"/>
    </td>
    <td>
      <?php echo form_error('link_vimeo');?>
    </td>
  </tr>
	<tr>
		<td width="105px">			
			Título:
		</td>
		<td width="800px">
			<input id="post_titulo" class="input-xxlarge" type="text" name="titulo" maxlength="45" value="<?php 
																		 					   if($this->input->post()){
																		 					   		echo set_value("titulo");
																								}else{
																									if($datos != null){
																										echo $datos[0]->titulo;
																									}
																								}
																						   ?>"/>													
		</td>	
		<td>
			<?php echo form_error('titulo');?>
		</td>			
	</tr>
	
	<tr>
		<td width="105px">
			Descripción:
		</td>
		<td width="800px">
			<textarea id="post_descripcion" name="descripcion" cols="50" rows="10"><?php
																if($this->input->post()){
																	echo set_value("descripcion");
																}else{
																	if($datos != null){echo $datos[0]->descripcion;
																	}
																}
															?>
			</textarea>
																
		</td>
		<td>
			<?php echo form_error('descripcion');?>
		</td>	
	</tr>
	<tr>
		<td width="105px">
			Estado:
		</td>
		<td width="800px">
		  
			<select name="estado" class="span3">
				<option <?php echo $datos[0]->estado == 1 ? 'selected' : '' ?> value="1">Activo</option>
				<option <?php echo $datos[0]->estado == 0 ? "selected='selected'" : '' ?> value="0">Inactivo</option>		
			</select>
			<?php
				if($datos != null){
					if($datos[0]->estado ==1){
						echo 'Estado actual: Activo';
					}else{
						echo 'Estado actual: Inactivo';;
					};
					//isset: saber si existe o no una varible
				}
			?>
		</td>
		<td></td>
	</tr>
	<tr>	
		<td>			
			Reel:
		</td>
		<td>				
			<input type="checkbox" name="cbxReel" value="1" <?php if($datos[0]->reel == 1) { echo "disabled=disabled checked=checked";} ?>/>		
		</td>
	</tr>
</table>
</div>
<br/ >
<br/ >


<!--<div id="divImagenes" style="border: 1px solid #333333; width:1000px;">-->
<div class="well">
  <h4>Ordene las imagenes</h4>
   <div class="alert alert-info">
   <small><ul>
     <li>La primera imagen será la mostrada en el thumbnail de cada video.</li>
     <li>Las imagenes cargadas deben tener dimensión de 640x360 pixels. El sistema no permite otras resoluciones.</li>
     </ul>
   </small>
 </div>
<ul id="ulImagenes" >
		
	<?php 	
	$contImg = 0; 		
			
	if(isset($datos[0]->imagenes) )
	{		
		foreach ($datos[0]->imagenes as $key => $imagen) {	
			$image_properties = array(
	          'src' => base_url('uploads/'.$imagen->ruta),
	          //'alt' => 'Me, demonstrating how to eat 4 slices of pizza at one time',
	          'class' => 'img-thumbnail img-polaroid imagen_li_update',//'post_images',
	          'width' => '200',
	          'height' => '200',
	          //'title' => 'That was quite a night',
	          'rel' => 'lightbox',
	          'id' => 'img_'.$imagen->id	       
			);
			$contImg++;
	?>

	<li id="li_imagen_<?php echo $imagen->id?>" style="float:left; list-style:none;"> 
		<div id="divImages<?php echo '_'.$imagen->id ?>">
			<?php echo img($image_properties);?>
				<i class="icon-remove" onclick="EliminarImagenes('<?php echo $imagen->id;?>','<?php echo $datos[0]->id;?>');"></i>
			<!--<i class="icon-remove" onclick="EliminarImagenes('<?php echo $imagen->id;?>');"></i>-->
		</div>
	</li>


	<?php
		}	
	}			
	?>
		
	<hr style="clear:both;border:0;visibility:none;">

</ul>	
</div>
<span class="btn btn-primary" onclick="AgregarImagenes();"><i class="icon-upload"></i> Agregar Imagen</span>
<div id="campos"></div>


<?php
if($this->session->flashdata('ControllerMessage')!='')
{
?>
	<p style="color: red;"><?php echo 'Error: '.$this->session->flashdata('ControllerMessage');?></p>
<?php		
}
?>	



<script>
	var contador_imagenes =	<?php  echo ($contImg);	?>;	
	var imagen_id = 0;
</script>
	

<br/>
<br/>
<span style="clear:left"></span>
<?php
	echo form_submit('mienvio', 'Actualizar trabajo', "class='btn btn-success'");
?>


<hr/>

<input type="hidden" id="imgSerializadas" name="imgSerializadas"/>
<input type="hidden" id="hdnImgEliminadas" name="hdnImgEliminadas"/>


<?php echo form_close(); ?>


<br/>

<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">	
	//ordenamiento imagenes
	Sortable.create('ulImagenes',{tag:'li',overlap:'horizontal',constraint:false,  
								onChange: function(item){						
							           		var list = Sortable.options(item).element;	    					
							    			$j('#imgSerializadas').val(Sortable.serialize(list));							 
	  										}
	  							}
	  				);


 	//agregar imagenes	
	function AgregarImagenes(){
		
		contador_imagenes++;
		if (contador_imagenes <=5)
		{
			campo = '<li id="li_imagen_'+imagen_id+'"><input type="file" size="20" id="imagenes[' + imagen_id + ']"  name="imagen' + imagen_id + '" /></li>';
			$j("#campos").append(campo);
			
			imagen_id++;
		}	
	}
	
	
	function pintarPrueba(){
				var hdnImgEliminadas = document.getElementById('hdnImgEliminadas');			
			hdnImgEliminadas.value = '80,';
			
			$j('#txtimgEliminadas').val(hdnImgEliminadas.value);
	
	}
	

	
		
	//eliminar Imagenes
	function EliminarImagenes(media_id, post_id)
	{ 		 
		if(confirm('¿Esta seguro que desea eliminar esta imagen?\n ID: '+media_id))
		{
		$j.ajax({
			type: "POST",
		  	url: "<?php echo site_url("post/deleteMedia/"); ?>",
		  	data: { media_id: media_id,
		  			post_id: post_id }
		})
		.done(function( msg ) {
			$( "li_imagen_"+ media_id).remove();
			contador_imagenes--;			
			

			var hdnImgEliminadas = document.getElementById('hdnImgEliminadas');
			hdnImgEliminadas.value = media_id + ',' + hdnImgEliminadas.value;
		  });
		}
	}


    //textarea edicion
	tinymce.init({
    	selector: "textarea"
 	});
</script>




