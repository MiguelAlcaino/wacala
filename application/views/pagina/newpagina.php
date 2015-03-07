<table width="100%">
	<tr>
		<td align="center">
			New Pagina
		</td>
	</tr>
	<tr>
		<td>	
			<?php
				$atributos = array('id' => 'formularioNuevaPagina', 'name'=>'form');
				echo form_open(null, $atributos);
			?>

			<table>
				<tr>
					<td>
						Título:									
					</td>
					<td>
						<input type="text" maxlength="45" style="width:400px;" name="titulo" value="<?php echo set_value("titulo");?>"/>
					</td>
					<td>
						<p style="color: red;"><?php echo form_error('titulo');?></p>
					</td>
				</tr>
				<tr>
					<td>
						Contenido:
					</td>
					<td>
						<textarea name="contenido" style="width:400px;" cols="500" rows="10"><?php echo set_value("contenido");?></textarea>
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
					</td>
					<td></td>
				</tr>
			</table>
			<hr/>
			<?php
				echo form_submit('mienvio', 'Crear Página');
			?>

			<?php
				echo form_close();
			?>

		</td>
	</tr>
</table>

<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">		  
	tinymce.init({
    	selector: "textarea"
 	});
</script>