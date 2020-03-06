<?php
class Clase_CludPruebas extends MySql{
  
	public function fn_listarTodo(){
		$query="SELECT  id          as codigo,	
					    nombre      as nombre,
                        apellido    as apellido
					FROM  prueba";		
					
		$result = $this->ExecuteQuery($query);
		while($row= $this->GetRows($result)){
			$respuesta[]	= array(
                "codigo"		=> $row[0],
                "nombre"        => $row[1],
                "apellido"      => $row[2]
			);
		}    
 		$this->CloseConnection();  
 
		return $respuesta;
	}
 



	public function categoriagurda( $parametros ){
	$respuesta = null;
		 
		$query = "INSERT INTO categoria(descripcion) VALUES('".$parametros['descripcion']."') "; 
			$this->ExecuteQuery($query);
			$respuesta	= array(
				"Respuesta"	=> "Se a registrado correctamente"
			);
	
		$this->CloseConnection();
		return json_encode($respuesta);
	}

	public function cargarTodosmModulos(){
		$query="SELECT 	id 		as id,
						descripcion 	as descripcion
				FROM categoria  ";
		$result = $this->ExecuteQuery($query);
		while($row= $this->GetRows($result)){
			$resp[]	= array(
 				"id"		=> $row[0], 
				"descripcion"		=> utf8_encode($row[1] )
			);
		}    
		$this->CloseConnection();
   		return json_encode($resp); 
	}

	public function modificarModulo( $parametros ){
		$query="UPDATE categoria SET descripcion='".$parametros['descripcion']."' WHERE id=".$parametros['id'];
		$this->ExecuteQuery($query);
 			$resp	= array( 
				"Respuesta"		=> "Se actualizo correctamente!"
			);
		
		$this->CloseConnection();
   		return json_encode($resp); 
	}

	public function btnEliminarModulo( $parametros ){
		$query="DELETE FROM categoria  WHERE id=".$parametros['id'];

 		$this->ExecuteQuery($query);
 			$resp	= array( 
				"Respuesta"		=> "Se elimino correctamente!"
			);
		
		$this->CloseConnection();
   		return json_encode($resp); 
	}
		




	
		public function cargarTipos(){
			$query="SELECT  id as id, categoria as categoria,
							sitio as sitio, localizacion as localizacion, costo as costo, descripcion as descripcion, mutimedia as mutimedia from sitios";
			$result = $this->ExecuteQuery($query);
			while($row= $this->GetRows($result)){
				$resp[]	= array(
					 "id"		=> $row[0], 
					 "categoria"		=> utf8_encode($row[1] ),
					 "sitio"		=> utf8_encode($row[2] ),
					 "localizacion"		=> utf8_encode($row[3] ),
					 "costo"		=> utf8_encode($row[4] ),
					 "descripcion"		=> utf8_decode($row[5] ),
					 "mutimedia"		=> utf8_encode($row[6] )
					);
			}
			var_dump( $resp);    
			$this->CloseConnection();
			return json_encode($resp); 
		}
	
		
/*
	public function categoriagurda( $parametros ){
		$respuesta = null;
			 
			$query = "INSERT INTO categoria(descripcion) VALUES('".$parametros['descripcion']."') "; 
				$this->ExecuteQuery($query);
				$respuesta	= array(
					"Respuesta"	=> "Se a registrado correctamente"
				);
		
			$this->CloseConnection();
			return json_encode($respuesta);
		}

		public function modificarModulo( $parametros ){
			$query="UPDATE categoria SET descripcion='".$parametros['descripcion']."' WHERE id=".$parametros['id'];
			$this->ExecuteQuery($query);
				 $resp	= array( 
					"Respuesta"		=> "Se actualizo correctamente!"
				);
			
			$this->CloseConnection();
			   return json_encode($resp); 
		}
	
		public function btnEliminarModulo( $parametros ){
			$query="DELETE FROM categoria  WHERE id=".$parametros['id'];
	
			 $this->ExecuteQuery($query);
				 $resp	= array( 
					"Respuesta"		=> "Se elimino correctamente!"
				);
			
			$this->CloseConnection();
			   return json_encode($resp); 
		}
		
		
	*/











	// reportes
	function reporteCalificacion(){
		$query="SELECT COUNT(nota) as nota, 
		CASE 
		WHEN nota=1 THEN 'Excelente' 
		WHEN nota=2 THEN 'Muy bueno' 
		WHEN nota=3 THEN 'Bueno' 
		WHEN nota=4 THEN 'Necesita mejorar' 
		WHEN nota=5 THEN 'No me gusta' 
		END as descripcion FROM calificacion  group by nota";
		$result = $this->ExecuteQuery($query);
		while($row= $this->GetRows($result)){
			$respuesta[]	= array(
				"numero"		=> $row[0],
				"descripcion"		=> $row[1] 
			);
		}    
		$this->CloseConnection();  

		return json_encode( $respuesta);

	}

	function reporteEvenos(){
		$query="SELECT COUNT(categoria) as numero, categoria as categoria FROM sitios  group by categoria";
		$result = $this->ExecuteQuery($query);
		while($row= $this->GetRows($result)){
			$respuesta[]	= array(
				"numero"		=> $row[0],
				"descripcion"		=> $row[1] 
			);
		}    

		
		$this->CloseConnection();  

		return json_encode( $respuesta);

	}

	function reporteTuristas(){
		$query="SELECT COUNT(tipo) as numero, 
		case 
		when tipo=1 then 'Adminisrador'
		when tipo=2 then 'Turistas'
		end as tipo FROM usuarios  group by tipo";

		$result = $this->ExecuteQuery($query);
		while($row= $this->GetRows($result)){
			$respuesta[]	= array(
				"numero"		=> $row[0],
				"descripcion"		=> $row[1] 
			);
		}    
		$this->CloseConnection();  

		return json_encode( $respuesta);

	}
}

?>
 