<?php
	//funcion para las ventnas modales
	//mensaje de error $type=error
	//mesaje de que todo salio bien $type=success
	function modalAlert($mensaje,$url,$type,$sal)
	{	
		$var =null;
		$result=null;

		for ($i=1; $i <=$sal ; $i++) { 
			$result.='../';
		}
		echo'<body></body>';

		echo '<link rel="stylesheet" href="'.$result.'css/main.min.css">';
		echo '<link rel="stylesheet" href="'.$result.'alert/bootstrap4/css/bootstrap.min.css"> 
	    <link rel="stylesheet" href="'.$result.'alert/plugins/sweetAlert2/sweetalert2.min.css"> 
	    <link rel="stylesheet" href="'.$result.'alert/plugins/animate.css/animate.css">
	    <script src="'.$result.'alert/jquery/jquery-3.3.1.min.js"></script> 
	    <script src="'.$result.'alert/popper/popper.min.js"></script> 
	    <script src="'.$result.'alert/bootstrap/js/bootstrap.min.js"></script>
	    <script src="'.$result.'alert/plugins/sweetAlert2/sweetalert2.all.min.js"></script>';

		echo  "<script>
                    $(document).ready(function(){
                        Swal.fire({
                                  type: '".$type."',
                                  title: '".$mensaje."'
                        }).then((result) => {
                        	
                            location.href='".$url."'
                            
                        });
                    });

              </script>";
	}
