<script src="#!">var HTTP_status = localStorage.getItem("session"); if( HTTP_status != '200'){location.href ='login.php'; }</script>
<?php
	include_once ('controlador/MySql.php');
    include_once ('controlador/servidor/crud_pruebas.php');
       
	$obj = new Clase_CludPruebas();   
    $obj->CreateConnection(); 

    $parametros['codigo']       = strtoupper($_POST['codigo']);
    $parametros['nombre']       = strtoupper($_POST['nombre']);
    $parametros['descripcion']  = strtoupper($_POST['descripcion']);
    $parametros['cantidad']     = $_POST['cantidad'];


    $respuesta = $obj->fn_grabarAticulo( $parametros );

    if( $respuesta ){
        header("Location: /developer/Ferreteria_trabajoFinal/");
    } 

 

?>