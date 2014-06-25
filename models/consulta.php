<?php 
require 'bd.php';

class consulta{

	var $bd;

	public function __construct()
	{
		$this->bd = new baseDeDatos();
	}

	public function porCliente()
	{
		$query = "select nombre_cliente,usuario_db,count(*) as cantidad from conexiones group by nombre_cliente,usuario_db order by count(*) desc";
		$replyDatos =  array();
		$datos = $this->bd->filtroConsulta($query);
		while($arreglo = $this->bd->arrayConsulta($datos))
		{
			$replyDatos[] = array("nombre_cliente"=>$arreglo["nombre_cliente"],"usuario_db"=>$arreglo["usuario_db"],"cantidad"=>$arreglo["cantidad"]);		
		}
		return json_encode($replyDatos);

	}

	public function porAplicacion()
	{
		$query = "select nombre_programa as nombre_aplicacion,usuario_db,count(*) as cantidad from conexiones group by nombre_programa,usuario_db order by count(*) desc";
		$replyDatos =  array();
		$datos = $this->bd->filtroConsulta($query);
		while($arreglo = $this->bd->arrayConsulta($datos))
		{
			$replyDatos[] = array("nombre_aplicacion"=>utf8_encode($arreglo["nombre_aplicacion"]),"usuario_db"=>$arreglo["usuario_db"],"cantidad"=>$arreglo["cantidad"]);		
		}

		return json_encode($replyDatos);
		

	}

	public function detalleCliente($nombre_cliente)
	{
		$query = "select * from conexiones where nombre_cliente = '$nombre_cliente' order by ultima_ejecucion desc";
		$replyDatos =  array();
		$datos = $this->bd->filtroConsulta($query);
		while($arreglo = $this->bd->arrayConsulta($datos))
		{
			$replyDatos[] = array("session" => $arreglo["session"],
									"hora_conexion" => $arreglo["hora_conexion"],
									"ultima_ejecucion" => $arreglo["ultima_ejecucion"],
									"cliente" => $arreglo["cliente"],
									"nombre_cliente" => utf8_encode($arreglo["nombre_cliente"]),
									"nombre_programa" => utf8_encode($arreglo["nombre_programa"]),
									"usuario_db" => $arreglo["usuario_db"],
									"ip_address" => $arreglo["ip_address"],
									"conexiones_id" => $arreglo["conexiones_id"]);		
		}

		return json_encode($replyDatos);
		;
	}
		public function todos()
	{
		$query = "select * from conexiones order by ultima_ejecucion desc";
		$replyDatos =  array();
		$datos = $this->bd->filtroConsulta($query);
		while($arreglo = $this->bd->arrayConsulta($datos))
		{
			$replyDatos[] = array("session" => $arreglo["session"],
									"hora_conexion" => $arreglo["hora_conexion"],
									"ultima_ejecucion" => $arreglo["ultima_ejecucion"],
									"cliente" => $arreglo["cliente"],
									"nombre_cliente" => utf8_encode($arreglo["nombre_cliente"]),
									"nombre_programa" => utf8_encode($arreglo["nombre_programa"]),
									"usuario_db" => $arreglo["usuario_db"],
									"ip_address" => $arreglo["ip_address"],
									"conexiones_id" => $arreglo["conexiones_id"]);		
		}

		return json_encode($replyDatos);
		;
	}
}
	



?>