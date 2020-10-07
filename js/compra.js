function comprar() {
  var campo1 = $("#name1").val(); //traemos el nombre del supervisor
  var campo2 = $("#document1").val(); //traemos el docuemnto del supervisor

  if (campo1.length > 0 && campo2.length > 0) {
    // verificamos que los campos de nombre y docuemnto este lleno

    var disponible = document.querySelectorAll(".disponible"); // traemos las sillas disponibles

    var acom = $("#acom").val(); // traemos la cantidad de acompañantes
    acom = parseInt(acom) + 1; // convertimos la variable en numerica y le agregamos 1 que seria el supervisor

    if (acom > disponible.length) {
      //verificamos que hallas sillas disponibles segun los acompañantes

      Swal.fire({
        title: "OJO",
        text: "Solo hay disponible " + disponible.length + " sillas",
        icon: "warning",
        showConfirmButton: true,
      });
      // manda un alert diciendo cuantas sillas hay disponibles
    } else {
      if (acom == 1) {
        // significa que solo va una persona sin acompañantes

        $(".silla").attr("disabled", false); //desbloquea todas las sillas
        $(".ocupado").attr("disabled", true); //bloquea las sillas ocupadas inicialmente
        $("#comprar").attr("disabled", true); //bloquea el boton de comprar
        $("#cobrar").attr("disabled", false); //desbloquea el boton de cobrar
        $("#acom").attr("disabled", true); //bloquea el campo de cantidad de acompañantes
        //$('.mas').attr("disabled",true); // bloquea los campos de datos del supervisor
      } else {
        //significa que el supervisor va con acompañantes

        var acompañante = $("#acom").val(); //nos trae la cantidad de acompañantes
        var acompañante = parseInt(acompañante) + 1; //convertimos la variable en numerico y le agregamos 1 que seria el supervisor

        for (var i = 2; i <= acompañante; i++) {
          //iniciamos un bucle segun la cantidad de acompañantes
          var name = $("#name" + i + "").val(); //traemos el nombre del acompañante i
          var documento = $("#document" + i + "").val(); //traemos el documento del acompañante i
          var tipo = $("#tipo" + i + "").val();
          //verificamso que los campos del nombre y documentos del acompañante i esten llenos
          if (name.length > 0 && documento.length > 0 && tipo != null) {
            $(".silla").attr("disabled", false); //desbloquemos todas las sillas
            $(".ocupado").attr("disabled", true); // bloqueamos las sillas ocupadas inicialmente
            $("#comprar").attr("disabled", true); //bloqueamos el boton comprar
            $("#cobrar").attr("disabled", false); //desbloqueamos el boton cobrar
            $("#acom").attr("disabled", true); //bloqueamos el campo de cantidad de acompañantes
            $(".mas").attr("disabled", true); //bloqueamos los campos de datos del supervisor
            $("#sillas").text(""); //dejamos vacio el campo de notificacion de sillas
          } else {
            //si hay campos de datos vacios

            //mostramos en pantalla la notificacion de campos vacios
            $("#sillas").text("debe llenar la informacion de los acompañantes");
            $("#sillas").css("background-color", "white");
            $(".silla").attr("disabled", true); //bloqueamos todas las sillas
            $(".ocupado").attr("disabled", true); //bloqueamos las sillas ocupadas
            $("#comprar").attr("disabled", false); //desbloqueamos el boton comprar
            $("#cobrar").attr("disabled", true); //bloqueamos el boton cobrar
            $("#acom").attr("disabled", false); //desbloqueamos el campo de cantidad de acompañantes
            $(".mas").attr("disabled", false);
          }
        }
      }
    }
  }
}
