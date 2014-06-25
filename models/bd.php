<?php 

class baseDeDatos
{
	
	private $sqlconecta;

	public function __construct()
	{	
		$database = "bd";
		$db_usuario = "usr_auditoria";
		$db_contrasena = "usr_auditoria";
		$db_direccion = "server";
		$connectionInfo = array("Database"=>"$database", "UID"=>"$db_usuario", "PWD"=>"$db_contrasena");
		$this->sqlconecta = sqlsrv_connect( $db_direccion, $connectionInfo);
	}

	public function __destuct()
	{


	}

	public function filtroConsulta($sql)
	{
		$resultado = sqlsrv_query($this->sqlconecta,$sql);
		return $resultado;
	}
	
	public function cierraConsulta($datos)
	{
		sqlsrv_free_stmt($datos);
	}

	public function arrayConsulta($datos)
	{
		$arreglo = sqlsrv_fetch_array($datos,SQLSRV_FETCH_ASSOC);
		return $arreglo;
	}
	public function ejecutarConsulta($sql)
	{
		sqlsrv_query($this->sqlconecta,$sql);

	}
	public function cerrarConexion()
	{
		sqlsrv_close($this->sqlconecta);
	}
}

?>