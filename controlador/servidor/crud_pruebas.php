<?php
class Clase_CludPruebas extends MySql{
  
	public function fn_listarTodo(){
		$query="SELECT  Id               as id_key,	
		                codigo           as codigo,
						nombre           as nombre,
					    descripcion      as descripcion,
                        cantidad         as cantidad
					FROM  articulos
					order by nombre asc";		
					
		$result = $this->ExecuteQuery($query);
		while($row= $this->GetRows($result)){
			$respuesta[]	= array(
                "id_key"		     => $row[0],
                "codigo"             => $row[1],
				"nombre"             => $row[2],
				"descripcion"        => $row[3],
				"cantidad"           => $row[4]
			);
		}    
 		$this->CloseConnection();  
		return (empty($respuesta)) ? [] : $respuesta;
	}

	public function fn_buscarById( $key_id ){
		$query="SELECT  Id               as id_key,	
		                codigo           as codigo,
						nombre           as nombre,
					    descripcion      as descripcion,
                        cantidad         as cantidad
					FROM  articulos
					WHERE id=".$key_id;	
					
		$result = $this->ExecuteQuery($query);
		while($row= $this->GetRows($result)){
			$respuesta[]	= array(
                "id_key"		     => $row[0],
                "codigo"             => $row[1],
				"nombre"             => $row[2],
				"descripcion"        => $row[3],
				"cantidad"           => $row[4]
			);
		}    
 		$this->CloseConnection();  
		return $respuesta;
	}
	
	public function fn_eliminarAticulo( $key_id ){
		$query="DELETE FROM articulos  
				WHERE id=".$key_id;
		$resp =  $this->ExecuteQuery($query);
		$this->CloseConnection();
   		return $resp; 
	}

	public function fn_modificarArticulo( $parametros ){
		$query="UPDATE articulos 
				SET codigo='".$parametros['codigo']."',
					nombre='".$parametros['nombre']."', 
					descripcion='".$parametros['descripcion']."', 
					cantidad=".$parametros['cantidad']." 
				WHERE id=".$parametros['id_key'];
		$respuesta = $this->ExecuteQuery($query);		
		$this->CloseConnection();
   		return $respuesta;
	}

	public function fn_grabarAticulo( $parametros ){
		$query = "INSERT INTO articulos (codigo,nombre,descripcion,cantidad) 
						VALUES('".$parametros['codigo']."',
								'".$parametros['nombre']."',
								'".$parametros['descripcion']."',
								".$parametros['cantidad'].") "; 
		$respuesta = $this->ExecuteQuery($query);
		$this->CloseConnection();
		return $respuesta;
	}
}
?>
 