function seleccion($letra){ // funcion onclick al seleccionar silla disponible

	var cars = [];
	cars[cars.length]=$letra; //creacion de array para verificar funcionalidad (obsoleto)

	var valor=$($letra).html(); //trae el valor de la silla seleccionada (A2,A4,B4) ETC
			

	var comprobar=$($letra).hasClass('seleccionado'); //saber si selecciono la silla o la deselecciono mediante la clase

	var acom=$("#acom").val(); //nos trae la cantidad de acompañantes y se pasa a una variable manipulable
	var acom=parseInt(acom)+1; //canvertimos la variable en numerica y le agregamos 1 que seria el supervisor
				


	if (comprobar==true) { // si la silla estaba seleccionada activamos if

		$($letra).removeClass("seleccionado"); //quitamos la clase seleccionado
		$($letra).addClass("disponible");     // agregamos la clase disponibl
		$("#"+valor).css("background-color",""); //le quitamos el color azul(seleccionado) y la dejamos por default

	}else{ // si la silla esta disponible activamos el sigueinte codigo

		$($letra).removeClass("disponible"); // quitamos la clase disponible
		$($letra).addClass("seleccionado"); //agregamos la clase seleccionado
		$("#"+valor).css("background-color","blue"); //le agregamos color azul a la silla seleccionada
	}

			
	var sel= document.querySelectorAll('.seleccionado'); // trateamos todas las sillas seleccionadas


	//var valor=document.getElementById($letra).html();
	//var valor= document.querySelector($letra);
	//alert(valor);

	if (acom==sel.length) { //bloquea todo cuando ya escojio las sillas segun sus acompañantes
		
		// bloqueamos todas las sillas
		$('.silla').attr("disabled",true); 
		 // dejamos desbloqueadas las seleccionadas por el cliente para su modificacion
		$('.seleccionado').attr("disabled",false);

	}else{ //si el cliente desea modificar alguna silla seleccionada se vuelve a desbloquear todo
			

		$('.silla').attr("disabled",false); // desbloqueamos todas las sillas
		$('.ocupado').attr("disabled",true); // pero quedan bloqueadas las que ya estan ocupadas desde un principio
	}


	//$("#"+valor).attr("disabled",true);
	
}; //cierra funcion SELECCION