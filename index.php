<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title><?php echo $_SESSION["tiposuario"];?> ferreteria</title>
</head>
<body>
 
  
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <a class="nav-brand" href="#!" href="#">Articulos</a>
        <a class="nav-brand" href="#!" data-toggle="modal" data-target="#exampleModalCenter">Agregar</a>
        <a id="btnSalir" class="nav-brand" href="#!">Salir</a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" id="txtbuscar" placeholder="Buscar por.." aria-label="Buscar por">
            <a class="btn btn-outline-success my-2 my-sm-0" href="#!" id="btnBuscar">Buscar</a>
            <a class="btn btn-outline-warning my-2 my-sm-0" href="index.php">x</a>
        </form>
        </nav>



    


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Registrar Nuevo Articulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="grabar_articulo.php" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Codigo</label>
                <input type="text" class="form-control" name="codigo" placeholder="Ej. MA001" required minlength="4" maxlength="6" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ej. MARTILLO" required minlength="6" maxlength="20">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Decripci&oacute;n</label>
                <textarea class="form-control" name="descripcion" rows="2"placeholder="Decripci&oacute;n" required minlength="10" maxlength="50"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" placeholder="Ej. 1" required min= "1">
            </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
      </div>
      
        
      
    </div>
  </div>
</div>


<div id="contenidoTabla"></div>
</div>
</body>
<script type='text/javascript' src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="assets/js/main.js"></script>
</html>



