function cobrar() {
  var acom = $("#Nacompañantess").val(); //traemos la cantidad de acompañantes
  var acom = parseInt(acom) + 1; //convertimos la variable en numerica y le agremaos 1 que seria el supervisor

  //traemos la cantidad de sillas seleccionadas
  var seleccion = document.querySelectorAll(".seleccionado");

  if (acom == seleccion.length) {
    //se valida que las sillas seleccionadas correspondas a la cantidad acompañantes

    var seleccion = Array.from(seleccion); //convertimos la varibale seleccion en un array manipulable
    var conca = ""; //creamos una variable vacia
    for (var i = 0; i < seleccion.length; i++) {
      //iniciamos un bucle segun la longitud del array
      conca = conca + seleccion[i].innerText + ","; //concatenamos cada campo del array en un string seprado por comas
    }

    var acompañante = $("#Nacompañantess").val(); //traemos la cantidad de acompañantes

    var acompañante = parseInt(acompañante) + 1; // convertimos la variable en numerico y le agregamos 1 que seria el supervisor

    var name = $("#name1").val();
    var id = $("#document1").val();
    ////traemos los datos del supervisor/////

    //concatenamos los datos del supervisor junto con las sillas seleccionadas
    var infos =
      "name=" +
      name +
      "&document=" +
      id +
      "&sillas=" +
      conca +
      "&cantidad=" +
      seleccion.length;
    $.ajax({
      //inicimos un envio de formulario por ajax

      type: "POST", //ingresamos el tipo de envio
      url: "../../controllers/update/updateSupervisor.php", //ingresamos la url a donde se va a enviar la informacion
      data: infos, // ingresamos los datos a enviar
    })

      .done(function () {
        // en caso de que se realize exitosamente haga esto
      })

      .fail(function () {
        // en caso de que NO se realize exitosamente haga esto
        alert("Hubo un errror al modificar la reserva");
      });

    var number = 1;

    for (var i = 1; i < acompañante; i++) {
      //inicamos un bluce segun la cantidad de acompañantes
      var id = $("#id" + i).val(); //traemos el nombre de acompañante i
      var name = $("#name" + i).val(); //traemos el nombre de acompañante i
      var tipo = $("#tipo" + i).val();
      var doc = $("#document" + i).val(); //traemos el documento de acompañante i

      // concatenamos la informacion del acompañante i junto con el docuento del supervisor

      if (number == i) {
        var infos =
          "id=" + id + "&name=" + name + "&tipo=" + tipo + "&document=" + doc;

        console.log(id);
        $.ajax({
          type: "POST", //ingresamos el metodo de envio
          url: "../../controllers/update/updateAcompañante.php", //ingresamos la url a donde enviaremos la informacion
          data: infos, // ingresamos los dats de envio
        })

          .done(function (listas_rep) {
            // en caso de que se realize exitosamente haga esto
          })

          .fail(function () {
            // en caso de que NO se realize exitosamente haga esto
            alert("Hubo un errror al registrar la compra");
          });
      } else {
        alert("Fallo al registrar a: " + i);
      }
      var number = number + 1;
    }
    /*
    var nameSuper = $("#name1").val(); //traemos el nombre del supervisor
    var id = $("#document1").val(); //traemos el documento del supervisor
    var acompañante = $("#acom").val(); //traemos la cantidad de acompañantes
    var acompañante = parseInt(acompañante); //convertimos la variable en numerica
    conca = conca.substring(0, conca.length - 1); //le quitamos la ultima (,) al string de las sillas seleccionadas

    /////////AREA DE NOTIFICACIONES/////////////////////////

    $("#sillas").text("");
    $("#title").text("RESERVACION MISA");
    $("#title").css("background-color", "#33b5e5");
    $("#title").css("width", "30%");

    $("#sectionCompra").hide(); //ocultamos pantalla de seleccion de sillas

    var URLactual = window.location;
    location.href = URLactual;
    */
    window.history.back(-1);
  } else {
    var sillaRes = acom - seleccion.length; //obtenemos sillas restantes por seleccionar
    if (sillaRes == 1) {
      $("#sillas").text("debe seleccionar " + sillaRes + " silla mas"); //mostramos notificacion de silla faltante
    } else {
      $("#sillas").text("debe seleccionar " + sillaRes + " sillas mas"); //mostramos notificacion de sillas faltantes
    }
  }
}
