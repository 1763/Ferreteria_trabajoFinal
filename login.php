<?php
session_start();

if( isset($_POST['usuario'])  && isset($_POST['contrasenia'])){

      if( $_POST['usuario'] =='admin' && $_POST['contrasenia']=='123'){
        $_SESSION["tiposuario"] = "ADMINISTRADOR"; 
        $respuesta = true;
      }
      else   if( $_POST['usuario'] =='secretaria' && $_POST['contrasenia']=='123'){
        $_SESSION["tiposuario"] = "SECRETARIA"; 
        $respuesta = true;

      }else{
        $respuesta = false;
      }

      if( $respuesta ){
        ?>
        <!DOCTYPE html>
           <html lang="en">
           <head>
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
           </head>
           <body>
           <script type='text/javascript' src="https://code.jquery.com/jquery-3.3.1.js"></script>
            <script type='text/javascript'>
              $( document ).ready(function() {
                
                localStorage.setItem("session", '200');
                location.href ='index.php';
              });
            </script>
           </body>
           </html>




        <?php 
      }else{
        header("Location: /developer/Ferreteria_trabajoFinal/");
      }

 
}else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login | Código Vago </title>
  </head>
<body style="background-repeat: no-repeat;">
    <div class="login-box">
      <img src="assets/img/icono.png" class="avatar" alt="Avatar Image">
      <h1>Login</h1>
      <form action="login.php" method="POST">
        <input type="text"  name="usuario" placeholder="Ingrese su correo" required>
        <input type="password" name="contrasenia" placeholder="Ingrese su contraseña" required>
        <input type="submit" value="Log In">
 
      </form>
    </div>
   </body>
   <script type='text/javascript' src="https://code.jquery.com/jquery-3.3.1.js"></script>

   <script type='text/javascript'>
              $( document ).ready(function() {
                
                var HTTP_status = localStorage.getItem("session"); 

                  if( HTTP_status == '200'){
                      location.href ='index.php';
                  }

              });
            </script>

</html>
<style type="text/css">
  body {
  margin: 0;
  padding: 0;
  background: url(assets/img/fondo.png) no-repeat center top;
  background-size: cover;
  font-family: sans-serif;
  height: 100vh;
}
.login-box {
  width: 320px;
  height: 420px;
  background: transparent;
  border: 1px solid #fff;
  color: #fff;
  top: 50%;
  left: 20%;
  position: absolute;
  transform: translate(-50%, -50%);
  box-sizing: border-box;
  padding: 70px 30px;
}

.login-box .avatar {
    border: 2px solid #fff;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  position: absolute;
  top: -50px;
  left: calc(50% - 50px);
}

.login-box h1 {
  margin: 0;
  padding: 0 0 20px;
  text-align: center;
  font-size: 22px;
}

.login-box input {
  width: 100%;
  margin-bottom: 20px;
}

.login-box input[type="text"], .login-box input[type="password"] {
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  color: #fff;
  font-size: 16px;
}

.login-box input[type="submit"] {
  border: none;
  outline: none;
  height: 40px;
  background: #fff;
  color: #000;
  font-size: 18px;
  border-radius: 1px;
}

.login-box input[type="submit"]:hover {
  cursor: pointer;
  background: #000;
  color: #fff;
  border-bottom: 3px solid #fff;
}

.login-box a {
  text-decoration: none;
  font-size: 12px;
  line-height: 20px;
  color: darkgrey;
}

.login-box a:hover {
  color: #fff;
}

</style>



<?php
  
}
?>