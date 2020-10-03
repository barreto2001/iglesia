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
			
			alert('misa creada');
			location.reload();

		})
		.fail(function(data) {

			alert('error al crear la misa');

		});
	});


	

});
