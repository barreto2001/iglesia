<?php 
	
	require_once('../../model/conexion/conexion.php');
	require_once('functionsExcel.php');
	require_once ('../../library/PHPExcel/Classes/PHPExcel.php');
	require_once('../../model/query/read/misas.php');
	require_once('../../controllers/read/loadTableMisas.php');
    session_start();
	if (isset($_SESSION['idMisa'])) {
		$id=$_SESSION['idMisa'];

	}

	 errorreporte();
	 consola();

	 

	$objPHPExcel = new PHPExcel();
	// Contenido de historia del archivo
	$objPHPExcel->getProperties()->setCreator("ADSI 2020")
							 ->setLastModifiedBy("Maarten Balliauw")
							 //veersion minima de excel
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

	//tipo de letra y tamaño
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(10);



    // estilos de los titulos de las columnas
    $estiloTituloColumnas = array(
    	//fuente
	    'font' => array(
		'name'  => 'Arial',
		'bold'  => true,
		'size' =>10,
		'color' => array(
		'rgb' => '000000'
		)
	    ),
	    //colores
	    'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'color' => array('rgb' => 'D0CECE')
	    ),
	    //enmarcados de los bordes
	    'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
	    ),
	    //alineación
	    'alignment' =>  array(
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
	    )
	);
    //bordes del contenido
    $bordeCeldas = array(
	 
	    'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN
		)
	    ),
	   
	);
	//color de fondo de contenido
	$sheet = array(
           'fill' => array(
               'type' => PHPExcel_Style_Fill::FILL_SOLID,
               'color' => array('rgb' => 'BDD7EE')
           
       )
	);
	//alineacion del contenido
	$alin= array(
		'alignment' =>  array(
		'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		) 
	);



	//ancho en columnas de la tabla y sus estilos
	$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($estiloTituloColumnas);
	

	// dibujo de los titulps y las cabeceras de la tabla
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', '')
            ->setCellValue('B1', 'SUPERVISOR')
            ->setCellValue('C1', 'NOMBRES')
            ->setCellValue('D1', 'TIPO DOCUMENTO')
            ->setCellValue('E1', 'N° DOCUMENTO')
            ->setCellValue('F1', 'EMAIL')
            ->setCellValue('G1', 'CELULAR')
            ->setCellValue('H1', 'DIRECCION');

	

     $queries = new queriesMisas();
		$result=$queries->showUser($id);
		

		$num=0;
		$i=1;
		if (isset($result)) {
			foreach ($result as $f) {
				$num=$num+1;
				$i=$i+1;

				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue("A$i", $num)
					->setCellValue("B$i", "SUPERVISOR")
					->setCellValue("C$i", $f['name'])
		            ->setCellValue("D$i", $f['tipo'])
		            ->setCellValue("E$i", $f['document'])
		            ->setCellValue("F$i", $f['email'])
		            ->setCellValue("G$i", $f['cel'])
					->setCellValue("H$i", $f['address']);

                $resultTwo=$queries->showUserTwo($f['document'],$id);

                if (isset($resultTwo)) {
                	foreach ($resultTwo as $k) {
                		$num=$num+1;
                		$i=$i+1;

                		$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue("A$i", $num)
							->setCellValue("B$i", $f['document'])
							->setCellValue("C$i", $k['name'])
				            ->setCellValue("D$i", $k['tipo'])
				            ->setCellValue("E$i", $k['document'])
				            ->setCellValue("F$i", $f['email'])
				            ->setCellValue("G$i", $f['cel'])
							->setCellValue("H$i", $f['address']);

		                if ($k['supervisor']!=$f['document']) {
		                	break;
		                }
		                
                	}
                	

                }else{
                	$num=$num+1;
                	$i=$i+1;
                }
                
          

			}
			
		



		//ajustes de texto
		$objPHPExcel->getActiveSheet()->getStyle("A2:H$i")->applyFromArray($bordeCeldas);
		$objPHPExcel->getActiveSheet()->getStyle("A2:H$i")->applyFromArray($sheet);
		$objPHPExcel->getActiveSheet()->getStyle("A2:H$i")->applyFromArray($alin);
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		


		//titulo del archivpo
		$objPHPExcel->getActiveSheet()->setTitle('ASISTENCIA A MISA');


		$objPHPExcel->setActiveSheetIndex(0);

		getHeaders('ASISTENCIA A MISA');


		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

	}else{

		echo "<script>alert('fallo al descargar reporte');
		location.href='../../';

		</script>";
	
	}

	



 ?>