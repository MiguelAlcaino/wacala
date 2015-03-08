<h3><em>Editar Pagina</em></h3>

<table width="100%">
	
	<tr>
		<td>	
			<?php
				$atributos = array('id' => 'formEditPagina', 'name'=>'form');
				echo form_open(null, $atributos);
			?>

			<table>
				<tr>
					<td>
						Título:									
					</td>
					<td>
						<input type="text" maxlength="45" style="width:400px;" name="titulo" value="<?php if($this->input->post()){echo set_value("titulo");
																										}else{if($datos != null){echo $datos[0]->titulo;}}
																											?>"/>
					</td>
					<td>					
						<?php echo form_error('titulo');?>
					</td>
				</tr>
				<tr>
					<td>
						Contenido:
					</td>
					<td>
						<textarea name="contenido" style="width:400px;" cols="500" rows="10"><?php if($this->input->post()){echo set_value("contenido");}
																									else{if($datos != null){echo $datos[0]->contenido;}}
																									?></textarea>
					</td>
					<td>
						<?php echo form_error('contenido');?>
					</td>
				</tr>
				<tr>
					<td>
						Estado:
					</td>
					<td>
						<select name="estado"  style="width:100px;">
							<option value="1">Activo</option>
							<option value="0">Inactivo</option>		
						</select>
						<?php
							if($datos != null){
								if($datos[0]->estado ==1){echo 'Estado actual: Activo';}else{echo 'Estado actual: Inactivo';;};
								//isset: saber si existe o no una varible
							}
						?>
					</td>
					<td>
						
					</td>
				</tr>
			</table>
			<hr/>
			<?php
				echo form_submit('mienvio', 'Actualizar Página');
			?>
			<?php
				echo form_close();
			?>
		</td>
	</tr>
</table>

<?php if(isset($datos)) print_r($datos); ?>

<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">		  
	tinymce.init({
    	selector: "textarea"
 	});
</script>

