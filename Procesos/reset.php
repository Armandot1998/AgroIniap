<?php

session_start();
error_reporting(0); // No mostrar los errores 
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Ups!! el formulario ha caducado';
die();
}else{

include_once '../Conexion/conexion2.php';
$conexion=conexion();

 if($_POST['clave']== null || $_POST['clave']== ''){

    echo '<div class="alert alert-danger" role="alert">
    <strong>Importante! </strong> Por favor ingrese la nueva <strong>clave</strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';

 }else{

    if($_POST['Cclave']== null || $_POST['Cclave']== ''){

        echo '<div class="alert alert-danger" role="alert">
        <strong>Importante! </strong> Profavor confirme su nueva <strong>clave</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';

    }else{


if($_POST['clave'] == $_POST['Cclave']){

    $usuario = $_SESSION['usuario'];
    
    $clave = md5($_POST['clave']);

    $sql=" UPDATE Agr_usuario SET clave = '$clave' WHERE ci= '$usuario'";
    $result=pg_query($conexion,$sql);

    session_destroy();

    echo '<script type="text/javascript">alert("Clave actualizada con exito!");</script>';
    echo '<script> location.href="http://localhost/AgroIniap/index.html"; </script>';



}else{
    echo '<div class="alert alert-danger" role="alert">
    <strong>Ups! </strong> Las Claves no <strong>coinciden</strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
}
}
};
?>