<?php
session_start();
  if($_SESSION['dpd']['logeo']==false){
    header("Location: index.php"); 
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-alert.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="js/parse-1.2.1.js"></script>
	<script src="js/main.js"></script>
	<style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
	
	<title>PDF</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container-narrow">
        <div class="masthead">
          <ul class="nav nav-pills pull-right">
          <li><a href="salir.php">Salir</a></li>
        </ul>
        <h3 class="muted">Carga de Síntesis a App</h3>
        </div>
      </div>
    <div class="jumbotron">
		<p class="lead">Pasos para la carga la síntesis informativa a la Applicación Iphone</p>
    	
		<form id="frmCampana" name="frmCampana" method="post" class="labels" enctype="multipart/form-data">
	    <input type="hidden" name="MAX_FILE_SIZE" value="20971520"  />
	    <b>Paso 1.</b>- Selecciona el Archivo PDF: </br><input type="file" name="archivo" id="imagen"><br/><br/>
	    <b>Paso 2.</b>- Click en el boton de Subir<br/><br/>
	     <span id="botonenviar" class="btn btn-primary btn-large"> SUBIR</span></br><br/>
	    <b>Paso 3.</b>- Espera un momento sin cerrar el navegador hasta que se te indique.<br/><br/>
	    </form>
	     <div id="loader"></div>
	     <div id="mensaje" style="color:red;"></div>
 	</div>

</body>
</html>