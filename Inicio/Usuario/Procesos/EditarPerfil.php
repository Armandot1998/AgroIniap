<?php
session_start();
//error_reporting(0);  No mostrar los errores 
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Usted no tiene autorizacion';
die();
}else{

include_once '../../../Conexion/conexion2.php';
$conexion=conexion();

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$provincia = $_POST['provincia'];
$canton = $_POST['canton'];
$parroquia = $_POST['parroquia'];
$Ddireccion = $_POST['Ddireccion'];
$asociacion = $_POST['asociacion'];

$usuario = $_SESSION['usuario'];

if ($nombres == null || $nombres == '') {
    echo '<div class="alert alert-danger" role="alert">
    <strong>Importante! </strong> Por favor ingrese sus <strong>Nombres Completos</strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}else{
    if($apellidos == null || $apellidos == ''){
        echo '<div class="alert alert-danger" role="alert">
        <strong>Importante! </strong> Por favor ingrese sus <strong>Apellidos Completos</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }else{
        if($correo == null || $correo == ''){
            echo '<div class="alert alert-danger" role="alert">
            <strong>Importante! </strong> Por favor ingrese su <strong>Corréo Electronico</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }else{
            if($provincia == null || $provincia == ''){
                echo '<div class="alert alert-danger" role="alert">
    <strong>Importante! </strong> Por favor seleccione la <strong>Provincia</strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';    
            }else{
                if($canton == null || $canton == ''){
                    echo '<div class="alert alert-danger" role="alert">
                    <strong>Importante! </strong> Por favor seleccione el <strong>Canton</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }else{
                    if($parroquia == null || $parroquia == ''){
                        echo '<div class="alert alert-danger" role="alert">
                        <strong>Importante! </strong> Por favor seleccione la <strong>Parroquia</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                    }else{
                        if($Ddireccion == null || $Ddireccion == ''){
                            echo '<div class="alert alert-danger" role="alert">
                            <strong>Importante! </strong> Por favor ingrese su <strong>Direccion Domiciliaria</strong>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                        }else{
                        
                                $sql=" UPDATE Agr_usuario SET nombres ='$nombres', apellidos ='$apellidos', correo= '$correo',
                                id_provincia = $provincia, id_canton = $canton, id_parroquia = $parroquia, direccion = '$Ddireccion',
                                e_asociacion = '$asociacion'  
                                where ci= '$usuario'";
                              $result=pg_query($conexion,$sql);
                          
                              echo '<div class="alert alert-success" role="alert">
                              <strong>Exito! </strong>Datos actualizados <strong>Correctamente</strong>.
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              </div>';

                        }
                    }
                }
            }
        }
    }
}



};
?>