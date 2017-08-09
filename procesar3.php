<?php

$respuesta = $_POST['lista'];

	switch($respuesta)
	{
		case si: header('Location: http://190.192.176.210:8000/TP%20Matematica%20Superior/formulario.php');
		break;
		
		case no: echo "Gracias por usar la aplicacion";
		break;	
	}

?>