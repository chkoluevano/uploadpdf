$(document).ready(function(){	
		$('#mensaje').hide();
		$("#botonenviar").mouseover(function(){
			$(this).css('cursor','pointer');
		});
	    
	    $('#botonenviar').on('click',function(){
	    	$('#mensaje').show();
	    	var formulario = new FormData(); 
	    	formulario.append("portadas", $('#portadas')[0].files[0]);
	    	formulario.append("notas", $('#notas')[0].files[0]);


	    	var inputs=[$('#portadas'),$('#notas')];
	    	var blancos=0;
	    	var _break=false;
			for (i=1;i<=inputs.length;i++){
				var valor = inputs[i-1].val();
				var ext = valor.substring(valor.lastIndexOf('.') + 1);
				if(ext==""){
					blancos++;
				}
				else{
					if(ext!="pdf"){
						_break=true;
						$('#mensaje').html("El archivo a cargar debe ser PDF");
						break;
					}
				}
			}
			if(!_break){
				if(blancos>1){
					$('#mensaje').html("Se debe subir por lo menos 1 archivo");
				}
				else{
					$('#loader').html("<img src='img/loader.gif'>");
		    		$('#mensaje').html("Cargando el archivo, no cierres el navegador");
			    	$.ajax({
			            url:'upload.php',
			            type:'POST', 
			            data:formulario,
			            cache:false,

			            contentType:false,                    
			            processData:false,
			         	success: function(data){ 
			         		console.log(data);
			         		$('#mensaje').html('');
			            	var response = $.parseJSON(data);
			            	response.forEach(function(r){
			            		$('#mensaje').append("El archivo de " + r.tipo + " " + r.status + "<br><br>");
			            		if (parseInt(r.code)==1){
			            			UpdateParse(r.nombre, r.campo);
			            		}
			            		else{
			            			 //
			            		}
			            	});
			            	$('#loader').html("");
			            }
			   	 	}); 
				}
			}
    	});

});


function UpdateParse(elemento, field){
	$('#mensaje').html("Enviando archivo a la APP, no cierres el navegador");
	Parse.$ = jQuery;
	Parse.initialize("TbZLZ4cl77Zu34uyA4dGXOXEtGtheDj4CqxZiqIT","nKYsLG4xt2jIqpzk9GAdbZtxXoCmStP1lUihWWEZ");
	var Sintesis = Parse.Object.extend("sintesis")
	var query = new Parse.Query(Sintesis);
	query.get("YP3bLvh8ii", {
	  success: function(itemResult) {
	  	item = itemResult
	   	item.set(field, "http://gto1.mx/sintesisgto/uploads/" + elemento);
	   	item.save();
	   	$('#mensaje').html("Archivo enviado satisfactoriamente..");
	   	$('#loader').html("");
	  },
	  error: function(object, error) {
	    $('#mensaje').html("La conexion a Parse no se logró");
	    $('#loader').html("");
	  }
	});
}



