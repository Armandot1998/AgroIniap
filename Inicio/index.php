<?php
session_start();
error_reporting(0); // No mostrar los errores 
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Usted no tiene autorizacion';
die();
}else{
  ?>
  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AgroIniap</title>
  <link rel="icon" href="../Libs/Imagenes/iniap.png" type="image/x-icon"> <!-- Icono de la pagina web -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/style.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"><!-- Font Awesome Icons  links -->

</head>
<body>
  <?php

include '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];

   $sql="SELECT agr_estado.nombre_corto as estado FROM agr_usuario INNER JOIN agr_estado 
       ON agr_usuario.id_estado = agr_estado.id_estado WHERE ci = '$usuario'";
  $last=pg_query($conexion,$sql);
  $fila=pg_fetch_array($last);

       $estado = $fila['estado'];

       if($estado == 'R'){
         ?>
<nav class="navbar fixed-top navbar-dark indigo">
  <span class="navbar-text white-text"> AgroIniap </span>
  <div class="btn-group">
  <button class="btn btn-outline-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false">
  Opciones
</button>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="../Procesos/cerrar.php">Cerrar Sesion</a>
    </div>
  </div>
</nav><div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
<br><br><br>
    <ul class="list-group">
  <li class="list-group-item active">Cras justo odio</li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul>
		</div>
		<div class="col-md-10">
      <br><br><br>
    <div class="jumbotron">
				<h2>
					Upss, Por favor verifica tu corréo electrónico!
				</h2><br>
				<p>
				Es de suma importacia que la cuenta de email con la que te has registrado sea verificada.
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>
			</div>
		</div>
	</div>
<?php
}else{
         if($estado == 'A'){?>
         
    <nav class="navbar fixed-top navbar-dark indigo">
    <span class="navbar-text white-text"> AgroIniap </span>
    <div class="btn-group">
    <button class="btn btn-outline-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    Opciones
  </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="./Usuario/perfil.php">Perfil</a>
        <a class="dropdown-item" href="#">Notificaciones</a>
        <a class="dropdown-item" href="#">Acerca de ..</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../Procesos/cerrar.php">Cerrar Sesion</a>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
<br><br><br>
    <ul class="list-group">
  <li class="list-group-item active">Menú de Opciones</li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul>
		</div>
		<div class="col-md-10">
      <br><br><br>
    <div class="jumbotron">
				<h2>
					Bienvenido!
				</h2>
				<p>Te damos la bienvenida a la plataforma AgroIniap.</p>
				<p>
					<a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>
			</div>
		</div>
	</div>
  <?php
         }
       }
}
?>

<script type="text/javascript" src="../Libs/MDBootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/popper.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/mdb.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script><!-- Font Awesome Icons  links -->
  <script type="text/javascript"></script>
</body>
</html>