///////////////////// FUNCTION 1 /////////////////////////////////////////////

//$("#login").hide(); //OCULTA LA SECCCION DEL FORM LOGIN DESDE EL INICIO
$("#registro").hide(); //OCULTA LA SECCCION DEL FORM REGISTRO DESDE EL INICIO

$("#aclogin").on("click", function () {
  // MUESTRA EL FORM LOGIN AL HACER CLIC EN EL BOTON

  $("#login").show();
  $("#registro").hide();
  
});

$("#acregistro").on("click", function () {
  // MUESTRA EL FORM REGISTRO AL HACER CLIC EN EL BOTON
  $("#login").hide();
  $("#registro").show();
});

///////////////////// FUNCTION 2 /////////////////////////////////////////////

$("#acom").on("keyup", function () {
  // determina la cantidad de acompañantes y sillas disponibles

  $("#sillas").text(""); // vacia section de notificacion de las sillas
  var acompañante = $("#acom").val(); // guarda en variable la cantidad de acompañantes
  var acompañante = parseInt(acompañante) + 1; //convertimos la variable en numerica y le agregamos 1 que sera el supervisor
  $("#micompañia").empty(); //elimina los campos del acompañante cada vez que sean modificados

  var disponible = document.querySelectorAll(".disponible"); // verifica cuantas sillas hay disponibles segun la clase

  if (acompañante > disponible.length) {
    //verifica si hay sillas disponibles segun los acompañantes

    //muestra la cantidad de sillas disponibles en la seccion de notificaciones
    $("#sillas").text("solo hay disponible " + disponible.length + " sillas");

	//nos muestra el mismo mensaje pero en un alert
	Swal.fire({
		title: "OJO",
		text: "Solo hay disponible " + disponible.length + " sillas",
		icon: "warning",
		showConfirmButton: true,
		
	  });
   
  } else {
    var n = 0;

    //generamos un bucle para que dibuje los campos segun los acompañantes para solicitar los datos
    for (var i = 2; i <= acompañante; i++) {
      n = i - 1;

      //agregamos input con la funcion append dandoles un
      $("#micompañia").append(
        '<input type="text" class="mas" id="name' +
          i +
          '" name="name' +
          n +
          '" placeholder="Nombres">'
      );
      $("#micompañia").append(
        '<select class="browser-default custom-select mas"  id="tipo' +
          i +
          '" name="tipo' +
          n +
          '" style="width:30%;"> <option value="" disabled selected>Tipo Documento</option> <option value="CC">Cedula de Ciudadania</option> <option value="TI">Tarjeta de Identidad</option><option value="CE">Cedula de Extranjeria</option></select>'
      );
      $("#micompañia").append(
        '<input type="number" class="mas" id="document' +
          i +
          '" name="documento' +
          n +
          '" placeholder="N° documento">'
      );
      $("#micompañia").append("<br>");
    }
  }
}); // cierra la detecccion del click de acompañantes
