<h4>Usuario</h4>
<br/>
<br/>



<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th>Usuario</th>
      <th>Email</th>
      <th>Fecha Creación</th> 
      <th>Fecha Edición</th>  
      <th>Estado</th>
      <th>Acción</th>  
    </tr>
  </thead>
  <tbody>
  	<?php foreach($usuarios as $usuario):?>
	  	<td nowrap="nowrap"><?php echo $usuario->usuario?></td>
	    <td><?php echo $usuario->email?></td>
	    <td><?php echo $usuario->fecha_creacion?></td>
	    <td><?php echo $usuario->fecha_edicion?></td>
	    <td><?php echo $usuario->estado?></td>
	    <td nowrap="nowrap">
	          <?php echo anchor('usuario/editUsuario/'.$usuario->id,'<i class="icon-edit icon-white"></i> Editar',array('class'=>'btn btn-mini btn-success'))?>	       
	    </td>
    <?php endforeach;?>
  </tbody>
</table>




