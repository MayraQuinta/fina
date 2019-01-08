<!DOCTYPE html>
<html lang="en">

<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../app/Conexion.php';
?>

<?php
$clienteInfo = $_REQUEST['clienteinfo'];

$con = new mysqli('localhost', 'root', '', 'instituciones_financieras');
$datos = $con->query("SELECT
activo.fecha_adquisicion AS fecha,
activo.id_activo AS id,
usuario.nombre AS nombreUser,
departamento.nombre AS dep,
institucion.nombre AS nombreInst,
tipo_activo.id_clasificacion,
tipo_activo.nombre AS tipo,
encargado.nombre AS encargado,
activo.precio AS precio,
clasificacion.id_clasificacion as clasi,
clasificacion.nombre as ncla
FROM
activo
INNER JOIN usuario ON activo.id_usuario = usuario.id_usuario
INNER JOIN departamento ON activo.id_departamento = departamento.id_departamento
INNER JOIN institucion ON activo.id_institucion = institucion.id_institucion
INNER JOIN tipo_activo ON activo.id_tipo = tipo_activo.id_tipo
INNER JOIN encargado ON activo.encargado_id_encargado = encargado.id_encargado
INNER JOIN clasificacion ON tipo_activo.id_clasificacion = clasificacion.id_clasificacion
WHERE
activo.id_activo = '$clienteInfo'
");
?>


<div class="row" >
    <!--<form id="imprimir_depre" method="post" action="../reportesActivo/imp_depre.php" target="_blank">-->
    <div class="col-md-10">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      <h4>Depreciación</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">

        <?php while ($fila = mysqli_fetch_array($datos)) { ?>
            <div>
                
                <table id="no_imp" class="table table-striped table-bordered">
                    <tbody>

                        <tr class="text-accent-1">
                        <td colspan="4"  style="height:10px;" >
                       <label for="textarea1" style="font-size:15px">Código</label>
                        <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" id="ver_cod_depre" name="ver_cod_depre" value="<?php echo $fila['id']; ?>"  minlength="8"  readonly="" >
                             
                            </div>
                            </td>

                            <td colspan="4"  style="height:10px;" >
                       <label for="textarea1" style="font-size:15px">Clasificación</label>
                        <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" id="ver_cod_depre" name="ver_cod_depre" value="<?php echo $fila['ncla']; ?>"  minlength="8"  readonly=""  >
                             
                            </div>
                            </td>


                              <td colspan="4"  style="height:10px;" >
                     <label for="precioUnitario" style="font-size:16px"></i>($) Valor Activo</label><br>
                        <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" name="ver_valor" value="<?php echo $fila['precio']; ?>" min="0" step="any" id="ver_valor"  class="text-center validate" readonly=""  >
                             
                            </div>
                            </td>

                            <td colspan="4"  style="height:10px;" >
                     <label for="textarea1" style="font-size:16px">Tipo<small></small> </label><br>
                        <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" name="ver_valor" value="<?php echo $fila['tipo']; ?>" min="0" step="any" id="ver_valor"  class="text-center validate" readonly="" >
                             
                            </div>
                            </td>




                        </tr>


                        <tr class="text-accent-1" >

                           <td colspan="4"  style="height:10px;" >
                                        <label for="fecha_pub"  class="active" style="font-size:16px">Fecha Adquisición</label><br>
                        <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" name="ver_fecha_depre" value="<?php echo $fila['fecha']; ?>"  id="ver_fecha_depre" readonly=""   >
                             
                            </div>
                            </td>



<td colspan="4"  style="height:10px;" >  <label for="precioUnitario" style="font-size:16px">Encargado<small></small> </label><br>
                        <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" name="ver_valor" value="<?php echo $fila['encargado']; ?>" min="0" step="any" id="ver_valor"  class="text-center validate" readonly=""  >
                             
                            </div>
                            </td> 


                             <td colspan="4"  style="height:10px;" >
                    <label for="textarea1" style="font-size:16px">Institucion<small></small> </label><br>
                        <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" name="ver_fecha_depre" value="<?php echo $fila['nombreInst']; ?>" id="ver_fecha_depre" readonly=""  >
                             
                            </div>
                            </td>



                      

                         <td colspan="4"  style="height:10px;" >
                    <label for="precioUnitario" style="font-size:16px">Departamento<small></small> </label><br>
                        <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" name="ver_valor" value="<?php echo $fila['dep']; ?>"min="0" step="any" id="ver_valor"  class="text-center validate" readonly="" >
                             
                            </div>
                            </td>
  </tr>
                    
                    </tbody>
                </table>
                
            </div>

<div class="responsive-table">
                      
            <table id="ver_depre_tab" class="table table-striped table-bordered">
            <label>Depreciación</label>
                
                <thead>
                <th class="text-center" >Año</th>
                <th class="text-center">Valor Activo</th>
                <th class="text-center">Depreciación</th>
                <th class="text-center">Valor Neto</th>
                </thead>
                <tbody>
                    <?php
                    if ($fila['clasi'] == "1")
                        $veces = 2;
                    if ($fila['clasi'] == "2")
                        $veces = 4;
                    if ($fila['clasi'] == "3")
                        $veces = 5;
                    if ($fila['clasi'] == "4")
                        $veces = 20;
                    if ($fila['clasi'] == "5")
                        $veces = 0;
                    $ano = explode('-', $fila['fecha']);
                    $ano = $ano[0];
                    $valor = $fila['precio'];
                    $depre = $valor / $veces;
                    $vn = $valor - $depre;

                    for ($i = 0; $i < $veces; $i++) {
                        ?>
                        <tr>
                            <td class="text-center" > <?php echo ($ano + $i); ?></td>
                            <td class="text-center" > <?php echo $valor; ?> </td>
                            <td class="text-center" > <?php echo $depre; ?></td>
                            <td class="text-center" > <?php echo $vn; ?> </td>
                        </tr> 
                        <?php
                        $vn = $vn - $depre;
                    }
                    ?>
                </tbody>
            </table>
            </div>

    </div>
    <a href="listaactivos.php">

        <a href="listaactivos.php">
            <button class="btn btn-info" type="button" > 
                <i class="fa fa-eye"></i>Volver
            </button>
        </a>
        <?php
    }
    ?>
<!--</form>-->
</div>