<?php
session_start();
    if(isset($_POST['usuario']) && isset($_POST['clave']))
    {
      include("user-reg.php");
      $rs = mysqli_query($conexion, "SELECT usuario FROM users WHERE usuario = '".$_POST['usuario']."' AND clave =  '".$_POST['clave']."';");
      if(!$rs){
        
        echo "<h1>Usario no existe</h1>";
      }else{
        while($consulta = mysqli_fetch_array($rs))
        {
          $_SESSION["esta_logueado"] = true;
          $_SESSION["usuario"] = $consulta["usuario"];
          header('Location: registro.php');
          exit;
        }
      }
    }
?>

<html>
<head>
  <title>Agenda Taller</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  
  <meta charset="utf-8">
 
</head>
<body>
<center><h1>Login Agenda Taller</h1></center>

    <form method="POST" action="login.php" >

    <div class="form-group">
      
      <input type="text" name="usuario" class="form-control" id="usuario"placeholder=Usuario>
  </div>

  <div class="form-group">
      
      <input type="password" name="clave" class="form-control" id="password" placeholder=Contraseña>
  </div>

   
    
    <center>
      <input type="submit" value="Entrar" class="btn btn-success" name="btn1">
    
     <br><br>
      <a href="registrarse.php">REGISTRARSE</a>
      </center>
  </form>

  </body>
</html>