$(function() {

	var form = $('#creadorMisa');


	$(form).submit(function(e) {

		e.preventDefault();

		var formData = $(form).serialize();
	

		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			
			Swal.fire({
				
				text: "Misa creada con exito",
				icon: "success",
				showConfirmButton: false,
				timer: 2000
			  });

			  setInterval(() => {
				location.reload();
			  }, 2000);
		   
			

		})
		.fail(function(data) {

			alert('error al crear la misa');

		});
	});


	

});
