<?php
include_once '../app/Conexion.php';
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../repositorios/repositorio_prestamo.php';
?>




<style>
    .rojo{
        color: red;
    }
    
</style>

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


Conexion::abrir_conexion();

if (isset($_REQUEST['nameEnviar'])) {
    include_once '../modelos/presamo.php';
    include_once '../modelos/expediente_natural.php';
    include_once '../repositorios/repositorio_prestamo.php';
    include_once '../repositorios/repositorio_expediente_natural.php';
    include_once '../repositorios/repositorio_prestamo.php';
    include_once '../app/Conexion.php';
    
    $prestamo = new presamo();
    $prestamo->setId_asesor('1');
    $prestamo->setPrestamo_original($_REQUEST['monto_per']);
    $prestamo->setTiempo($_REQUEST['mese_per']);
    $prestamo->setTasa($_REQUEST['tasa_per']);
    $devolucion = date("d-m-Y");
    $devolucion = date_format(date_create($devolucion), 'Y-m-d');
        $prestamo->setFecha($devolucion);
    $prestamo->setTipo_credito("PERSONAL");
    Conexion::abrir_conexion();
    
   
    
    if ( repositorio_prestamo::insertar_prestamo_finan(Conexion::obtener_conexion(), $prestamo,$_REQUEST['pas_cp'])) {
//         $id_prestamo = repositorio_prestamo::obtenerU_ultimo_prestamo(Conexion::obtener_conexion());
//         $id_persona = $_REQUEST['pas_cp'];
//         echo $id_prestamo;
//         echo $id_persona;
//         
//         $expediente = new expediente_juridico();
//         $expediente->setId_persona_juridica($id_persona);
//         $expediente->setId_prestamo($id_prestamo);
//         
//         if (repositorio_expediente_juridico::insertar_expediente_juridico(Conexion::obtener_conexion(), $expediente)) {
//             echo '<script>
//                    location.href="credito_juridico.php";
//                  </script';
//         }else{
//             
//         }
//         
//         
//         
    }
    
    
    
        
    
}else {
$datos = repositorio_prestamo::llenar_refinanciamiento_natural(Conexion::obtener_conexion(), $_REQUEST['id_natural']);
?>

<div id="content" >
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Refinanciamiento</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                                       
                   
     
 <section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Crédito  Natural (Refinanciado) </h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">  


                <form action="credito_refinanciado_natural.php" autocomplete="off" method="get" name="credito_personal" id="credito_personal" >
                    <input type="hidden" id="pas_cp" value="<?php echo $_REQUEST['id_prestamo'];?>" name="pas_cp"/>
    <input type="radio" id="uno" checked="" style="visibility: hidden"/>
    <section class="content">
        <!--    INICIO  DATOS-->
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                         
                            <table class="table table-striped table-bordered"  id="tabla_cliente_cpersonal">
                                <h4 >Cliente</h4>
                                <thead>
                                <th>Código</th>
                                <th>Nombre </th>
                                <th>Dui</th>
                                <th>Nit</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                               
                                </thead>
                                <tbody>
                                    <?php
                                    $datos = repositorio_prestamo::llenar_refinanciamiento_natural(Conexion::obtener_conexion(), $_REQUEST['id_natural']);
                                    foreach ($datos as $lista){?>
                                    <tr>
                                        <td><?php echo $lista['1'];?></td>
                                        <td><?php echo $lista['0'];?></td>
                                        <td><?php echo $lista['10'];?></td>
                                        <td><?php echo $lista['11'];?></td>
                                        <td><?php echo $lista['12'];?></td>
                                        <td><?php echo $lista['13'];?></td>
                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--    FIN DE DATOS-->

    

        <!--INICIO DATO DE CREDITO-->
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <h4 >Datos de crédito </h4>
                        <div id="collapse-credito" class="panel-collapse collapse in">
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                           
                                                <label><span class="fa fa-dollar"></span> Nuevo monto</label>
                                                <input type="number" required="" min="1500" max="40000" class="form-control text-center" id="monto_per" name="monto_per" placeholder="min: 1,500 max: 40,000">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label><span class="fa fa-hourglass-2"></span>   Plazo</label>
                                                <select class="form-control show-tick" required="" id="mese_per" name="mese_per" onchange="interes_hp(this)">
                                                    <option value="" disabled="" selected="">Numero de meses</option>
                                                    <?php
                                                    $n = 12;
                                                    for ($i = 0; $i <= 7; $i++) {//echo '<script language="javascript">alert("'.$n.'");</script>'; 
                                                        echo '<option value="' . $n . '">' . $n . ' meses</option>';
                                                        $n = $n + 12;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                      <div class="col-md-3">
                                            <div class="row">
                                                 <label><span class="fa fa-money"></span>  Taza de Interes</label>
                                                <div class="col-md-6">
                                                    <div class="form-line">
                                                       
                                                        <input type="number" required="" min="1" max="20" class="form-control text-center" readonly="" id="tasa_per" name="tasa_per" placeholder="TASA">
                                                    </div>

                                                </div>
                                                <div class="col-md-6"><label style="font-size: 18">%</label></div>   
                                            </div>
                                        </div>
                                    <div class="col-md-3">
                                        <div class="text-center">

                                            <button type="button" onclick="cuota_per()" class="btn btn-primary m-t-15 waves-effect">CALCULAR</button>
                                        </div></div>
                                </div>
                                <div class="text-center">

                                </div>
                                


                           
                        
                                <div class="row clearfix">


                                    <div class="row text-center">
                                        <div class="col-sm-3 resultado">
                                            <div class="big-bullet">
                                                <div class="bullet"></div>
                                                <div class="contenido rojo text-120">Cuota Mensual</div>
                                            </div>
                                            <p class="text-center rojo" id="pils-cuota-txt">$00.00</p>
                                        </div>
                                        <div class="col-sm-3 resultado">
                                            <div class="big-bullet">
                                                <div class="bullet"></div>
                                                <div class="contenido text-120 rojo">Monto de Préstamo</div>
                                            </div>
                                            <p class="text-center rojo" id="pils-monto-txt">$00.00</p>
                                        </div>
                                        <div class="col-sm-3 resultado">
                                            <div class="big-bullet">
                                                <div class="bullet"></div>
                                                <div class="contenido text-120 rojo">Plazo</div>
                                            </div>
                                            <p class="text-center rojo" id="pils-tiempo-txt">0 meses</p>
                                        </div>
                                        <div class="col-sm-3 resultado">
                                            <div class="big-bullet">
                                                <div class="bullet"></div>
                                                <div class="contenido text-120 rojo">Tasa</div>
                                            </div>
                                            <p class="text-center rojo" id="pils-tasa-txt">00.00%</p>
                                        </div>
                                    </div>
                                    <div class="text-center ">
                                        <table class="table table-striped table-bordered" id="plan_pago_personal">
                                            <caption>PLAN DE PAGO</caption>
                                            <tbody>
                                                <tr>
                                                    <td>N </td>
                                                    <td>Capital ($)</td>
                                                    <td>Interes ($)</td>
                                                    <td>Cuota ($)</td>
<!--                                                    <td>CARGOS</td>
                                                    <td>TORAL</td>-->
                                                    <td>Saldo ($)</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

<div class="col-md-12 panel-footer" align="center">
                             <button type="submit" name="nameEnviar" class="btn ripple-infinite btn-round btn-primary" value="ok">
          
                                    <div>
                                      <span>Guardar</span>
                                    </div>
                        </button>  
                            <button type="reser" class="btn ripple-infinite btn-round btn-warning" value="ok">
          
                                    <div>
                                      <span>Cancelar</span>
                                    </div>
                        </button>    

                          </div>  
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--FIN DE DATO DE CREDITO-->

    </section>
</form>


<datalist id="lista_personas_naturales2">
    <?php
    include_once '../app/Conexion.php';
    include_once '../modelos/persona_natural.php';
    include_once '../repositorios/repositorio_natural.php';
    Conexion::abrir_conexion();
    $listado = repositorio_natural::lista_personas_naturales2(Conexion::obtener_conexion());
    
    


    foreach ($listado as $fila) {
        echo '<option value="' . $fila->getId_nombre()  . '" label="' . $fila->getId_persona_natural() . '" > ';
              
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
        addfilas("plan_pago_personal",document.getElementById("tasa_per").value);
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
