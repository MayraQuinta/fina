<!DOCTYPE html>

<script language="javascript">
    $(document).ready(function () {

        $('form').keypress(function (e) {
            if (e == 13) {
                return false;
            }
        });
        $('input').keypress(function (e) {
            if (e.which == 13) {
                return false;
            }
        });
    });
</script>



<html lang="en">


   <?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../app/Conexion.php';
?>

<?php
// AGRAGAR CONTRSENA SI TIENEN CONTRA EL XAMPP
$con =new mysqli('localhost','root','','instituciones_financieras');
$datos=$con->query("SELECT
activo.fecha_adquisicion AS fecha,
activo.id_activo AS id,
usuario.nombre AS nombreUser,
departamento.nombre AS dep,
institucion.nombre AS nombreInst,
tipo_activo.id_clasificacion,
tipo_activo.nombre AS tipo,
encargado.nombre AS encargado,
activo.precio AS precio,
clasificacion.id_clasificacion AS clasi,
clasificacion.nombre AS ncla,
activo.correlativo
FROM
activo
INNER JOIN usuario ON activo.id_usuario = usuario.id_usuario
INNER JOIN departamento ON activo.id_departamento = departamento.id_departamento
INNER JOIN institucion ON activo.id_institucion = institucion.id_institucion
INNER JOIN tipo_activo ON activo.id_tipo = tipo_activo.id_tipo
INNER JOIN encargado ON activo.encargado_id_encargado = encargado.id_encargado
INNER JOIN clasificacion ON tipo_activo.id_clasificacion = clasificacion.id_clasificacion
WHERE tipo_activo.id_tipo=activo.id_tipo and activo.id_departamento=departamento.id_departamento
and institucion.id_institucion=activo.id_institucion and encargado.id_encargado=activo.encargado_id_encargado
 GROUP BY activo.id_activo  
");
?>
   
<div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div  href="../asset/img/finsi.png" class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Activo  Fijo</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                                       
                   
     
 <section class="content">
    <div class="container-fluid">


        <div class="panel" name="libros">

           
            <div class="panel-body">  
                      

       
      <div class="container-fluid mimin-wrapper" id="contenido">
  
     <div class="header">
                                <h2 class="text-center">Lista de activos</h2>
                            </div>

          <!-- start: Content -->
          <section class="content" >
             
            <div class="col-md-12 top-10 padding-0">
              <div class="col-md-12">
                <div  id="expedientes" class="panel">
                  <div class="panel-body">
                  <div class="col-md-12 padding-0" style="padding-bottom:20px;">
                    
                
                 </div>
                  <div class="responsive-table">
                      
                    <table class="table table-striped table-bordered" id="tabla_cliente_cpersonal">
                    <caption></caption>

                    <thead>
                      <tr>
                        <th>Correlativos</th>
                        <th>Clasificación</th>
                        <th>Institución</th>
                        <th>Encargado</th>
                        <th>Precio($)</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody class="buscar">

                    <?php while($fila=mysqli_fetch_array($datos)){?>
                     <tr>
                     <td><?php echo $fila['correlativo']; ?></td>
                     <td><?php echo $fila['ncla']; ?></td>
                     <td><?php echo $fila['nombreInst']; ?></td>
                     <td><?php echo $fila['encargado']; ?></td>
                     <td><?php echo $fila['precio'].' $' ; ?></td>
                     <td ><button class="btn btn-info" onclick="llamarPagina('<?php echo $fila['id']; ?>')"> 
                      <i class="fa fa-eye  "></i>Depreciación</button></td>
                     </tr>
                            <?php
            }
              ?>
              
                      
                    </tbody>
                  </table>
                  </div>
                 
                 
                </div>
              </div>
            </div>  
          </section>
        
        <script type="text/javascript" >
function llamarPagina(id){
    $("#contenido").load('verDepreciacion.php?clienteinfo='+id);
//  window.open("../activo_fijo/ver_depreciacion.php?datos="+id, '_parent');
  }
    
</script>
          <!-- end: content -->
           </div>



<script type="text/javascript">
$(document).ready(function(){
     $('input').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
      });
});
</script>
<!--  -->
</body>
</html>
