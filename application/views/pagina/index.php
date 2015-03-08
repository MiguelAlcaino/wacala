
 	<table class="table table-hover">
  <thead>
    <tr>
      <th>Título</th>    
      <th>Fecha Edición</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($paginas as $pagina):?>
      <tr>
        <td nowrap="nowrap"><?php echo $pagina->titulo?></td>       
        <td nowrap="nowrap"><?php echo $pagina->fecha_edicion?></td>
        <td><?php echo $pagina->estado?></td>
        <td>
          <?php echo anchor('pagina/editPagina/'.$pagina->id,'<i class="icon-edit icon-white"></i> Editar',array('class'=>'btn btn-mini btn-success'))?>          
        </td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>
 	




<script>
  $(".alert").alert();
</script>