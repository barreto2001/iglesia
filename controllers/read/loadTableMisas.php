<?php


function cargarMisas()
{

	$queries = new queriesMisas();
	//Genera consulta en la tabla user para obtener los usuarios
	$result = $queries->showMisas();


	if (isset($result)) { //En caso de haya un error en la variable resultado

		foreach ($result as $f) {

			if ($f["activo"] == true) {

				echo '
						<tr>
						
						<td>' . $f["name"] . '</td>
						<td>' . date("d-m-Y", strtotime($f["fecha"])) . '</td>
						<td>' . date("h:i a", strtotime($f["hora_inicio"])) . '</td>
						<td>' . date("h:i a", strtotime($f["hora_fin"])) . '</td>
						<td>' . $f["total"] . '</td>
						<td>' . $f["disponibles"] . '</td>
					';
				if ($f["disponibles"] > 0) {
					echo '
							<td><button><a href="index.php?id=' . $f["id"] . '&misa=' . $f["name"] . '&filas=' . $f["filas"] . '&columnas=' . $f["columnas"] . '&dispo=' . $f["disponibles"] . '">Reservar</a></button></td>
							';
				} else {
					echo '
							<td><button>AGOTADO</button></td>
							';
				}
			}
		} //end foreach
	} else {

		echo '

			<td></td>
            	<td></td>
            	<td></td>
            	<td></td>
            	<td></td>
            	<td></td>
            	<td></td>
            	';
	}; //end if

} //cierre de funcion cargarSillas

function reporteUsuarios($id)
{

	$queries = new queriesMisas();
	$result = $queries->showUser($id);


	$num = 0;
	if (isset($result)) {
		foreach ($result as $f) {
			$num = $num + 1;
			echo "
				<tr>
				<td>" . $num . "</td>
				<td>SUPERVISOR</td>
				<td>" . $f['name'] . "</td>
                <td>" . $f['tipo'] . "</td>
                <td>" . $f['document'] . "</td>
                <td>" . $f['email'] . "</td>
                <td>" . $f['cel'] . "</td>
                <td>" . $f['address'] . "</td>
                </tr>
                ";

			$resultTwo = $queries->showUserTwo($f['document'], $id);

			if (isset($resultTwo)) {
				foreach ($resultTwo as $k) {
					$num = $num + 1;
					echo "
						<tr>
						<td>" . $num . "</td>
						<td>" . $f['document'] . "</td>
						<td>" . $k['name'] . "</td>
		                <td>" . $k['tipo'] . "</td>
		                <td>" . $k['document'] . "</td>
		                <td>" . $f['email'] . "</td>
		                <td>" . $f['cel'] . "</td>
		                <td>" . $f['address'] . "</td>
		                </tr>
		                ";
					if ($k['supervisor'] != $f['document']) {
						break;
					}
				}
			}
		}
	}
}
