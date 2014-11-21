<?php
  session_start();
  $mensaje="";
  if($_POST["entrar"]){
    $strUserName=trim($_POST["email"]);
    $strUserPassword=trim($_POST["clave"]);
    if ($strUserName=="usrsintesis2014" && $strUserPassword=="pwd2013sintesis"){
      $_SESSION['dpd']['logeo']=true;
    }
    else{
      $mensaje= '<div class="alert alert-error" >Datos incorrectos</div>';
    }

  }
  if($_SESSION['dpd']['logeo']){
    header("Location: carga.php"); 
    exit;
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ingresar</title>  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-alert.js"></script> 
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    

  </head>

  <body>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">        
        <div class="container">
          <a class="brand" href="#">Carga de Síntesis Informativa</a>
        </div>
      </div>
</div><br/><br/>
    <div class="container">
    	
      <div class="form-signin">
      	<form id="fom" method="post">
          <h2 class="form-signin-heading"><p align="center"><img src="img/logos/gto-logo.png"></p></h2>
          <input type="text" name="email" id="email" title="" class="input-block-level" placeholder="Usuario" required>
          <input type="password" name="clave" title="" id="clave" class="input-block-level" placeholder="Clave" required>        
          <input type="submit" name="entrar" value="Ingresar">
        </form>
        <br/><br/>
       
          <?php echo $mensaje; ?>
        
      </div>

    </div> 
      
     

  </body>
</html>