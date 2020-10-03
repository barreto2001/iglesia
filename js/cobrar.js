function cobrar(){

	var acom=$("#acom").val(); //traemos la cantidad de acompañantes
	var acom=parseInt(acom)+1; //convertimos la variable en numerica y le agremaos 1 que seria el supervisor

	//traemos la cantidad de sillas seleccionadas
	var seleccion= document.querySelectorAll('.seleccionado');

	if (acom==seleccion.length) { //se valida que las sillas seleccionadas correspondas a la cantidad acompañantes
				
				
		var seleccion = Array.from(seleccion); //convertimos la varibale seleccion en un array manipulable
		var conca=""; //creamos una variable vacia
		for (var i =0; i < seleccion.length; i++) { //iniciamos un bucle segun la longitud del array
			conca=conca+seleccion[i].innerText+','; //concatenamos cada campo del array en un string seprado por comas
					
		}



		var acompañante =$("#acom").val(); //traemos la cantidad de acompañantes

		var acompañante= parseInt(acompañante)+1; // convertimos la variable en numerico y le agregamos 1 que seria el supervisor


		var name = $('#name1').val();
		var id = $('#document1').val();
		////traemos los datos del supervisor/////
		var newcoma="";

		for (var i = 2; i <=acompañante; i++) {
			var idAcompanante = $('#document'+i).val();
			newcoma=newcoma+idAcompanante+",";
		}


		//concatenamos los datos del supervisor junto con las sillas seleccionadas
		var infos = 'name=' + name + '&document=' + id +  '&sillas=' + conca+ '&cantidad=' +seleccion.length+ '&acompanante='+newcoma; 


		$.ajax({ //inicimos un envio de formulario por ajax

			type: 'POST', //ingresamos el tipo de envio
			url: '../../controllers/create/regisSupervisor.php', //ingresamos la url a donde se va a enviar la informacion
			data: infos // ingresamos los datos a enviar
					
		})

		.done(function(listas_rep){ // en caso de que se realize exitosamente haga esto
				
		})

		.fail(function(){ // en caso de que NO se realize exitosamente haga esto
			alert('Hubo un errror al registrar la compra')
		})

		var number=2;
		
		for (var i = 2; i <=acompañante; i++) { //inicamos un bluce segun la cantidad de acompañantes

			var name = $('#name'+i).val(); //traemos el nombre de acompañante i
			var tipo = $('#tipo'+i).val();
			var id = $('#document'+i).val(); //traemos el documento de acompañante i
			var supervisor = $('#document1').val();//traemos el documento del supervisor

			// concatenamos la informacion del acompañante i junto con el docuento del supervisor
			
			if (number==i) {
				
				var infos = 'name=' + name + '&tipo=' + tipo + '&document=' + id +  '&supervisor=' + supervisor;

				console.log(id);



				$.ajax({
					type: 'POST', //ingresamos el metodo de envio
					url: '../../controllers/create/regisAcompañante.php', //ingresamos la url a donde enviaremos la informacion
					data: infos // ingresamos los dats de envio
						
				})

				.done(function(listas_rep){ // en caso de que se realize exitosamente haga esto
					
				})

				.fail(function(){ // en caso de que NO se realize exitosamente haga esto
					alert('Hubo un errror al registrar la compra')
				})
			}else{
				alert('Fallo al registrar a: '+i)
			}
			var number=number+1;
		}

		var nameSuper = $('#name1').val(); //traemos el nombre del supervisor
		var id = $('#document1').val(); //traemos el documento del supervisor
		var acompañante =$("#acom").val(); //traemos la cantidad de acompañantes
		var acompañante= parseInt(acompañante); //convertimos la variable en numerica
		conca =conca.substring(0, conca.length - 1); //le quitamos la ultima (,) al string de las sillas seleccionadas


		/////////AREA DE NOTIFICACIONES/////////////////////////

		$('#sillas').text('');
		$('#title').text('RESERVACION MISA');
		$('#title').css('background-color','#33b5e5');
		$('#title').css('width','30%');

/*

		$('#nombre').text('Supervisor: '+nameSuper); // nombre del supervisor
		$('#documento').text('N° Doc: '+id);        // documento del supervisor
		$('#Nacompañantes').text('N° Acompañantes: '+acompañante); //cantidad de acompañantes		
		$('#acompañantes').text('Sillas solicitadas: '+conca); //sillas seleccionadas

		for (var i = 2; i <= acompañante +1; i++) { //creamos bucle segun la cantidad de acompañantes
			var miacom=$('#name'+i).val(); //nombre de acompañante i
			var Noacom=$('#document'+i).val(); //documento de acompañante i
			var y=i-1; //bajamos el valor de i-1 para mostrar en pantalla

			//creamos en pantalla etiqueta nueva con informacion de acompañante
			$('#datos').append("<p>Acompañante "+y+": "+miacom+", N° Doc: "+Noacom+"</p>"); 
		}
	*/

		$('#sectionCompra').hide(); //ocultamos pantalla de seleccion de sillas
		
		//$('.mas').val(""); //dejaba vacios campo de datos de supervisor
		var URLactual = window.location;
		location.href=URLactual;
					
	}else{

		var sillaRes= acom-seleccion.length; //obtenemos sillas restantes por seleccionar
		if(sillaRes==1){
			$('#sillas').text('debe seleccionar '+sillaRes+' silla mas'); //mostramos notificacion de silla faltante
		}else{
			$('#sillas').text('debe seleccionar '+sillaRes+' sillas mas');//mostramos notificacion de sillas faltantes
		}
				
	}		
};