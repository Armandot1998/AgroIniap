<?php
session_start();
error_reporting(0); // No mostrar los errores 
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Upss!! El registro ha terminado';
die();
}else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
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
<?php include '../Componentes/navbar.php'; ?><br>
<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<form action="../Procesos/RegCredenciales.php" method="post" role="form">
              <div class="form-group">
                            <label for="asociacion">
								            Pertenece a una asociación? :
                            </label>&nbsp;&nbsp;
                            <select id="asociacion" name="asociacion" require>
                            <option value="no">Escoja una respuesta</option>
                            <option value="no">No</option>
                            <option value="si">Si</option></select>
               </div>
                            <div class="form-group" id="Easociacion">
                            </div>
                            <div class="form-group">
							<label for="cedula"> Clave: </label>
                            <input type="password" class="form-control" id="clave" name="clave"/>
                            <div align="right"><input type="checkbox" onclick="Mostrar()">&nbsp;Mostrar Clave</div>
                        </div>
						<button type="submit" class="btn btn-primary">
							Finalizar Registro
						</button>
                    </form><br>
                    <div class="modal-footer display-footer" id="respuesta"></div>
				</div>
				<div class="col-md-4">
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

$(document).ready(function(){
$("#asociacion").change(function(){
    $("#asociacion option:selected").each(function(){
        id = $(this).val();
        $.post("../Procesos/getAssocia.php", {id: id
        }, function(data){
            $("#Easociacion").html(data);
        });
    });
})
});

</script>
<script type="text/javascript" src="../Libs/MDBootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/popper.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/mdb.min.js"></script>
  <script type="text/javascript"></script>  
</body>
</html>
<?php }; ?>