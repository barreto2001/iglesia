<?php
function cargarSillas()
{

	if (isset($_GET['filas']) && isset($_GET['columnas'])) {



		$queries = new verification();
		//Genera consulta en la tabla user para obtener los usuarios
		$dispoMisa = $queries->showMiMisaTwo($_SESSION['misa']);
		$result = $queries->showSupervisorTwo($_SESSION['documento']);
		$resultTwo = $queries->showAcompananteTwo($_SESSION['documento']);

		if (isset($dispoMisa)) {
			foreach ($dispoMisa as $mis) {
				$disponiblemisa = $mis['disponibles'];
				$total = $mis['total'];
				$filasMisa = $mis['filas'];
				$columnasMisa = $mis['columnas'];
				$newfecha = $mis['fecha'];
				$newhora = $mis['hora_inicio'];
				$superfecha = date("Y-m-d H:i", strtotime($newfecha . $newhora));
				$superfecha = date("Y-m-d H:i", strtotime($superfecha . "-1 day"));
				date_default_timezone_set("America/Bogota");
				$mifecha = date("Y-m-d H:i");
			}


			if (isset($result)) {




				echo '<div style="background-color: #33b5e5; width: 100%; color:white;" id="pulpito">RESERVACIÓN MISA</div>
						<br>';
				foreach ($result as $row) {
					$sillas = $row['cantidad_sillas'] - 1;



					$quer = new queriesMisas();
					//Genera consulta en la tabla user para obtener los usuarios
					$res = $quer->showMiMisa($row['misa']);
					$_SESSION['factura'] = true;

					foreach ($res as $mos) {
						$_SESSION['misa'] = $row['misa'];
						$_SESSION['cantidad'] = $sillas + 1;
						$_SESSION['disponibles'] = $mos['disponibles'];
						$hini = date("h:i a ", strtotime($mos['hora_inicio']));
						$hfini = date("h:i a", strtotime($mos['hora_fin']));
						$fecha = date("d-m-Y", strtotime($mos['fecha']));
						echo '						
							
							<p>Misa: ' . $mos['name'] . '</p>
							<p>Fecha: ' . $fecha . '</p>
							<p>Hora Inicio: ' . $hini . '</p>
							<p>Hora fin: ' . $hfini . '</p>
							
							<br>
							<br>

							';
					}


					echo '

							<p id="nombre">Supervisor: ' . $row['name'] . '</p>
							<p id="documento">N° Doc: ' . $row['document'] . '</p>
							<p id="Nacompañantes">N° Acompañantes: ' . $sillas . '</p>
							<p id="acompañantes">Sillas solicitadas: ' . $row['sillas'] . '</p>';
				}

				$resultTres = $queries->showAcompanantes($_SESSION['documento']);
				$i = 1;

				if (isset($resultTres)) {


					foreach ($resultTres as $key) {

						echo '
								<div id="datos">
								<p>Acompañante ' . $i . ' : ' . $key['name'] . ', N° Doc: ' . $key['document'] . '</p>
					
								</div>	
							';
						$i = $i + 1;
					}
					if (isset($row['observacion'])) {
						echo '<p id="observacion">Observación: ' . $row['observacion'] . '</p>';
					}
				}

				if ($row['document'] == $_SESSION['documento']) {


					echo '<a role="button" class="btn btn-outline-info btn-rounded " id="delete" style="margin-right:15px;">ELIMINAR</a>';

					echo '<a role="button" class="btn btn-outline-info btn-rounded " href="update.php">MODIFICAR</a>';
				}
			} else if (isset($resultTwo)) {

				echo '<div style="background-color: #33b5e5; width: 100%; color:white;" id="pulpito">RESERVACIÓN MISA</div>
						<br>';
				$_SESSION['factura'] = true;

				foreach ($resultTwo as $col) {
					$supervi = $col['supervisor'];
				}
				$result = $queries->showSupervisorTwo($supervi);


				foreach ($result as $row) {
					$sillas = $row['cantidad_sillas'] - 1;
					$quer = new queriesMisas();
					//Genera consulta en la tabla user para obtener los usuarios
					$res = $quer->showMiMisa($row['misa']);
					$_SESSION['factura'] = true;

					foreach ($res as $mos) {

						$hini = date("h:i a ", strtotime($mos['hora_inicio']));
						$hfini = date("h:i a", strtotime($mos['hora_fin']));
						$fecha = date("d-m-Y", strtotime($mos['fecha']));
						echo '						
							
							<p>Misa: ' . $mos['name'] . '</p>
							<p>Fecha: ' . $fecha . '</p>
							<p>Hora Inicio: ' . $hini . '</p>
							<p>Hora fin: ' . $hfini . '</p>
							<br>
							<br>

							';
					}

					echo '						
							<p id="nombre">Supervisor: ' . $row['name'] . '</p>
							<p id="documento">N° Doc: ' . $row['document'] . '</p>
							<p id="Nacompañantes">N° Acompañantes: ' . $sillas . '</p>
							<p id="acompañantes">Sillas solicitadas: ' . $row['sillas'] . '</p>';
				}

				$resultTres = $queries->showAcompanantes($supervi);
				$i = 1;

				foreach ($resultTres as $key) {

					echo '
							<div id="datos">
							<p>Acompañante ' . $i . ' : ' . $key['name'] . ', N° Doc: ' . $key['document'] . '</p>
				
							</div>	
						';
					$i = $i + 1;
				}
				if (isset($row['observacion'])) {
					echo '<p id="observacion">Observación: ' . $row['observacion'] . '</p>';
				}
				if ($row['document'] == $_SESSION['documento']) {


					echo '<a role="button" class="btn btn-outline-info btn-rounded " id="delete" style="margin-right:15px;">ELIMINAR</a>';

					echo '<a role="button" class="btn btn-outline-info btn-rounded " href="update.php">MODIFICAR</a>';
				}
			} else {
				$queries = new verification();
				$info = $queries->showSupervisor($_SESSION['documento']);

				if (isset($info)) {
					foreach ($info as $miinfo) {
						$misavieja = $miinfo['misa'];
					}
					$quer = new queriesMisas();
					//Genera consulta en la tabla user para obtener los usuarios
					$info = $quer->showMiMisa($misavieja);

					foreach ($info as $miinfo) {
						$fechamimisa = $miinfo['fecha']; //fecha de la ultima misa
						$horamimisa = $miinfo['hora_inicio']; //hora de la ultima misa
					}

					$fechadesbloqueo = date("Y-m-d H:i", strtotime($fechamimisa . $horamimisa));
					$fechadesbloqueo = date("Y-m-d H:i", strtotime($fechadesbloqueo . "+1 week"));
				}

				if ($mifecha < $superfecha) {
					$seguir1 = true;
				} else {
					$seguir1 = false; // PERMITE ELEJIR SILLAS
				}

				if ($disponiblemisa < ($total / 2)) {
					$seguir2 = true;
				} else {
					$seguir2 = false; // PERMITE ELEJIR SILLAS
				}


				if ($mifecha < $fechadesbloqueo) {
					$seguir3 = true;
				} else {
					$seguir3 = false; // PERMITE ELEJIR SILLAS
				}

				$fechaMessage = date("d-m-Y", strtotime($fechamimisa));
				$fechaMessageTwo = date("d-m-Y", strtotime($fechadesbloqueo));
				$fechaMessageThirt = date("d-m-Y", strtotime($superfecha));

				/*echo "1" . $seguir1;
				echo "<br>";
				echo "2" . $seguir2;
				echo "<br>";
				echo "3" . $seguir3;
				echo "<br>";*/

				if ($seguir1 == true && $seguir2 == true && $seguir3 == true) {
					$_SESSION['factura'] = true;

					echo "<div>
					
					<p>TU ULTIMA MISA FUE EL " . $fechaMessage . " POR LO CUAL NO PUEDES PARTICIPAR EN OTRA MISA HASTA DENTRO DE UNA SEMANA (" . $fechaMessageTwo . ") A MENOS QUE A LA MISA LE FALTEN 24 HORAS Y TENGA DISPONIBILIDAD DE MAS DEL 40% DE SILLAS</p>
					
					</div>";
				} else if (($seguir1 == true && $seguir2 == false  && $seguir3 == true) || ($seguir2 == true && $seguir1 == false && $seguir3 == true)) {
					$_SESSION['factura'] = true;

					echo "<div>
					
					<p>TU ULTIMA MISA FUE EL " . $fechaMessage . " POR LO CUAL NO PUEDES PARTICIPAR EN OTRA MISA HASTA DENTRO DE UNA SEMANA (" . $fechaMessageTwo . ") A MENOS QUE A LA MISA LE FALTEN 24 HORAS Y TENGA DISPONIBILIDAD DE MAS DEL 40% DE SILLAS</p>
					
					</div>";
				} else if (($seguir1 == true && $seguir3 == true) || ($seguir2 == true && $seguir3 == true) && $seguir3 == true) {
					$_SESSION['factura'] = true;
					echo "<div>
					
					<p>TU ULTIMA MISA FUE EL " . $fechaMessage . " POR LO CUAL NO PUEDES PARTICIPAR EN OTRA MISA HASTA DENTRO DE UNA SEMANA (" . $fechaMessageTwo . ") A MENOS QUE A LA MISA LE FALTEN 24 HORAS Y TENGA DISPONIBILIDAD DE MAS DEL 40% DE SILLAS</p>
					
					</div>";
				} else {



					if ($disponiblemisa > 0) {


						echo '<div style="background-color: #33b5e5; width: 100%; color:white;" id="pulpito">PÚLPITO</div>
						<br>';

						$filas = $filasMisa;
						$columnas = $columnasMisa;
						$name = $_SESSION['name'];
						$document = $_SESSION['documento'];




						echo '<label for="">Nombres</label><input type="text" value="' . $name . '" disabled required class="mas" value id="name1">';
						echo '<label for="">N° de Identificación</label><input type="number" disabled value="' . $document . '" class="mas" id="document1">';
						echo '<form action="" id="newform" name="form">
					<label for="">N° Acompañantes</label>
					<input type="number" name="Nacompanante" id="acom" placeholder="N° Acompañantes " value="0">';
						echo '<div id="micompañia"></div>
					<br> <br>
					</form>';

						$queries = new verification();

						$valores = $queries->showAllSupervisor($_SESSION['misa']);

						$sillaselec = "";
						$verification = null;


						if (isset($valores)) {


							foreach ($valores as $duv) {
								$sillaselec = $sillaselec . $duv['sillas'] . ",";
							}
						}

						$sillaselec = explode(",", $sillaselec);




						for ($i = 1; $i <= $filas; $i++) {

							$letra = chr($i + 64);
							if ($i == 27) {
								$m = 1;
								$q = 1;
							}


							if (isset($m)) {

								for ($o = $q; $o <= $filas; $o++) {
									$letras = chr($o + 64);
									break;
								}

								for ($p = $m; $p <= $filas; $p++) {
									$letra = $letras . chr($p + 64);
									break;
								}

								if ($p >= 26) {
									$q = $q + 1;
									$m = 1;
								} else {
									$m = $m + 1;
								}
							}


							echo '<div id="fer">';
							echo '<fieldset>';
							echo '<legend>Fila ' . $i . '</legend>';

							for ($k = 1; $k <= $columnas; $k++) {

								$miletra = $letra . $k;
								$lon = count($sillaselec);

								for ($y = 0; $y < $lon - 1; $y++) {

									//echo "<script>alert('silla: $sillaselec[$y] -  letra: $miletra  - for: $y')</script>";
									//echo "<script>alert('$sillaselec[$y]')</script>";

									if ($sillaselec[$y] === $miletra) {

										$verification = true;
										//echo "<script>alert('hel $miletra $verification')</script>";
									}
								}

								//echo "<script>alert('$miletra $verification')</script>";


								//echo "<script>alert('$sillaselec[1]')</script>";
								if ($verification === true) {
									echo ' <button type="button" class="buton" style="background-color:red;" disabled>' . $letra . '' . $k . '</button>';
								} else {


									echo ' <button type="button" class="buton silla disponible" id="' . $letra . '' . $k . '" onclick="seleccion(' . $letra . '' . $k . ')" disabled>' . $letra . '' . $k . '</button>';
								}
								$verification = false;
							}
							echo '</fieldset>';


							echo '</div> ';
							echo '<br>';
						}

						echo '<button type="button" class="btn btn-outline-info btn-rounded " id="comprar" onclick="comprar()" >SELECCIONAR</button>
				  <button type="submit" id="cobrar" class="btn btn-outline-info btn-rounded " disabled  onclick="cobrar()" >RESERVAR</button>';
				  echo "</section>";
					} else {
						echo "<script>location.href='tableMisas.php'</script>";
					}
				}
			}
		} else {
			echo "<script>location.href='tableMisas.php'</script>";
		}
	} // cierra el if del cargue de las sillas

} //cierre de funcion cargarSillas




function cargarMisasPadre()
{


	$queries = new queriesMisas();
	//Genera consulta en la tabla user para obtener los usuarios
	$result = $queries->showMisas();



	if (isset($result)) { //En caso de haya un error en la variable resultado

		foreach ($result as $f) {


			echo '
						<tr>
						<td>' . $f["id"] . '</td>
						<td>' . $f["name"] . '</td>
						<td>' . date("d-m-Y", strtotime($f["fecha"])) . '</td>
						<td>' . date("h:i:s a", strtotime($f["hora_inicio"])) . '</td>
						<td>' . date("h:i:s a", strtotime($f["hora_fin"])) . '</td>
						<td>' . $f["total"] . '</td>
						<td>' . $f["disponibles"] . '</td>
					';
			if ($f["activo"] == false) {
				echo '
							<td>No</td>
							';
			} else {
				echo '
							<td>Si</td>
							';
			}

			if ($f['disponibles'] < $f['total']) {
				echo '
							<td> <a href="reporte.php?id=' . $f["id"] . '">Ver</a> </td>';
			} else {
				echo '<td></td>';
			}
			echo '</tr>';
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
            	<td></td>

            	';
	}; //end if

}//cierre de funcion cargarMisasPadre
