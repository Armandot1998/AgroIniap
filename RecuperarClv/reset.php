<?php
session_start();
error_reporting(0); // No mostrar los errores 
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Upss!! el formulario ha caducado';
die();
}else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar Clave</title>
  <link rel="icon" href="../Libs/Imagenes/iniap.png" type="image/x-icon"> <!-- Icono de la pagina web -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/style.css">
</head>
<body>
<nav class="navbar navbar-dark indigo">
        <span class="navbar-text white-text">
        Recupera tu cuenta
          </span>
    </nav>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<form role="form">
						<div class="form-group">
							<label for="cedula">
								Nueva Clave:
							</label>
                            <input type="password" class="form-control" id="clave" />
                            <div align="right"><input type="checkbox" onclick="Mostrar()">&nbsp;Mostrar Clave</div>
                        </div>
                        <div class="form-group">
							<label for="cedula">
								Confirmar Clave:
							</label>
                            <input type="password" class="form-control" id="Cclave" />
                            <div align="right"><input type="checkbox" onclick="Mostrar2()">&nbsp;Mostrar Clave</div>
                        </div>
                        <button type="button" id="enviar" class="btn btn-primary">
							Enviar
						</button>
                    </form><br>
                <div class="modal-footer display-footer" id="respuesta"></div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
<script>

function Mostrar() {
  var x = document.getElementById("clave");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function Mostrar2() {
  var x = document.getElementById("Cclave");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


$('#enviar').click(function () {

  var clave = document.getElementById('clave').value;
  var Cclave = document.getElementById('Cclave').value;

  var ruta = "clave=" + clave + "&Cclave=" + Cclave;

  $.ajax({
    url: '../Procesos/reset.php',
    type: 'POST',
    data: ruta,
  })
    .done(function (res) {
      $('#respuesta').html(res)
    })
    .fail(function () {
      console.log("error");
    })
    .always(function () {
      console.log("complete");
    });
});

</script>
</div>
<script type="text/javascript" src="../Libs/MDBootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/popper.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/mdb.min.js"></script>
  <script type="text/javascript"></script>
</body>
</html>




<?php };?>