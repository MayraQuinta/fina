<!DOCTYPE html>

<html lang="en">


   <?php
include_once 'menu.php';
?>
   <!-- start: content -->
            <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Customer Service</h3>
                        <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Batavia,Indonesia</p>

                      
                    </div>
                  
                    </div>
                  </div>                    
                </div>   
     
 <body id="mimin" class="dashboard">

<div class="col-md-6" align="center">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      <h4>Institución</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">

                      <?php
include_once 'app/Conexion.php';
include_once 'repositorios/correlativos.php';
Conexion::abrir_conexion();

if (isset($_REQUEST['nameEnviar'])) {
    $nombre = $_REQUEST['nameNombre'];
    $conexion = Conexion::obtener_conexion();
    $correlativo = correlativos::obtener_correlativo($conexion, 'institucion');
    
    $sql = "INSERT INTO institucion (nombre, correlativo) VALUES ('$nombre', '$correlativo')";
     $sentencia = $conexion->prepare($sql);
     $resultado = $sentencia->execute();
     
     echo '<script>location.href ="institucion.php";</script>';
     
     
}else{

?>

                        <form action="institucion.php" method="GET" autocomplete="off">

                          <div class="col-md-9">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_firstname" name="nameNombre" required="" aria-required="true">
                              <span class="bar"></span>
                              <label>Nombre *</label>
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