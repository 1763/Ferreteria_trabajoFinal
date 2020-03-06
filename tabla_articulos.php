<?php
    include_once ('controlador/MySql.php');
    include_once ('controlador/servidor/crud_pruebas.php');
    session_start();

	$obj = new Clase_CludPruebas();   
    $obj->CreateConnection();
    
    if( isset($_GET['buscar'])){
      $articulo = $obj->fn_buscarTodo( $_GET['buscar'] );

    }else{
      $articulo = $obj->fn_listarTodo();

    }


?>
<script src="#!">var HTTP_status = localStorage.getItem("session"); if( HTTP_status != '200'){location.href ='login.php'; }</script>
<!-- tabla  -->    
 <table class="table">
  <thead >
    <tr class= "bg-success">
      <th scope="col">C&oacute;digo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripci&oacute;n</th>
      <th scope="col">Cantidad</th>
      <?php if( $_SESSION["tiposuario"] == 'ADMINISTRADOR'){ ?>
      <th scope="col">Accion</th>
      <?php } ?>
      
    </tr>
  </thead>
  <tbody>
                        <?php   foreach( $articulo as $item){  ?>
                                <tr>
                                    <th scope="row"><?php echo  $item['codigo']; ?></th>
                                    <td><?php echo  $item['nombre']; ?></td>
                                    <td><?php echo  $item['descripcion']; ?></td>
                                    <td><?php echo  $item['cantidad']; ?></td>
                                    <?php if( $_SESSION["tiposuario"] == 'ADMINISTRADOR'){ ?>

                                    <td>
                                        <a class="btn btn-danger" href="eliminar_articulo.php?id_key=<?php echo  $item['id_key']; ?>">Eliminar</a>
                                        <a class="btn btn-warning" href="modificar_articulo.php?id_key=<?php echo  $item['id_key']; ?>">Editar</a>
                                    </td>
                                    <?php } ?>

                                </tr>

                        <?php } ?>
  </tbody>
</table>

