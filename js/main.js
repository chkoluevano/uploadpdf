$(document).ready(function(){	
		$("#botonenviar").mouseover(function(){
			$(this).css('cursor','pointer');
		});
	    
	    $('#botonenviar').on('click',function(){
	    	var formulario = new FormData($("#frmCampana")[0]);  
	    	var val = $('#imagen').val();
	    	var ext=val.substring(val.lastIndexOf('.') + 1);
	    	if (ext=="pdf"){
		    	$('#loader').html("<img src='img/loader.gif'>");
		    	$('#mensaje').html("Cargando el archivo, no cierres el navegador");
		    	$.ajax({
		            url:'upload.php',
		            type:'POST', 
		            data:formulario,
		            cache:false,
		            contentType:false,                    
		            processData:false,
		         	success: function(datos){ 
		         		if(String(datos)!="ERROR" || String(datos)==""){ 
		            		//UpdateParse(datos);
		            		$('#mensaje').html(datos);
		      
		            	}
		            	else{
		            		$('#mensaje').html(datos);
		            		$('#loader').html("");
		            	}
		            	
		            }
		   	 	}); 
			}
			else{
				$('#mensaje').html("Alerta: El archivo a cargar debe ser PDF");
				$('#loader').html("");
			}
    	});
});

function UpdateParse(elemento){
	$('#mensaje').html("Enviando archivo a la APP, no cierres el navegador");
	Parse.$ = jQuery;
	Parse.initialize("TbZLZ4cl77Zu34uyA4dGXOXEtGtheDj4CqxZiqIT","nKYsLG4xt2jIqpzk9GAdbZtxXoCmStP1lUihWWEZ");
	var Sintesis = Parse.Object.extend("sintesis")
	var query = new Parse.Query(Sintesis);
	query.get("YP3bLvh8ii", {
	  success: function(itemResult) {
	  	item = itemResult
	   	item.set("ruta", "http://gto1.mx/chko/uploadpdf/uploads/" + elemento);
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