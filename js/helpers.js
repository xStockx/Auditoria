function detalleCliente(boton)
{
	$('.modal').modal('show');
    var ajax_Data = {'opcion' : 3, 'usuario' : boton.value};
		$.ajax({
			  url: "business/negocio.php",
			  type: "POST",
			  data: ajax_Data,
			  dataType: "json", 
			  success : function(data){
			  	if(data.length > 0)
			  	{	
			  		$('#byCliente').html('<thead><tr><td> Session </td><td> Ultima Ejecución </td><td> Cliente </td><td> Nombre Cliente </td><td> Nombre Programa </td><td> Usuario DB </td><td> IP </td><td> ID Conexión </td></tr></thead>');
			  		for(var i = 0; i<data.length;i++)
			  		{
			  			$('#byCliente').append('<tr><td>'+data[i]['session']+'</td><td>'+data[i]['ultima_ejecucion'].date+'</td><td>'+data[i]['cliente']+'</td><td>'+data[i]['nombre_cliente']+'</td><td>'+data[i]['nombre_programa']+'</td><td>'+data[i]['usuario_db']+'</td><td>'+data[i]['ip_address']+'</td><td>'+data[i]['conexiones_id']+'</td></tr>');
			  			console.log(data[i]['hora_conexion']);
			  		}
			  	}
			  	
			  }
			}).done(function(){
				$('.modal').modal('hide');
			});
}
