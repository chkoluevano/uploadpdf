<?php
session_start();
date_default_timezone_set('America/Mexico_City');
$res=array();
$total=0;
$rows = array();
//if($_SESSION['dpd']['logeo']){
	/* Portadas */
	if(isset($_FILES["portadas"])){
		$status="";
		$code=0;
		$nombre_final = uniqid() . "_portadas" . date('Y-m-d') . ".pdf";
		if(mover_archivo($_FILES['portadas']['tmp_name'], 'uploads/' . $nombre_final)){
			$status="se subío correctamente";
			$code=1;		
		}
		else{
			$status="produjo un error, sube de nuevo este archivo";
			$code=2;
		}
		$rows[] = array('tipo' => "portadas","code"=> $code, "status" => $status,"campo"=> "portadas", "nombre"=>$nombre_final);

	}
	else{
		$rows[] = array('tipo' => "portadas","code"=> 3, "status" => 'no fue encontrado');
	}


	/* Notas */
	if(isset($_FILES["notas"])){
		$status="";
		$code=0;
		$nombre_final = uniqid() . "_notas" . date('Y-m-d') . ".pdf";
		if(mover_archivo($_FILES['notas']['tmp_name'], 'uploads/' . $nombre_final)){
				$status="se subío correctamente";	
				$code=1;
			}
			else{
				$code=2;
				$status="produjo un error, sube de nuevo este archivo";
			}
			$rows[] = array('tipo' => "notas", "code"=>$code, "status" => $status, "campo"=> "ruta", "nombre"=>$nombre_final);
	}
	else{
		$rows[] = array('tipo' => "notas","code"=> 3, "status" => 'no fue encontrado');
	}
	
/*}
else{
	echo "estas fuera de sesion";
}*/


print_r(json_encode($rows));


function mover_archivo($temporal,$ruta){
		if(move_uploaded_file($temporal, $ruta)){
			return true;
		}
		else{
			return false;
		}
}


?>