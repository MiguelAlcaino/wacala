<h3>Cambiar contraseña</h3>


<div align="left">
	<?php
		$atributos = array('id' => 'form', 'name'=>'form');
		echo form_open(null, $atributos);
	?>
	
	<table>
		<tr>
			<td>
				Contraseña actual:
			</td>
			<td>
				<input type="password" maxlength="45" name="password" value="<?php echo set_value("password")?>" />
			</td>
			<td>
				<?php echo form_error('password');?>
			</td>
		</tr>
		<tr>	
			<td>
				Contraseña nueva:
			</td>
			<td>
				 <input type="password" maxlength="45" name="passwordnew" value="<?php echo set_value("passwordnew")?>" />
			</td>
			<td>
				<p style="color: red;"><?php echo form_error('passwordnew');?></p>
			</td>
		</tr>
		<tr>	
			<td>
				Confirmar contraseña nueva:
			</td>
			<td>
				 <input type="password" maxlength="45" name="confpasswordnew" value="<?php echo set_value("confpasswordnew")?>" />
			</td>
			<td>
				<?php echo form_error('confpasswordnew');?>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php
				if($this->session->flashdata('ControllerMessage')!='')
				{
				?>
					<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage');?></p>
				<?php		
				}
				?>	
			</td>			
		</tr>
	</table>
	
	
	


	<hr/>
	
	<?php echo form_submit('mienvio', 'Cambiar contraseña');?>
	
	
	<?php
	echo form_close();
	?>
</div>