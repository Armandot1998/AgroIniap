<?php
session_start();
error_reporting(0); // No mostrar los errores 
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Usted no tiene autorizacion';
die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AgroIniap</title>
  <link rel="icon" href="../../Libs/Imagenes/iniap.png" type="image/x-icon"> <!-- Icono de la pagina web -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="../../Libs/MDBootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../Libs/MDBootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="../../Libs/MDBootstrap/css/style.css">

</head>

<?php 
include '../../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];

       $sql2="SELECT agr_usuario.nombres, agr_usuario.apellidos, agr_usuario.correo, agr_usuario.ci,
       agr_usuario.direccion, agr_usuario.e_asociacion, agr_provincia.nombre as provincia, agr_canton.nombre as canton,
       agr_parroquia.nombre as parroquia
       FROM Agr_usuario 
       INNER JOIN agr_provincia ON agr_usuario.id_provincia = agr_provincia.id_provincia
       INNER JOIN agr_canton ON agr_usuario.id_canton = agr_canton.id_canton
       INNER JOIN agr_parroquia ON agr_usuario.id_parroquia = agr_parroquia.id_parroquia WHERE ci = '$usuario'";
       $last=pg_query($conexion,$sql2);
       $fila=pg_fetch_array($last);

       $nombres = $fila['nombres'];
       $apellidos = $fila['apellidos'];
       $email = $fila['correo'];
       $ci = $fila['ci'];
       $provincia = $fila['provincia'];
       $canton = $fila['canton'];
       $parroquia = $fila['parroquia'];
       $direccion = $fila['direccion'];
       $asociacion = $fila['e_asociacion'];
?>
<body>
  <nav class="navbar fixed-top navbar-dark indigo">
    <span class="navbar-text white-text"> AgroIniap </span>
    <div class="btn-group">
    <button class="btn btn-outline-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    Opciones
  </button>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="../index.php">Inicio</a>
        <a class="dropdown-item" href="#">Notificaciones</a>
        <a class="dropdown-item" href="#">Acerca de ..</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../../Procesos/cerrar.php">Cerrar Sesion</a>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
      <br><br><br>
			<div class="jumbotron">
        <h2>
					Modificar Datos del Usuario
        </h2>
    <div class="row">
		 <div class="col-md-6">

    <div class="md-form">
        <input type="text" id="materialLoginFormPassword" value="<?php echo $nombres; ?>" class="form-control" >
        <label for="materialLoginFormPassword">Nombres</label>
    </div><br>

    <div class="md-form">
        <input type="text" id="materialLoginFormPassword" value="<?php echo $ci; ?>" class="form-control" >
        <label for="materialLoginFormPassword">Cédula de Identidad</label>
      </div><br>
      <h2>
					Dirección
      </h2>
    </div>
		<div class="col-md-6">

    <div class="md-form">
        <input type="text" id="materialLoginFormPassword" value="<?php echo $apellidos; ?>" class="form-control" >
        <label for="materialLoginFormPassword">Apellidos</label>
    </div><br>

      <div class="md-form">
        <input type="text" id="materialLoginFormPassword" value="<?php echo $email; ?>" class="form-control" >
        <label for="materialLoginFormPassword">Email</label>
      </div>
		 </div>
	</div>
<div class="row">
		<div class="col-md-4">
    <div class="md-form">
        <input type="text" id="materialLoginFormPassword" value="<?php echo $provincia; ?>" class="form-control" >
        <label for="materialLoginFormPassword">Provincia</label>
      </div>
		</div>
		<div class="col-md-4">

    <div class="md-form">
        <input type="text" id="materialLoginFormPassword" value="<?php echo $canton; ?>" class="form-control" >
        <label for="materialLoginFormPassword">Canton</label>
      </div>

		</div>
		<div class="col-md-4">

    <div class="md-form">
        <input type="text" id="materialLoginFormPassword" value="<?php echo $parroquia; ?>" class="form-control" >
        <label for="materialLoginFormPassword">Parroquia</label>
      </div>
    </div>
  </div>
  <div class="row">
		<div class="col-md-8">
    <div class="md-form">
  <textarea id="form7" class="md-textarea form-control" rows="1" ><?php echo $direccion; ?></textarea>
  <label for="form7">Direción Domiciliaria</label>
</div>
<br>
      <h2>
					Asociación
      </h2>
		</div>
		<div class="col-md-4">
		</div>
	</div>
  <div class="row">
		<div class="col-md-6">
    <div class="md-form">
        <input type="text" id="materialLoginFormPassword" value="<?php echo $asociacion; ?>" class="form-control" >
        <label for="materialLoginFormPassword">Asociacion</label>
      </div>
		</div>
		<div class="col-md-6" align="center">
    <button type="button" class="btn btn-outline-primary waves-effect">Modificar Perfil</button>
		</div>
	</div>
  </div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>
  <script type="text/javascript" src="../../Libs/MDBootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../Libs/MDBootstrap/js/popper.min.js"></script>
  <script type="text/javascript" src="../../Libs/MDBootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../Libs/MDBootstrap/js/mdb.min.js"></script>
  <script type="text/javascript"></script>
</body>

</html>