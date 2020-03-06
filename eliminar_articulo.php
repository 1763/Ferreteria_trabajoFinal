<script src="#!">var HTTP_status = localStorage.getItem("session"); if( HTTP_status != '200'){location.href ='login.php'; }</script>
<?php
	include_once ('controlador/MySql.php');
    include_once ('controlador/servidor/crud_pruebas.php');
       
	$obj = new Clase_CludPruebas();   
    $obj->CreateConnection(); 

	$id_key =  $_GET['id_key'];
 
    $respuesta = $obj->fn_eliminarAticulo( $id_key );
 
    if( $respuesta ){
        header("Location: /developer/Ferreteria_trabajoFinal/");
    } 

    
    
 
