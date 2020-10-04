<?php
session_start();

require_once('../../model/conexion/conexion.php');
require_once('../../model/query/read/misas.php');
require_once('../../controllers/read/loadTableMisas.php');
if (isset($_GET['id'])) {
    $_SESSION['idMisa'] = $_GET['id'];
} else {
    echo "<script> location.href='../../'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IGLESIA</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="../../img/icon.png" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/main.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    include("nav4.php");
    ?>

    <br>
    <br>

    <body>
        <section id="tableMisa">
            <table id="myTable" class="display" style="width:90%; text-align: center;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Supervisor</th>
                        <th>Nombres</th>
                        <th>Tipo Documento</th>
                        <th>N° Documento</th>
                        <th>Email</th>
                        <th>N° Celular</th>
                        <th>Direccion</th>

                    </tr>
                </thead>
                <tbody>



                    <?php
                    echo reporteUsuarios($_GET['id']);

                    ?>

                </tbody>
            </table>
        </section>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
        <script type="text/javascript" src="../../js/ajaxDownload.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    language: {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ Registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    }
                });
            });
        </script>
    </body>

</html>