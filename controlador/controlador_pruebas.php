<?php
	include_once ('controlador/MySql.php');
	include_once ('controlador/servidor/crud_pruebas.php');
   
	$obj = new Clase_CludPruebas();   
 
    $obj->CreateConnection();
 

	//$request = (object)($_POST);


    $request['opcion'] = 'listarTodo'; 
    $parametros = null;

    if( $request['opcion'] == "listarTodo") { 
 
        $data = $obj->fn_listarTodo();
        print_r($data);
    }
    
 