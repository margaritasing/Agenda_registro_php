<?php
session_start();
  if($_SESSION["esta_logueado"]){
?>
<html>
<head>
  <title>Agenda Taller</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <meta charset="utf-8">
 
</head>
<body>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">

    <center><h1>Agenda Taller</h1></center>
    <a href="login.php">Cerrar Sesion</a><br>

    <form method="POST" action="registro.php" >

    <div class="form-group">
      
      <input type="text" name="dominio" class="form-control" id="dominio"placeholder=Dominio>
  </div>

  <div class="form-group">
      
      <input type="text" name="vehiculo" class="form-control" id="vehiculo" placeholder=vehiculo >
  </div>

   <div class="form-group">
      
      <input type="text" name="nombre" class="form-control" id="nombre"placeholder=Nombre>
  </div>

  <div class="form-group">
      
      <input type="number" name="tel" class="form-control" id="tel" placeholder=N°Contacto>
  </div>
    
    <center>
      <input type="submit" value="Enviar" class="btn btn-success" name="btn1">
      <input type="submit" value="Consultar" class="btn btn-info" name="btn2">
     
    </center>

  </form>
  
  <?php
    

    if(isset($_POST['btn1']))
    {
      include("abrir_conexion.php");

      $dominio = $_POST['dominio'];
      $vehiculo = $_POST['vehiculo'];
      $nombre= $_POST['nombre'];
      $tel = $_POST['tel'];

      mysqli_query($conexion, "INSERT INTO propietario (dominio,vehiculo,nombre,telefono) values ('$dominio','$vehiculo','$nombre','$tel')");
      
      include("cerrar_conexion.php");
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
      include("abrir_conexion.php");

        $dominio = $_POST['dominio'];
        if($dominio=="") 
         
          {echo "<h3>Digita un Dominio por favor</h3>";}
        
        else
        { 
          $consulta = "SELECT * FROM propietario WHERE dominio = '$dominio'"; 
          //echo $consulta;
          $resultados = mysqli_query($conexion,$consulta);
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Dominio</center></b></td>
                  <td><b><center>Vehiculo</center></b></td>
                  <td><b><center>Nombre</center></b></td>
                  <td><b><center>Telefono</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['dominio']."</td>
                  <td>".$consulta['vehiculo']."</td>
                  <td>".$consulta['nombre']."</td>
                  <td>".$consulta['telefono']."</td>
                </tr>
              </table>
            ";
          }
        }

      include("cerrar_conexion.php");
    }
  ?>



  </div>
  <div class="col-md-4"></div>
</div>



  
  
</body>
</html>

<?php
  }else{
      header('Location: login.php');
      exit;
  }
?>