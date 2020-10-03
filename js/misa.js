$('#preview').hide();

$('#showPreview').on('click',function(){
$('#preview').show();
})

$('.numberfilas').on('keyup',function(){

			
			dibujar();

		});

		$('.numbercolumnas').on('keyup',function(){

			
			dibujar();

		});
		

		function dibujar(){

			var filas=$('.numberfilas').val();
			var columnas=$('.numbercolumnas').val();



			

				$('#sillas').empty();
				$('#Nsillas').empty();
				var Nsilla=0;
				var modo=0;

				for (var i = 1; i <= filas; i++) {

					$('#sillas').append("<br>");


					for (var k = 1; k <=columnas; k++) {
						
						Nsilla=Nsilla+1;
						var letra=String.fromCharCode(i+64)+k;
						
						
						var buton="<button type='button' id='butonpaint' disabled>"+letra+"</button> "
						 $('#sillas').append(buton);

						

						modo=modo+1;

						
					}
					$('#sillas').append("<br>");

					

				}
				$('#Nsillas').append("Total de sillas: "+Nsilla);
			

			
		}