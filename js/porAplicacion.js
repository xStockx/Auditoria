$(document).ready(function(){
		$('.modal').modal('show');
		var ajax_Data = {'opcion' : 2, 'usuario' : ''};
		$.ajax({
			  url: "business/negocio.php",
			  type: "POST",
			  data: ajax_Data,
			  dataType: "json", 
			  success : function(data){
			  	if(data.length > 0)
			  	{	
			  		
			  		for(var i = 0; i<data.length;i++)
			  		$('#byAplicacion').append('<tr><td>'+data[i]['nombre_aplicacion']+'</td><td>'+data[i]['usuario_db']+'</td><td>'+data[i]['cantidad']+'</td></tr>');
			  	}
			  	
			  }
			}).done(function(){
				$('.modal').modal('hide');
			});
		
	
	});