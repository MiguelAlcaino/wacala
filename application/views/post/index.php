

<?php echo anchor('post/newPost/','<i class="icon-film icon-white"></i> Nuevo Trabajo',array('class'=>'btn btn-primary'))?>
<br/>
<br/>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Título</th>
      <th>Reel</th>
      <th>Fecha Creación</th>
      <th>Usuario Creación</th>
      <th>Fecha Edición</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($posts as $post):?>
      
      <?php
        $clase_fila = "";
        if($post->reel == "Si"){
          $clase_fila = "success";
        }else{
          if($post->estado == "Inactiva"){
            $clase_fila = "error"; 
          }
        }
      ?>
      <tr class="<?php echo $clase_fila?>">
        <td><?php echo $post->titulo?></td>
        <td><?php echo $post->reel?></td>
        <td><?php echo $post->fecha_creacion?></td>
        <td><?php echo $post->usuario?></td>
        <td><?php echo $post->fecha_edicion?></td>
        <td><?php echo $post->estado?></td>
        <td >
          <?php echo anchor('post/editPost/'.$post->id,'<i class="icon-edit icon-white"></i> Editar',array('class'=>'btn btn-mini btn-success'))?>
          <?php echo anchor('post/deletePost/'.$post->id,'<i class="icon-trash icon-white"></i> Eliminar',array('class'=>'btn btn-mini btn-danger',
		  																									    'onclick'=> 'return confirmar('.$post->id.',\''.$post->titulo.'\');'))?>        
        </td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>


<script>
	function confirmar(idTrabajo, tituloTrabajo)
	{
		if(confirm('ID:'+idTrabajo+'\nTítulo:'+tituloTrabajo+ '\n\n¿Esta seguro que desea eliminar este trabajo?'))
			return true;
		else
			return false;
	}
	

  $(".alert").alert();
</script>
