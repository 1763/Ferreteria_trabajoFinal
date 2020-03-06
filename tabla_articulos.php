<?php
    include_once ('controlador/MySql.php');
    include_once ('controlador/servidor/crud_pruebas.php');
    
	$obj = new Clase_CludPruebas();   
    $obj->CreateConnection();
    $articulo = $obj->fn_listarTodo();

?>

<!-- tabla  -->    
<div class="container">
 <table class="table">
  <thead >
    <tr class= "bg-success">
      <th scope="col">C&oacute;digo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripci&oacute;n</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Accion</th>
      
    </tr>
  </thead>
  <tbody>
                        <?php   foreach( $articulo as $item){  ?>
                                <tr>
                                    <th scope="row"><?php echo  $item['codigo']; ?></th>
                                    <td><?php echo  $item['nombre']; ?></td>
                                    <td><?php echo  $item['descripcion']; ?></td>
                                    <td><?php echo  $item['cantidad']; ?></td>
                                    <td>
                                        <a class="btn btn-danger" href="eliminar_articulo.php?id_key=<?php echo  $item['id_key']; ?>">Eliminar</a>
                                        <a class="btn btn-warning" href="modificar_articulo.php?id_key=<?php echo  $item['id_key']; ?>">Editar</a>
                                    </td>
                                </tr>

                        <?php } ?>
  </tbody>
</table>

