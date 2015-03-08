<h3><em>Actualizar Usuario</em></h3>



<hr>
<?php
$atributos = array('id' => 'miformulario', 'name' => 'form');
echo form_open_multipart(null, $atributos);//preparar el formulario para hacer envio de archivos-> le indica al navegador que el furmulario puede enviar erchivos
?>


        
<table >
	<tr>
		<td>
			Usuario:
		</td>
		<td>
		<?php
				if($datos != null){
					echo $datos[0]->usuario; 
				}
			?>
		</td>	
	</tr>	
		<td width="5px">			
			Email:
		</td>
		<td width="500px">
			<input  class="input-xxlarge" type="text" name="email" maxlength="45" value="<?php 
																		 					   if($this->input->post()){
																		 					   		echo set_value("email");
																								}else{
																									if($datos != null){
																										echo $datos[0]->email;
																									}
																								}
																						   ?>"/>													
		</td>	
		<td>
			<?php echo form_error('email');?>
		</td>			
	</tr>
	
	
	<tr>
		<td width="5px">
			Estado:
		</td>
		<td width="500px">			
			<?php 
				if($datos != null){
					echo $datos[0]->estado;						
				}
			?>
		</td>
		<td></td>
	</tr>	
</table>
<br/ >
<br/ >
<br/>
<br/>
<span style="clear:left"></span>
<?php
	echo form_submit('mienvio', 'Actualizar usuario');
?>


<hr/>
<?php echo form_close(); ?>
<br/>

<?php echo anchor('usuario/changepassword','Cambiar contraseña')?>

<script type="text/javascript">	
</script>