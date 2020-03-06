<script src="#!">var HTTP_status = localStorage.getItem("session"); if( HTTP_status != '200'){location.href ='login.php'; }</script>
<?php
	include_once ('controlador/MySql.php');
    include_once ('controlador/servidor/crud_pruebas.php');
       
	$obj = new Clase_CludPruebas();   
    $obj->CreateConnection(); 

    $id_key =  $_GET['id_key'];


    if( isset($_GET['metodo'])){

        $parametros['id_key']       = strtoupper($_GET['id_key']);
        $parametros['codigo']       = strtoupper($_GET['codigo']);
        $parametros['nombre']       = strtoupper($_GET['nombre']);
        $parametros['descripcion']  = strtoupper($_GET['descripcion']);
        $parametros['cantidad']     = $_GET['cantidad'];
 
        $respuesta = $obj->fn_modificarArticulo( $parametros );
   

            if( $respuesta ){
                header("Location: /developer/Ferreteria_trabajoFinal/");
            } 

    }else{
        $id_key =  $_GET['id_key'];
        $articulo = $obj->fn_buscarById( $id_key );
    
    ?>
    
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>editar <?php echo  $articulo[0]['nombre'] ;?> </title>

</head>
<body>
    
    <div class="container">
    <form action="modificar_articulo.php"  metod="GET">

            <input type="hidden" name="id_key" value="<?php echo  $articulo[0]['id_key'] ;?>">
            <input type="hidden" name="metodo" value="actualizar">
            <div class="form-group">
                <label for="exampleFormControlInput1">Codigo</label>
                <input type="text" class="form-control" name="codigo" placeholder="Ej. MA001" value="<?php echo  $articulo[0]['codigo'] ;?>"required minlength="4" maxlength="6" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ej. MARTILLO" value="<?php echo  $articulo[0]['nombre'] ;?>" required minlength="6" maxlength="20">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Decripci&oacute;n</label>
                <textarea class="form-control" name="descripcion" rows="2"placeholder="Decripci&oacute;n" required minlength="10" maxlength="50"><?php echo  $articulo[0]['descripcion'] ;?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" placeholder="Ej. 1" value="<?php echo  $articulo[0]['cantidad'] ;?>"required min= "1">
            </div>
                <a href="/developer/Ferreteria_trabajoFinal/" class="btn btn-secondary" >Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

    </div>


</body>
</html>

<?php } ?>