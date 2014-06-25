$(document).ready(function(){
	  $('.modal').modal('show');
	  var ajax_Data = {'opcion' : 4, 'usuario' : ''};
		$.ajax({
			  url: "business/negocio.php",
			  type: "POST",
			  data: ajax_Data,
			  dataType: "json", 
			  success : function(data){
			  	if(data.length > 0)
			  	{	
			  		//$('#byAll').html('<tr><td> session </td><td> ultima_ejecucion </td><td> cliente </td><td> nombre_cliente </td><td> nombre_programa </td><td> usuario_db </td><td> IP </td><td> id Conexion </td></tr>');
			  		for(var i = 0; i<data.length;i++)
			  		{
			  			$('#byAll').append('<tr><td>'+data[i]['session']+'</td><td>'+data[i]['ultima_ejecucion'].date+'</td><td>'+data[i]['cliente']+'</td><td>'+data[i]['nombre_cliente']+'</td><td>'+data[i]['nombre_programa']+'</td><td>'+data[i]['usuario_db']+'</td><td>'+data[i]['ip_address']+'</td><td>'+data[i]['conexiones_id']+'</td></tr>');
			  			
			  		}
			  	}
			  	
			  }	}).done(function(){
			  	$('.modal').modal('hide');;
			  });
	});
	

