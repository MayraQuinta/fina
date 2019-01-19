<!DOCTYPE html>

<html lang="en">


   <?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../app/Conexion.php';
?>
   <!-- start: cent -->
            <div id="content" >
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">ACTIVO FIJO</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                                       
                   
     
 <section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Registro de institución</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">  

                      <?php
include_once '../app/Conexion.php';
include_once '../repositorios/correlativos.php';
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
                              <input type="text" class="form-text" onkeypress="return soloLetras(event)" id="validate_firstname" name="nameNombre" required="" aria-required="true">
                              <span class="bar"></span>
                              <label><span class="fa fa-institution"></span>   Nombre de la institución </label>
                            </div>

                         
                                  <br>
   <br>

   </div> 


             <div class="col-md-12 panel-footer" align="center">
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

   <script type="text/javascript">
      
 jQuery(function($){
            // Definimos las mascaras para cada input
            
            $("#dui_natural").mask("99999999-9");
            
        });
           function soloLetras(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key).toLowerCase();
        letras=" áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales="8-37-38-46-164";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;break;
            }
        }
        if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
        }
        
    </script>
</html>