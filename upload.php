<?php
session_start();
date_default_timezone_set('America/Mexico_City');
if($_SESSION['dpd']['logeo']){
	if($_FILES['archivo']['name']!=""){
		$nombre_final = uniqid() . "_sintesis" . date('Y-m-d') . ".pdf";
		if(mover_archivo($_FILES['archivo']['tmp_name'], 'uploads/' . $nombre_final)){
			echo $nombre_final;
		}
		else{
			echo "ERROR";
		}
		
	}	
	else{
		echo "ERROR";
	}


}
else{
	echo "ERROR";
}
	function mover_archivo($temporal,$ruta){
		if(move_uploaded_file($temporal, $ruta)){
			return true;
		}
		else{
			return false;
		}
	}


?>