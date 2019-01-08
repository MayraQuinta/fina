<!DOCTYPE html>

<html lang="en">


   <?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../app/Conexion.php';
?>
   <!-- start: content -->
            <div id="content" align="center">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Registro</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                                       
                   
     
 <section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Tipo de Activo</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">  


                      <?php

include_once '../modelos/tipo_activo.php';
include_once '../modelos/clasificacion.php';
include_once '../repositorios/repositorio_clasificacion.php';
include_once '../repositorios/repositorio_tipoActivo.php';
include_once '../app/Conexion.php';
include_once '../repositorios/correlativos.php';
Conexion::abrir_conexion();

if (isset($_REQUEST['nameEnviar'])) {
    $nombre = $_REQUEST['nameNombre'];
    $select =$_REQUEST['NameSelect'];
    $conexion = Conexion::obtener_conexion();
    $correlativo = correlativos::obtener_correlativo($conexion, 'tipo_activo');
    
    $sql = "INSERT INTO tipo_activo (id_clasificacion, nombre, correlativo) VALUES ('$select', '$nombre', '$correlativo')";
     $sentencia = $conexion->prepare($sql);
     $resultado = $sentencia->execute();
     
     echo '<script>location.href ="tipoactivo.php";</script>';
     
     
}else{
$lista_clasificacion = repositorio_clasificacion::lista_clasificacion(Conexion::obtener_conexion());
?>
   

                        <form action="tipoactivo.php" method="GET" autocomplete="off">

                          <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_firstname" name="nameNombre"  required="" aria-required="true">
                              <span class="bar"></span>
                              <label>Nombre *</label>
                            </div>
<div class="form-group">
                                        <div class="form-line">
                                            <div class="form-line">
                                                <select class="form-control success" name="NameSelect" required="">
                                                    <option value="" disabled="">SELECCIONE LA CLASIFICACION</option>
                                                    
                                                       <?php foreach ($lista_clasificacion as $lista) { ?>

                                                        <option value="<?php echo $lista->getId_clasificacion(); ?>"><?php echo $lista->getNombre(); ?></option>

                                                    <?php } ?>

                                                                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                         
                                  <br>
   <br>

   </div> 


             <div class="col-md-12 panel-footer">
                             <button type="submit" name="nameEnviar" class="btn ripple-infinite btn-round btn-primary" value="ok">
                                    <div>
                                      <span>Guardar</span>
                                    </div>
                        </button>     

                          </div>                         
                      
                        
                      </form>
<?php
}
?>
                    </div>
                  </div>
                </div>
              </div>
   

   
  <!-- end: Javascript -->
  </body>
</html>