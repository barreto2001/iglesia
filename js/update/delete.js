$("#delete").on("click", function () {
  $.ajax({
    //inicimos un envio de formulario por ajax

    type: "POST", //ingresamos el tipo de envio
    url: "../../controllers/delete/misa.php", //ingresamos la url a donde se va a enviar la informacion
  })

    .done(function (listas_rep) {
      // en caso de que se realize exitosamente haga esto
    })

    .fail(function () {
      // en caso de que NO se realize exitosamente haga esto
      alert("Hubo un errror al eliminar la reserva");
    });

  location.href = "tableMisas.php";
});
