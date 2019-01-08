<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../modelos/pago.php';
include_once '../repositorios/repositorio_pago.php';
include_once '../modelos/expediente_juridico.php';
include_once '../repositorios/repositorio_expediente_juridico.php';
include_once '../repositorios/repositorio_juridico.php';
include_once '../app/Conexion.php';

Conexion::abrir_conexion();
$pagos = repositorio_expediente_juridico::lista_pagos_previos_natural(Conexion::obtener_conexion(), $_REQUEST['id_prestamo']);
//
?>    
<div id="content" align="center">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Pagos</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                                       
                   
     
 <section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Historial de Pago Natural</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">  

                <table class="table table-striped table-bordered" id="tabla_cliente_juridico">

                    <thead>
                    <th class="text-center">Pago</th>
                    <th class="text-center">Monto($)</th>
                    <th class="text-center">Interes($)</th>
                    <th class="text-center">Mora($)</th>
                    <th class="text-center">Fecha</th>

                    </thead>
                    <tbody>
                        <?php $numero = 0; foreach ($pagos as $lista) {  ?>
                        
                        
                            <tr>
                                <th class="text-center"><?php echo $numero= $numero+1; ?></th>
                                <th class="text-center"><?php echo '$'.$lista['0']; ?></th>
                                <th class="text-center"><?php echo '$'.$lista['3']; ?></th>
                                <th class="text-center"><?php echo '$'.$lista['2']; ?></th>
                                <th class="text-center"><?php echo $lista['1']; ?></th>
                                
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<?php

include_once '../plantilla/pie.php';
?>