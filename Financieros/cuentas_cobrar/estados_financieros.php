<?php
//iiggg
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../app/Conexion.php';
?>

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
<?php

if (isset($_REQUEST['nameEnviar'])) {

    include_once '../modelos/persona_juridica.php';
    include_once '../modelos/balance_general.php';
    include_once '../modelos/estado_resultado.php';

    include_once '../repositorios/repositorio_juridico.php';
    include_once '../repositorios/repositorio_balance.php';
    include_once '../repositorios/repositorio_estado_resultado.php';

    include_once '../app/Conexion.php';
    Conexion::abrir_conexion();
    
    $id_juridico = $_REQUEST['codCliente_cpersonal'];
    $periodo = $_REQUEST['NamePeriodo'];

    ///////////esto es para guardar rel balance general            
    $balance = new balance_general();
    $balance->setId_persona($id_juridico);
    $balance->setPeriodo($periodo);
    $balance->setEfectivo($_REQUEST['nameEfectivo']);
    $balance->setValor_negociable($_REQUEST['nameNegociable']);
    $balance->setCuenta_por_cobrar($_REQUEST['NameCuentaXcobrar']);
    $balance->setInventarios($_REQUEST['NameInventario']);
    $balance->setTerrenos($_REQUEST['NameTerreno']);
    $balance->setEdificio_equipo($_REQUEST['NameEdificio']);
    $balance->setDepreciacion($_REQUEST['NameDepreciacion']);
    $balance->setCuenta_por_pagar($_REQUEST['NameCuentaXpagar']);
    $balance->setDocumento_por_pagar($_REQUEST['NameDocumentoXpagar']);
    $balance->setDeuda_largop($_REQUEST['NameDeuda']);
    $balance->setAccioneC($_REQUEST['NameAcciones']);
    $balance->setGanancias_retenidas($_REQUEST['NameRetenidas']);

    repositorio_balance::insertar_balance_general(Conexion::obtener_conexion(), $balance);

    ///////////////////////esto es para el registro de estado de resultado 
    $estado = new estado_resultado();
    $estado->setId_persona_juridica($id_juridico);
    $estado->setPeriodo($periodo);
    $estado->setIngreso_venta($_REQUEST['nameIngresoVenta']);
    $estado->setCosto_venta($_REQUEST['nameCostoVenta']);
    $estado->setGasto_venta($_REQUEST['nameGastoVenta']);
    $estado->setGasto_administrativo($_REQUEST['nameGastoAdmi']);
    $estado->setGasto_arrendamiento($_REQUEST['nameGastoArrendamiento']);
    $estado->setGasto_depreciacion($_REQUEST['nameGastoDepreciacion']);
    $estado->setGasto_interes($_REQUEST['nameGastoInteres']);

    repositorio_estado_resultado::insertar_estado_resultado(Conexion::obtener_conexion(), $estado);

    echo '<script>
          location.href="estados_financieros.php";
         </script>';
} else {
    ?>
<div id="content" align="center">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Cuentas por cobrar</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                                       
                   
     
 <section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Estados financieros</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
<form action="estados_financieros.php" method="get" name="credito_personal" id="credito_personal" autocomplete="off">
        <input type="hidden" id="pas_cp" name="pas_cp"/>
        <input type="radio" id="uno" checked="" style="visibility: hidden"/>
        <section class="content">
            <!--    INICIO DE DATOS-->
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                         <div class="form-line">
                                            <div class="col-md-5">
                                                <div class="input-field"><i class="fa fa-search prefix" aria-hidden="true">

                                                    </i><label >Buscar Empresa</label>
                                                    <input type="text" id="buscar_cliente" class="form-control info"  autofocus onkeypress="return llenar_tabla_cliente(this)"  list="lista_personas_naturales2">
                                                </div>              
                                            </div>
                                        </div>
                                                    
                                             <div class="form-line">
                                            <div class="col-md-5">
                                                <div class="input-field"><i aria-hidden="true">

                                                    </i><label ><span class="fa fa-hourglass-2">    Periodo</span></label>
                                                    
                                                    <input type="number"  class="form-control info" name="NamePeriodo" autofocus min="2000" max="2018">
                                                </div>              
                                            </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <table class="table table-striped table-bordered" id="tabla_cliente_juridico">
                                    <caption>Cliente</caption>
                                    <thead>
                                    <th>Código </th>
                                    <th>Nombre de la empresa</th>
                                    <th>No. Empresa</th>
                                    <th>DUI(Encargado)</th>
                                    <th>NIT(Encargado)</th>

                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- Basic Validation -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <a data-toggle="collapse"  href="#collapse-balance">
                                    <h2 class="text-center">Balance general</h2>
                                </a>
                            </div>
                            <div id="collapse-balance" class="panel-collapse collapse">
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="number"   min="0" step="any" class="form-text" required="" name="nameEfectivo" >
                                        <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Efectivo</label>
                                        </div>
                                        </div>



                                        <div class="col-md-3">
                                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="number"  min="0" step="any"  class="form-text"  name="nameNegociable" 
                                         required="">
                                        <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Valores negociables</label>
                                                
                                        </div>
                                        </div>
                                  

                                   
                                        <div class="col-md-3">
                                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="number"  min="0" step="any" class="form-text" name="NameCuentaXcobrar"  required="">
                                        <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Cuentas por cobrar</label>
                                               
                                         
                                        </div>
                                        </div>

                                        <div class="col-md-3">
                                         <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                         <input type="number"  min="0" step="any" class="form-text" name="NameInventario"  required="">
                                         <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>   Inventarios</label>
                                        </div>
                                        </div>
                                       
                                   
                                        <div class="col-md-3">
                                         <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                         <input type="number"  min="0" step="any" class="form-text" name="NameTerreno"  required="">
                                         <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Terrenos</label>
                                        </div>
                                        </div>
                                        
                                   
                                        <div class="col-md-3">
                                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="number"  min="0" step="any" class="form-text" name="NameEdificio"  required="">
                                        <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Edificio y equipo</label>
                                        </div>
                                         </div>

                                      
                                  
                                        <div class="col-md-3">
                                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="number"  min="0" step="any" class="form-text" name="NameDepreciacion"  required="">
                                        <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Depreciación acumulada</label>
                                        </div>
                                        </div>
                                     
                              
                                      
                                        <div class="col-md-3">
                                         <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                         <input type="number"  min="0" step="any" class="form-text" name="NameCuentaXpagar" required="">
                                         <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>   Cuentas por pagar</label>
                                         </div>
                                         </div>
                                        
                                    
                                        <div class="col-md-3">
                                         <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                         <input type="number"  min="0" step="any" class="form-text" name="NameDocumentoXpagar"  required="">
                                         <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Documentos por pagar</label>
                                        </div>
                                        </div>

                                   
                                        <div class="col-md-3">
                                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                         <input type="number"  min="0" step="any" class="form-text" name="NameDeuda"  required="">
                                         <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Deuda a largo plazo</label>
                                         </div>
                                         </div>
                                           
                                 
                                        <div class="col-md-3">
                                       <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="number"  min="0" step="any" class="form-text" name="NameAcciones"  required="">
                                        <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Acciones comunes</label>
                                         </div>
                                        </div>
                               
                                   
                                        <div class="col-md-3">
                                       <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="number"  min="0" step="any" class="form-text" name="NameRetenidas"  required="">
                                        <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Ganancias retenidas</label>
                                       </div>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--FIN DE BALANCE-->

            <!--INICIO DE ESTADO DE RESULTADO-->

            <div class="container-fluid">
                <!-- Basic Validation -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <a  data-toggle="collapse" data-parent="#accordion" href="#collapse-estado">
                                    <h2 class="text-center">Estado de resultados</h2>
                                </a>
                            </div>
                            <div id="collapse-estado" class="panel-collapse collapse">
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                         <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="number" min="0" step="any" class="form-text" name="nameIngresoVenta"  required="">
                                        <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Ingresos por venta</label>
                                        </div>
                                        </div>
                                     

                                        <div class="col-md-4">
                                         <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="number"  min="0" step="any" class="form-text" name="nameCostoVenta"  required="">
                                         <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Costos de los bienes vendidos</label>

                                         </div>
                                        </div>
                                  

                             
                                        <div class="col-md-4">
                                         
                                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    <input type="number"  min="0" step="any" class="form-text" name="nameGastoVenta"  required="">
                                                  <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Gasto de venta</label>
                                            </div>
                                            </div>
                                     

                                        <div class="col-md-4">
                                        
                                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                   
                                                    <input type="number"  min="0" step="any" class="form-text" name="nameGastoAdmi"  required="">
                                               <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Gastos generales y administración</label>
                                            </div>
                                            </div>
                                         
                                     
                                 
                                  
                                        <div class="col-md-4">
                                          
                                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                   
                                                    <input type="number"  min="0" step="any" class="form-text" name="nameGastoArrendamiento"  required="">
                                               <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Gastos de arrendamiento</label>
                                            </div>
                                            </div>
                                     
                                        <div class="col-md-3">
                                           
                                               <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                   
                                                    <input type="number"  min="0" step="any" class="form-text" name="nameGastoDepreciacion"  required="">
                                                <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Gastos por depreciación</label>
                                            </div>
                                            </div>
                                      
                               
                                 
                                        <div class="col-md-6">
                                      <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    
                                                    <input type="number"  min="0" step="any" class="form-text" name="nameGastoInteres"  required="">
                                               <span class="bar"></span>
                                        <label><span class="fa fa-dollar"></span>   Gastos por interes</label>
                                            </div>
                                        </div>


                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="text-center">
                                <button type="submit" name="nameEnviar" class="btn ripple-infinite btn-round btn-primary" value="ok">
                                     <div>
                                      <span>Guardar</span>
                                    </div>
                                </button>
                            </div>
                        </div>

                       
                    </div>
                </div>

            </div>


        </section>
    </form>


    <datalist id="lista_personas_naturales2">
    <?php
    include_once '../app/Conexion.php';
    include_once '../modelos/persona_juridica.php';
    include_once '../repositorios/repositorio_juridico.php';
    Conexion::abrir_conexion();
    $listado = repositorio_juridico::lista_persona_juridca(Conexion::obtener_conexion());




    foreach ($listado as $fila) {
        echo '<option value="' . $fila->getId_nombre() . '" label="' . $fila->getId_persona_juridica() . '" > ';
    }
    ?>
    </datalist>

    <script>
        function llenar_tabla_cliente(valor) {
            var depto = valor.value;
            var depto = $("#lista_personas_naturales2 option[value='" + $('#buscar_cliente').val() + "']").attr('label');//alert(depto);
            $("#lista_personas_naturales2").load(" #lista_personas_naturales");//para actuaizar la datalist cuando registra 
    //var numero=valor.id.substr(7)
    //alert(valor.id);
            if (depto != "") {//alert("paso "+depto);
                $.post("../cuenta_cobrar/llenar_tabla_juridica.php", {libro: depto}, function (mensaje) {
                    $('#lista_personas_naturales2').html(mensaje).fadeIn();

                });
            }
            return false;//para qeu no se envie el form
        }

        function agr_refe() {//para agreagar a la tabla
            var n = document.getElementById("ref_Nombre").value;
            var a = document.getElementById("ref_Apellido").value;
            var nombre_ref = document.getElementById("ref_Nombre").value + " " + document.getElementById("ref_Apellido").value;
            var tel_ref = document.getElementById("ref_Telefono").value;
            var dir_ref = document.getElementById("ref_Direccion").value;
            linea0 = "";
            linea0 = linea0.concat(
                    "<tr>",
                    '<td><input type="button" class="borrar_personatabla_ref_cpersonal btn-sm btn-danger" value="-"/>&nbsp;</td>',
                    '<td><input type="hidden"  name="nombre_ref[]" value="' + n + '"/> <input type="hidden"  name="ape_ref[]" value="' + a + '"/>' + nombre_ref + "</td>",
                    '<td><input type="hidden"  name="tel_ref[]" value="' + tel_ref + '"/> ' + tel_ref + "</td>",
                    '<td><input type="hidden"  name="dir_ref[]" value="' + dir_ref + '"/> ' + dir_ref + "</td>",
                    "</tr>"
                    );
            //alert("paso " + linea0);
            $("table#tabla_referencias tbody").append(linea0);
            document.getElementById("ref_Nombre").value = "";
            document.getElementById("ref_Apellido").value = "";
            document.getElementById("ref_Direccion").value = "";
            document.getElementById("ref_Telefono").value = "";

        }
    //eliminar de la tabla
        $(document).on('click', '.borrar_personatabla_cliente_cpersonal', function (event) {
            event.preventDefault();
            $(this).closest('tr').remove();
        });
        $(document).on('click', '.borrar_personatabla_ref_cpersonal', function (event) {
            event.preventDefault();
            $(this).closest('tr').remove();
        });

        function cuota_per() {
            var tasa_persona = document.getElementById("tasa_per").value / 100 / 12;
            var monto_persona = document.getElementById("monto_per").value;
            var meses_persona = document.getElementById("mese_per").value;
            var cuota_persona = 0;

            cuota_persona = monto_persona * ((Math.pow(1 + tasa_persona, meses_persona) * tasa_persona) / (Math.pow(1 + tasa_persona, meses_persona) - 1));
            cuota_persona = cuota_persona.toFixed(2);
            //alert("$"+cuota);
            // cuota = monto_persona * Math.pow( 1 + tasa_persona, meses_persona ) / meses_persona; pils-monto_persona-txt pils-tiempo-txt pils-tasa_persona-txt

            document.getElementById('pils-cuota-txt').innerHTML = "$" + cuota_persona;
            document.getElementById('pils-monto-txt').innerHTML = "$" + monto_persona;
            document.getElementById('pils-tiempo-txt').innerHTML = meses_persona + " meses";
            document.getElementById('pils-tasa-txt').innerHTML = document.getElementById("tasa_per").value + "%";
            // $( '#pils-cuota-txt' ).text( '$' + numberWithCommas( cuota ) );
            addfilas("plan_pago_personal", document.getElementById("tasa_per").value);
        }

        function validarTablas_cper() {
            var okk = true;
            if ($('#tabla_cliente_cpersonal >tbody >tr').length == 0) {
                okk = false;

                swal("Ooops", "Tabla de cliente vacia", "warning");
            } else {
                if ($('#tabla_referencias >tbody >tr').length == 0) {
                    okk = false;
                    swal("Ooops", "Tabla de Referencias vacia", "warning");

                }

            }
            return okk;
        }

        function interes_hp(valor) {
            valor = valor.value; //alert("aso "+valor);
            switch (valor) {
                case '12':
                    document.getElementById('tasa_per').value = 14;
                    break;
                case '24':
                    document.getElementById('tasa_per').value = 13;
                    break;
                case '36':
                    document.getElementById('tasa_per').value = 12;
                    break;
                case '48':
                    document.getElementById('tasa_per').value = 8;
                    break;
                case '60':
                    document.getElementById('tasa_per').value = 8;
                    break;
                case '72':
                    document.getElementById('tasa_per').value = 7;
                    break;
                case '84':
                    document.getElementById('tasa_per').value = 6;
                case '96':
                    document.getElementById('tasa_per').value = 5;
                    break;
            }

        }
    </script>
    <?php
}
include_once '../plantilla/pie.php';
?>
