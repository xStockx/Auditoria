$(document).ready(function(){
	$('.modal').modal('show');
	var ajax_Data = {'opcion' : 1,'usuario':''};
		$.ajax({
			  url: "business/negocio.php",
			  type: "POST",
			  data: ajax_Data,
			  dataType: "json", 
			  success : function(data){
			  	if(data.length > 0)
			  	{	
			  		
			  		for(var i = 0; i<data.length;i++)
			  		$('#byCliente').append('<tr><td>'+data[i]['nombre_cliente']+'</td><td>'+data[i]['usuario_db']+'</td><td>'+data[i]['cantidad']+'</td><td><button onclick="detalleCliente(this)" class="btn btn-primary"value="'+data[i]['nombre_cliente']+'">Detalle</button></td></tr>');
			  	}
			  	
			  }
			}).done(function(){
				$('.modal').modal('hide');
			});
	
	});
