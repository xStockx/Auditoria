<?php 

	require '../models/consulta.php';
	$consulta = new consulta();
	$opcion = $_POST['opcion'];
	$usuario = $_POST['usuario'];
	switch ($opcion) {
		case 1:
			echo $consulta->porCliente();
			break;
		case 2:
			echo $consulta->porAplicacion();
			break;
		case 3 : 
			echo $consulta->detalleCliente($usuario);
			break;
		case 4 : 
			echo $consulta->todos();
			break;
	}

?>