<?php

function updateFactura(){

			$queries = new verification();
			//Genera consulta en la tabla user para obtener los usuarios
			$dispoMisa=$queries->showMiMisaTwo($_SESSION['misa']);
			$result=$queries->showSupervisorTwo($_SESSION['documento']);
			$resultTwo=$queries->showAcompananteTwo($_SESSION['documento']);
		if (isset($dispoMisa)) {
			foreach ($dispoMisa as $mis) {
				$disponiblemisa=$mis['disponibles'];
				$filasMisa=$mis['filas'];
				$columnasMisa=$mis['columnas'];
			}
			

			if (isset($result)) {
			

					echo'<div style="background-color: #33b5e5; width: 100%; color:white;" id="pulpito">RESERVACIÓN MISA</div>
						<br>';
					foreach ($result as $row ) {
						$sillas=$row['cantidad_sillas']-1;

						$quer = new queriesMisas();
						//Genera consulta en la tabla user para obtener los usuarios
						$res=$quer->showMiMisa($row['misa']);
						$_SESSION['factura']=true;

						
						echo'
							<input type="hidden" value="'.$row['name'].'">	
							<p id="nombre">Supervisor: '.$row['name'].'</p>
							<input  type="hidden" value="'.$row['document'].'">	
							<p id="documento">N° Doc: '.$row['document'].'</p>
							<input id="Nacompañantess" type="hidden" value="'.$sillas.'">		
							<p id="Nacompañantes">N° Acompañantes: '.$sillas.'</p>';
						
							

					}

					$resultTres=$queries->showAcompanantes($_SESSION['documento']);
					$i=1;
					
					if (isset($resultTres)) {
						
					
						foreach ($resultTres as $key) {
							if($key['tipo']=="CC"){
								$tipo="Cedula de Ciudadania";
							}
							if($key['tipo']=="TI"){
								$tipo="Tarjeta de Identidad";
							}
							if($key['tipo']=="CE"){
								$tipo="Cedula de Extranjeria";
							}
									
							echo '
								<div id="datos">
								<p style="margin-bottom:1px;">Acompañante '.$i.'</p>
								<input type="hidden" id="id'.$i.'" value="'.$key['id'].'">
								<input id="name'.$i.'" value="'.$key['name'].'">
								<select class="browser-default custom-select mas"  id="tipo'.$i.'" name="tipo" style="width:15%;"> <option value="'.$key['tipo'].'" selected>'.$tipo.'</option> <option value="CC">Cedula de Ciudadania</option> <option value="TI">Tarjeta de Identidad</option><option value="CE">Cedula de Extranjeria</option></select>
								<input id="document'.$i.'" value="'.$key['document'].'">
								
								
								
								</div>	
								<br>
							';
							$i=$i+1;
						}
						if (isset($row['observacion'])) {
							echo'<p id="observacion">Observación: '.$row['observacion'].'</p>';
						}
						
					}
					echo'<p id="acompañantes">Sillas solicitadas: '.$row['sillas'].'</p>';
					

					echo'<button type="button" id="cobrar" style="margin-bottom:10px; margin-right:10px;" onclick="cobrar()" >MODIFICAR</button>';
					echo'<button type="button" style="margin-bottom:10px;" onclick="volver()" >VOLVER</button>';
					

					
					$queries = new verification();
			
				$valores=$queries->showAllSupervisor($row['misa']);

				$sillaselec="";
				$verification=null;


				if (isset($valores)) {
					

					foreach ($valores as $duv ) {
						$sillaselec=$sillaselec.$duv['sillas'].",";
					}				
				}

				$sillaselec=explode(",",$sillaselec);

				$misSillas=explode(",",$row['sillas']);


								
	
				for ($i=1; $i <=$filasMisa; $i++) {

					$letra=chr($i+64);
					if ($i==27) {
						$m=1;
						$q=1;
					}

						
					if (isset($m)) {

						for ($o=$q; $o <=$filasMisa ; $o++) { 
							$letras=chr($o+64);
							break;
						}						

						for ($p=$m; $p <=$filasMisa ; $p++) { 
							$letra=$letras.chr($p+64);
							break;
						}

						if ($p>=26) {
							$q=$q+1;	
							$m=1;						
						}else{
							$m=$m+1;
						}
							
					}

						
						

					echo'<div id="fer">';
					echo'<fieldset>';
					echo'<legend>Fila '.$i.'</legend>';

						for ($k=1; $k<=$columnasMisa ; $k++) { 
							
								$miletra=$letra.$k;
								$lon=count($sillaselec);
								$miLon=count($misSillas);

								for ($y=0; $y <$lon-1 ; $y++) { 

									//echo "<script>alert('silla: $sillaselec[$y] -  letra: $miletra  - for: $y')</script>";
									//echo "<script>alert('$sillaselec[$y]')</script>";

									if ($sillaselec[$y]===$miletra) {
										
										$verification=true;
										//echo "<script>alert('hel $miletra $verification')</script>";
									}

									for($q=0; $q <$miLon ; $q++){

										if ($misSillas[$q]===$miletra) {
										
											$verification="mia";
											
										}

									}
									

									
								}

								//echo "<script>alert('$miletra $verification')</script>";


								//echo "<script>alert('$sillaselec[1]')</script>";
								if ($verification===true) {
									echo' <button type="button" class="buton" style="background-color:red;" disabled>'.$letra.''.$k.'</button>';
								}else if($verification==="mia"){

									echo' <button type="button" style="background-color:blue;" class="buton silla seleccionado" id="'.$letra.''.$k.'" onclick="seleccion('.$letra.''.$k.')">'.$letra.''.$k.'</button>';
								
								}else{
									

									echo' <button type="button" class="buton silla disponible" id="'.$letra.''.$k.'" onclick="seleccion('.$letra.''.$k.')" disabled>'.$letra.''.$k.'</button>';
									
									
								}
								$verification=false;	
							
						}
						echo'</fieldset>';
						

					echo'</div> ';
					echo'<br>';
				}
				


					
			}
		
				
		}else{
			echo "<script>location.href='tableMisas.php'</script>";
		}	


}//cierre de funcion cargarSillas

?>