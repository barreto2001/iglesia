
$('#download').on('click',function(){


		$.ajax({
			type: 'POST',
			url: '../../controllers/create/downloadExcel.php'
		})
		.done(function(response) {
			

		})
		.fail(function(data) {

			alert('error al descargar el reporte');

		});


	

});
