<?php 
	$nombre = $_POST['nombre'];
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];

	echo $nombre. "ha dicho <br/>".$mensaje;
	if(mail('pruebaproyectosucr@gmail.com', $asunto, $mensaje)){
		echo "mail enviado";
	}else{
		echo "uyuyuyuyuy";
	}
 ?>