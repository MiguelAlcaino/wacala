<h3>Login</h3>


<div align="left">
	<?php
		$atributos = array('id' => 'form', 'name'=>'form');
		echo form_open(null, $atributos);
	?>
	
	<table>
		<tr>
			<td>
				Usuario:
			</td>
			<td>
				<input type="text" maxlength="45" name="usuario" value="<?php echo set_value("usuario")?>" />
			</td>
		</tr>
		<tr>	
			<td>
				Contraseña:
			</td>
			<td>
				 <input type="password" maxlength="45" name="password" value="<?php echo set_value("password")?>" />
			</td>
		</tr>
		<tr>
			<td colspan="2">
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
	
	
	
	<?php echo validation_errors(); ?>

	<hr/>
	
	<?php echo form_submit('mienvio', 'Login');?>
	
	
	<?php
	echo form_close();
	?>
</div>