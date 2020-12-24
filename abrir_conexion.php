<?php 
	
	$host = "localhost";    
	$basededatos = "propietario";    
	$usuariodb = "root";    
	$clavedb = "";   


	$tabla_db1 = "propietario"; 	   
	

	
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


	if ($conexion->connect_errno) {
	    echo "No es posible la conexion con la Base de Datos....";
	    exit();
	}

?>