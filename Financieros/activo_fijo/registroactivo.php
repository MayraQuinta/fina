<!DOCTYPE html>

<html lang="en">


   <?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../app/Conexion.php';
?>
   <!-- start: conte -->
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
                        <h3>Registro de activo</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">  

<?php

include_once '../modelos/tipo_activo.php';
include_once '../modelos/clasificacion.php';
include_once '../modelos/departamento.php';
include_once '../modelos/encargado.php';
include_once '../repositorios/repositorio_clasificacion.php';
include_once '../repositorios/repositorio_tipoActivo.php';
include_once '../app/Conexion.php';
include_once '../repositorios/correlativos.php';
Conexion::abrir_conexion();

if (isset($_REQUEST['nameEnviar'])) {
    $institucion = $_REQUEST['select_institucion'];
    $departamento = $_REQUEST['select_departamento'];
    $tipo_activo = $_REQUEST['select_tipo'];
    $encargado = $_REQUEST['select_encargado'];
    $meses = $_REQUEST['meses'];
    $observaciones = $_REQUEST['obsevaciones'];
    $cantidad = $_REQUEST['cantidad'];
    $fecha = $_REQUEST['fecha'];
    $descripcion  = $_REQUEST['descripcion'];
    $cantidad  = $_REQUEST['cantidad'];
    $precio =$_REQUEST['precio'];
    
    
    $conexion = Conexion::obtener_conexion();
    
 for($i=0; $i<$cantidad;$i++){
 
    $correlativo = correlativos::obtener_correlativo($conexion, 'activo');
$sql = "INSERT INTO activo (id_tipo, id_departamento, id_institucion, id_usuario, encargado_id_encargado, 
  correlativo, fecha_adquisicion, descripcion, estado, tiempo_uso, observaciones,precio) "
                                   . "VALUES ( '$tipo_activo', '$departamento', '$institucion', '1', 
                                    '$encargado', '$correlativo', '$fecha', '$descripcion', 'ACTIVO',
                                     '$meses', '$observaciones','$precio');";
    $sentencia = $conexion->prepare($sql);
    $resultado = $sentencia->execute();
 }
    echo '<script>location.href ="registroactivo.php";</script>';
} else {
    $lista_clasificacion = repositorio_clasificacion::lista_clasificacion(Conexion::obtener_conexion());
    $lista_institucion = correlativos::lista_institucion(Conexion::obtener_conexion());
    $lista_depatamento = correlativos::lista_departamento(Conexion::obtener_conexion());
    $lista_tipo = correlativos::lista_tipo(Conexion::obtener_conexion());
    $lista_encargado = correlativos::lista_encargado(Conexion::obtener_conexion());
    ?>

                        <form action="registroactivo.php" method="GET" autocomplete="off">

                          <div class="col-md-5">
                           


                            <div class="form-group">

                                            <div class="form-line">
                                                <div class="form-line">
                                                   <span class="input-group-addon" id="basic-addon1">Seleccione tipo de activo</span>
                                                    <select class="form-control info" name="select_tipo" placeholder="Cantidad" required="">
                                                        <option  value="" disabled="">Seleccione tipo de activo</option>
                                                        <?php foreach ($lista_tipo as $lista2) { ?>

                                                        <option value="<?php echo $lista2->getId_tipo(); ?>"><?php echo $lista2->getId_correlativo(). "--". $lista2->getId_nombre(); ?>
                                                        </option>

                                                        <?php } ?>
                                                     </select>
                                                </div>
                                            </div>
                                        </div>


                                      

                                          <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                   <span class="input-group-addon" id="basic-addon1">Seleccione departamento</span>
                                                    <select class="form-control info" name="select_departamento"  required="">
                                                        <?php foreach ($lista_depatamento as $lista) { ?>

                                                        <option value="<?php echo $lista->getId_departamento(); ?>"><?php echo $lista->getCorrelativo()."--". $lista->getNombre(); ?></option>

                                                        <?php } ?>
                                                    </select>
                                            </div>
                                        </div>
                                        </div>

                                      

                                          <div class="form-group">
                                        <div class="form-line">
                                               <span class="input-group-addon" id="basic-addon1">Cantidad</span>
                                                <input type="number" min="0" step="any" class="form-control info" name="cantidad" placeholder="Unidades" required="">

                                            </div>
                                            </div> 

                                             

                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text"  name="descripcion" required="" aria-required="true">
                              <span class="bar"></span>
                              <label><span class="fa fa-edit"></span>   Descripción</label>
                            </div>   

                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <label><span class="fa fa-calendar"></span>  Fecha de adquisición</label><br>
                                          <span class="bar" id="basic-addon1"></span>
                                                <input type="date"  class="form-text mask-selectonfocus " required="" name="fecha" placeholder="FECHA ADQUISICION">
                                            </div>
                                      
                                    
                                
   </div> 

 <div class="col-md-5">

  <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                   <span class="input-group-addon" id="basic-addon1">Seleccione institución</span>
                                                    <select class="form-control info" name="select_institucion" required="">
                                                         <?php foreach ($lista_institucion as $lista) { ?>

                                                        <option value="<?php echo $lista->getId_departamento(); ?>">
                                                       
                                                            <?php echo $lista->getCorrelativo() ."--". $lista->getNombre() ; ?>
                                                        </option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>


                                                  

                                        </div>

                                          <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                   <span class="input-group-addon" id="basic-addon1">Seleccione encargado</span>
                                                    <select class="form-control info" name="select_encargado" required="">
                                                        <option  value="" disabled="">Seleccione Encargado</option>
                                                        <?php foreach ($lista_encargado as $lista3) { ?>

                                                        <option value="<?php echo $lista3->getId_encargado(); ?>"><?php echo $lista3->getNombre() ." ". $lista3->getApellido(); ?></option>

                                                        <?php } ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>



                                         <div class="form-group">
                                        <div class="form-line">
                                                 <span class="input-group-addon" id="basic-addon1">Tiempo de uso (Meses)</span>
                                                <input type="number" min="0" step="any" class="form-control info" name="meses"  required="">

                                            </div>
                                            </div>
 

                                         <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text"  name="obsevaciones" required="" aria-required="true">
                              <span class="bar"></span>
                              <label><span class="fa fa-eye"></span>   Observación </label><br>
                            </div>


                                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" id="precio" name="precio" onkeypress="return validaNumericos(event)"class="form-text mask-money" id="precio" required="">
                        <span class="bar"></span>
                        <label><span class="fa fa-dollar"></span>  Precio </label>
                      </div>

                         
 </div>


             <div class="col-md-12 panel-footer" align="center">
                             <button type="submit"  name="nameEnviar"class="btn ripple-infinite btn-round btn-primary" value="ok">
                            
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



<!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
    <!--escript para buscar en la tabla-->


          <!-- Essential javascripts for application to work-->

    <script src="../js/toastr.js"></script>
    <script src="../js/notify.js"></script>
    <script src="../js/plugins/jquery.mask.min.js"></script>

      <script type="text/javascript">

 jQuery(function($){
            // Definimos las mascaras para cada input
            $('#precio').mask('000,000,000,000,000.00', {reverse: true});
            

        });


    </script>
    
    <script>
      $(function () {
  $('#search').quicksearch('table tbody tr');
});
    </script>
<script src="../libreria/jquery.mask.min.js"></script>

<script type="text/javascript">
    $('.mask-dui').mask('00000000-0');
    $('.mask-celular').mask('0000-0000');
    $('.mask-nit').mask('0000-000000-000-0');

</script>

    

</html>



