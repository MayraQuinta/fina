<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
?>
<script>
//funcion de agregar cero si en caso en necesario en la fecha
function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
}//fin funcion addZero
function selector_Cliente() {
    var cuota_persona = 0;
    //inicia a sacar fecha del sistema
    var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth()+1;
        var yyyy = hoy.getFullYear();
        dd = addZero(dd);
        mm = addZero(mm);
    var fecha= dd+'/'+mm+'/'+yyyy;
    //fin de sacar fecha
    //capturo el valr que trae el combo con la cadena
    value = document.getElementById("selector").value;
    //fin captura de cadena combo
    val  = value.split(',');//saparador de datos
    //inicia a separar datos en variables
    id = val[0];
    nombre = val[1];
    dui = val[2];
    nit = val[3];
    prestamo = val[4];
    saldo = val[5];
    tasa=val[6];
    tasa_persona = val[6]/100/12;
    meses_persona= val[7];
    proximo_pago =val[8];
    mora_acumulada = val[9];
    fecha_Prestamo = val[10];
    //rearmando fechas
    f = fecha_Prestamo.split('-');
    newFecha_Prestamo = f[2]+'/'+f[1]+'/'+f[0];
    f2 = proximo_pago.split('-');
    newFecha_proximo = f2[2]+'/'+f2[1]+'/'+f2[0];
    //fin de variable
    //saco el dato de la couta con la formula
    cuota_persona = prestamo * ((Math.pow(1 + tasa_persona, meses_persona) * tasa_persona) / (Math.pow(1 + tasa_persona, meses_persona) - 1));
    cuota_persona = cuota_persona.toFixed(2);
    //fin de formula
    //creo un objeto para insertar un codigo html
    var tabla = document.createElement("TR");
    //fin de objeto
    //cada vez que seleccione se borrara
    document.getElementById("cliente").innerHTML='';
    //fin de objeto
    //crear cadena para ser insertada
    var fila = "<tr><td>"+id
    +"</td><td>"+nombre
    +"</td><td>"+dui
    +"</td><td>"+nit
    +"</td><td>"+prestamo
    +"</td><td>"+saldo
    +"</td><td>"+cuota_persona
    +"</td></tr>";
    //fin cadena
    //agregar datos de cadena
    tabla.innerHTML=fila;
    document.getElementById("cliente").appendChild(tabla);
    //fin agregar
    //busco cada imput de otra tabla y los inserto
    document.abono_form.nprestamo_fat.value = 30;
    document.getElementById('nombre_fat').innerHTML = "<span class='input-group-addon'>Nombre Cliente <input type='text' name='nombre_fat' id='nombre_fat' style='text-align:center'  value='"+nombre+"' disabled>";
    document.abono_form.fecha_pres_fat.value = newFecha_Prestamo;
    document.abono_form.nit_fat.value = nit;
    document.abono_form.dui_fat.value = dui;
    document.abono_form.fecha_pago_fat.value = fecha;
    document.abono_form.fecha_fin_fat.value = newFecha_proximo;
    document.abono_form.monto_fat.value = prestamo;
    document.abono_form.cuota_fat.value = cuota_persona;
    document.abono_form.tasa_fat1.value = tasa;
    document.abono_form.saldo_act_fat.value = saldo;
    document.abono_form.mora_fat.value = mora_acumulada;
    //fin de insertar datos a inputs
}//fin funcion selector cliente
</script>
<script>
    function calcular_factura() {
        
        if (document.getElementById("abono").value > 0) {
            
            var pago = document.getElementById("abono").value;
            var pagoTotal = parseInt( document.getElementById("saldo_act").value);
            var fecha_pago = document.getElementById("fecha_pres_fat").value;
            var fecha_hoy = document.getElementById("fecha_pago_fat").value;
            
            var fecha_aux = fecha_hoy.split('/');
            
            var mes = (fecha_aux[1]);
            var ano = (fecha_aux[0]);
            var diasMes = 30 //getUltimoDiaDelMes(mes, ano);
            
            var interes = document.getElementById("tasa_fat1").value/100/12;
            
            
            //calcualo los dias que se paso o faltan para el pago
            var mora = 0;
            var aFecha2 = fecha_hoy.split('/');
            var aFecha1 = fecha_pago.split('/');
            var fFecha1 = Date.UTC(aFecha1[0], aFecha1[1], aFecha1[2]);
            var fFecha2 = Date.UTC(aFecha2[0], aFecha2[1], aFecha2[2] - 1);
            var dif = fFecha2 - fFecha1;
            var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
            
            if (dias == 0) {
                var int_calculado = (interes * document.getElementById("saldo_act").value * diasMes) / 360;
               
            } else {
                if (dias < 0) {
                    var int_calculado = (interes * document.getElementById("saldo_act").value * (diasMes + dias)) / 360;
                   
                } else {
                    if (dias > 0) {
                        
                        var int_calculado = (interes * document.getElementById("saldo_act").value * diasMes) / 360;
                       
                        var mora = (((interes) * (document.getElementById("cuota_hoy").value - int_calculado)) / 360) * (dias);
                    }
                }
            }
            
            var deudaTotal=(parseFloat(int_calculado) + parseFloat(pagoTotal));
            
            
            if ((deudaTotal) < pago) {
                swal({
                    title: "¿Desea Continuar?",
                    text: "La cantidad ingresada es mayor al saldo actual mas los intereses, se finalizara el prestamo " ,
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Si, continuar!",
                    closeOnConfirm: false
                },
                        function () {
                            ok = true;
                            swal(
                                    'Registrado',
                                    'Datos Registrados con Exito',
                                    'success'
                                    );
                            document.getElementById("finalizar").value = "si";
                            document.getElementById("abono").value=(int_calculado + pagoTotal);
                            document.getElementById("mora_hoy").value = mora;
                            document.getElementById("int_hoy").value = int_calculado;
                           document.abono_form.submit();//lo envio aqui porque retorna la vaiable antes y despues ejecuta el swal
                           
                        });
                        //alert("paso1");
            }else{
            if (pago > int_calculado) {
                
                document.getElementById('cap_fat').innerHTML = "$ " + (pago - int_calculado - mora).toFixed(2);
                document.getElementById('int_fat').innerHTML = "$ " + int_calculado.toFixed(2);
                document.getElementById('mora_fat').innerHTML = "$ " + mora.toFixed(2);
                document.getElementById('total_fat').innerHTML = "$ " + pago;
                alert("paso");
                document.getElementById('saldo_act_fat').innerHTML = "SALDO ACTUAL: $ " + ((document.getElementById("saldo_act").value - (pago - int_calculado - mora)).toFixed(2));
                document.getElementById("saldo_act_hoy").value = ((document.getElementById("saldo_act").value - (pago - int_calculado - mora)).toFixed(2));
                document.getElementById("int_hoy").value = int_calculado;
                document.getElementById("mora_hoy").value = mora;
            } else {
                swal('Oops', 'Parece que el pago no alcanza a cubrir  el interes del mes', 'warning');
            }
        }
            
        } else {
            swal('Oops', 'Formato de abono no valido ', 'warning');
        }
    }
    </script>
<script language="javascript">
    $(document).ready(function () {
        $(document).ready(function ()
        {
            $('#abono').keypress(function (e) {
                if (e.which == 13) {
                    calcular_factura();
                    return false;
                }
            });
        });
    });
</script>
<div id="content" align="center">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Abono</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                                       
                   
     
 <section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Abono</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">


<section class="content">
    <!--    INICIO DE DATS-->

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-center">SELECCIONE EL CLIENTE</h2>
                    </div>
                    <div class="body">
                        <form name="abono_form" id="abono_form" method="post" action="" onsubmit="impFact()" >
                            <input type="hidden" id="paso_abono" name="paso_abono"/>
                            <input type="hidden" id="saldo_act" name="saldo_act" />
                            <input type="hidden" id="pj" name="pj" />
                            <input type="hidden" id="interes" />
                            <input type="hidden" id="finalizar" name="finalizar" value="no" />
                            <input type="hidden" id="fecha_pago" />
                            <input type="hidden" id="fecha_hoy" name="fecha_hoy" />
                            <input type="hidden" id="cuota_hoy" />
                            <input type="hidden" id="id_prestamo_abono" name="id_prestamo_abono" />
                            <input type="hidden" id="saldo_act_hoy" name="saldo_act_hoy" />
                            <input type="hidden" id="mora_hoy" name="mora_hoy" />
                            <input type="hidden" id="int_hoy" name="int_hoy" />

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-line">
                                        <div class="col-md-6">
                                            <div class="input-field"><i class="fa fa-search prefix" aria-hidden="true">

                                                </i><label for="" style="font-size:16px">Buscar Cliente</label>
                                                <select id="selector" name="selector" onchange="selector_Cliente()" class="form-control">
                                                
                                                   <?php
                                                    include_once '../app/Conexion.php';
                                                    include_once '../modelos/persona_juridica.php';
                                                    include_once '../repositorios/repositorio_expediente_natural.php';
                                                    include_once '../repositorios/repositorio_juridico.php';
                                                    Conexion::abrir_conexion();
                                                    
                                                    $listado1 = repositorio_juridico::lista_persona_abono_juridica(Conexion::obtener_conexion());
                                                   // $l=count($listado1);
                                                    echo '<option value="0" label="Seleccione un Cliente" >';
                                                    foreach ($listado1 as $filaJ) {
                                                        echo '<option value="' .$filaJ[0].','.$filaJ[1].','.$filaJ[2].','.$filaJ[3].','.$filaJ[4].','.$filaJ[5].','.$filaJ[6].','.$filaJ[7].','.$filaJ[8].','.$filaJ[9].','.$filaJ[10]. '" label="' . $filaJ[1] ."-J". '" > ';
                                                    }
                                                    
                                                    $listado = repositorio_expediente_natural::lista_persona_natural_abono(Conexion::obtener_conexion());
                                                    foreach ($listado as $fila) {
                                                        echo '<option  value="' . $fila[0] .','.$fila[1].','.$fila[3].','.$fila[4].','.$fila[5].','.$fila[6].','.$fila[7].','.$fila[8].','.$fila[9].','.$fila[10].','.$fila[11].'" label="' . $fila[1] ."-N".'" >';
                                                    }
                                                    
                                                    
                                                    
                                                    ?>
                                                </select>
                                                <!--<input type="text" id="buscar_cliente_abono"  name="buscar_cliente_abono" autofocus onkeypress="llenar_tabla_cliente_abono(this)" list="lista_personas_cliente_abono" class="form-control">-->
                                            </div>              
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <table class="table table-striped table-bordered" id="tabla_cliente_abono">
                                <caption>CLIENTE</caption>
                                <thead>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th><div id="tipoID">Dui</div></th>
                                <th>Nit</th>
                                <th>Monto</th>
                                <th>Saldo Actual</th>  
                                <th>Cuota</th>  
                                </thead>
                                <tbody id="cliente">

                                </tbody>
                            </table>

                            <div class="select-dropdown">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="success">Abono</label>
                                            <input type="number" class="form-control text-center" required="" minlength="1"  id="abono" name="abono"  placeholder="$$$">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" onclick="calcular_factura()" class="btn btn-primary m-t-15 waves-effect">CALCULAR</button>
                                </div>
                            </div>
                            <div id= "insertar_tabla"></div>
                           <div class="container-fluid" id="factura_N" >
                            <table class="table table-striped table-bordered" s id="factura_natural">
                                <caption>FACTURA</caption>

                                <tbody>
                                    <tr>
                                        <th colspan=4><p class="text-center">BanDejando   CREDITO FACIL </p></th>
                                    </tr>
                                    <tr>
                                        <td><span class="input-group-addon">Nº Factura<input type="text" name="nprestamo_fat" id="nprestamo_fat" class="form-control" style="text-align:center" disabled></span> </td>
                                        <td id="nombre_fat"><span class="input-group-addon">Nombre Cliente</td>
                                        <td><span class="input-group-addon">Fecha Aplicacion:  <input type="text" name="fecha_pres_fat" id="fecha_pres_fat" style="text-align:center" disabled></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="input-group-addon">NIT<input type="text" name="nit_fat" id="nit_fat" class="form-control" style="text-align:center" disabled></span></td>
                                        <td><span class="input-group-addon">DUI <input type="text" name="dui_fat" id="dui_fat" class="form-control" style="text-align:center" disabled></span></td>
                                        <td><span class="input-group-addon">Fecha: <input type="text" name="fecha_pago_fat" id="fecha_pago_fat" style="text-align:center" disabled></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="input-group-addon">Fecha Vencimiento <input type="text" name="fecha_fin_fat" id="fecha_fin_fat" style="text-align:center" disabled></span></td>
                                        <td></td>
                                        <td></td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span class="input-group-addon">Monto: $ <input type="text" name="monto_fat" id="monto_fat" style="text-align:center" disabled></span></td>
                                        <td><span class="input-group-addon">Valor Cuota: $ <input type="text" name="cuota_fat" id="cuota_fat" style="text-align:center" disabled></span></td>
                                        <td colspan="2"> </td>
                                    <tr>
                                        <td><span class="input-group-addon">Tasa Nominal: <input type="text" name="tasa_fat1" id="tasa_fat1" style="text-align:center" disabled>%</span></td>
                                        <td colspan="3"> </td>
                                    </tr>
                                    <tr>
                                        <td><span class="input-group-addon">Saldo Anterior: $ <input type="text" name="saldo_ant_fat" id="saldo_ant_fat" style="text-align:center" disabled></span></td>
                                        <td><span class="input-group-addon">Saldo Actual: $ <input type="text" name="saldo_act_fat" id="saldo_act_fat" style="text-align:center" disabled></span></td>
                                        <td colspan="2"> </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td><span class="input-group-addon">CAPITAL:</span></td>
                                        <td></td>
                                        <td id="cap_fat">$ </td>
                                    </tr>
                                    <tr>
                                        <td><span class="input-group-addon">INTERES:</span></td>
                                        <td></td>
                                        <td id="int_fat">$</td>
                                    </tr>
                                    <tr>
                                        <td><span class="input-group-addon">MORA:</span></td>
                                        <td></td>
                                        <td id="mora_fat"> $ </td>
                                    <tr>

                                        <td colspan="2"></td>
                                        <td></td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td><span class="input-group-addon">Asesor: <input type="text" class="form-control" name="nom_caj_fat" style="text-align:center" disabled> </span></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <td><span class="input-group-addon">Cajero Nº <input type="text" name="id_cajero_fat" style="text-align:center" disabled></span></td>
                                <td><span class="input-group-addon">TOTAL:</span></td>
                                <td id="total_fat"> $ </td>
                                </tr>

                                </tbody>

                            </table>
                            </div>

                            <div class="text-center">
                                <button type="submit" form="abono_form" class="btn  btn-primary m-t-15 waves-effect" >GUARDAR</button>
                                <button type="reset" class="btn btn-primary m-t-15 waves-effect">CANCELAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    FIN DE DATOS-->



</section>


<datalist id="lista_personas_cliente_abono">
    <?php
    include_once '../app/Conexion.php';
    include_once '../modelos/persona_juridica.php';
    include_once '../repositorios/repositorio_expediente_natural.php';
    include_once '../repositorios/repositorio_juridico.php';
    Conexion::abrir_conexion();
    
    $listado1 = repositorio_juridico::lista_persona_juridca(Conexion::obtener_conexion());
    $l=count($listado1);
    for ($i=0 ; $i < $l ; $i++) {
        echo '<option value="' . $filaJ[0]->getId_nombre() . '" label="' . $filaJ[1]->getId_persona_juridica() . '-J" > ';
    }
    
    $listado = repositorio_expediente_natural::lista_clientes(Conexion::obtener_conexion());
    foreach ($listado as $fila) {
        echo '<option value="' . $fila[1] .' ' . $fila[2] . '" label="' . $fila[0] . '-N" > ';
    }
    
    
    
    ?>
</datalist>

<script>
    function impFact(){
        var ficha = document.getElementById("factura_N");
	  var ventimp = window.open(' ', 'popimpr');
	  ventimp.document.write( ficha.innerHTML );
	  ventimp.document.close();
	  ventimp.print( );
	  ventimp.close();
    }
    
    function llenar_tabla_cliente_abono(valor) {
        //var depto = valor.value;
        var depto = $("#lista_personas_cliente_abono option[value='" + $('#buscar_cliente_abono').val() + "']").attr('label');
        $("#lista_personas_cliente_abono").load(" #lista_personas_cliente_abono");//para actuaizar la datalist cuando registra 
//var numero=valor.id.substr(7)
        if (depto != "") {//alert("paso"+depto);
            $.post("../cuenta_cobrar/llenar_tabla_cliente_abono.php", {libro: depto}, function (mensaje) {
                $('#lista_personas_cliente_abono').html(mensaje).fadeIn();
            });
        }
        return false;//para qeu no se envie el form
    }
    //eliminar de la tabla  saldo_act
    </script>



    <script>
    function getUltimoDiaDelMes(mes, ano)
    {
        alert(mes + " " + ano);
        /*
         Los meses 1,3,5,7,8,10,12 siempre tienen 31 días
         Los meses 4,6,9,11 siempre tienen 30 días
         El único problema es el mes de febrero dependiendo del año puede tener 28 o 29 días
         */
        if ((mes == 1) || (mes == 3) || (mes == 5) || (mes == 7) || (mes == 8) || (mes == 10) || (mes == 12)) {
            return 31;
        } else {
            if ((mes == 4) || (mes == 6) || (mes == 9) || (mes == 11)) {
                return 30;
            } else if (mes == 2)
            {
                if ((ano % 4 == 0) && (ano % 100 != 0) || (ano % 400 == 0))
                    return 29;
                else
                    return 28;
            }
        }
    }
</script>
<?php
include_once '../plantilla/pie.php';
if (isset($_REQUEST["paso_abono"])) {
    include_once '../app/Conexion.php';
    include_once '../modelos/pago.php';
    include_once '../modelos/presamo.php';
    include_once '../modelos/expediente_natural.php';
    include_once '../repositorios/repositorio_pago.php';
    include_once '../repositorios/repositorio_referencias.php';
    include_once '../repositorios/repositorio_prestamo.php';
    include_once '../repositorios/repositorio_expediente_natural.php';
    Conexion::abrir_conexion();
//echo '<script language="javascript">alert("juas");</script>'; 
    $fin=$_REQUEST["finalizar"];
    $pago = new pago();
    $pago->setFecha($_REQUEST["fecha_hoy"]);
    $pago->setId_prestamo($_REQUEST["id_prestamo_abono"]);
    $pago->setInteres($_REQUEST["int_hoy"]);
    $pago->setMonto($_REQUEST["abono"]);
    $pago->setMora($_REQUEST["mora_hoy"]);
    $prestamo = new presamo();
    $prestamo->setSaldo_actual($_REQUEST["saldo_act_hoy"]);
    $prestamo->setEstado($fin);
    $prestamo->setId_asesor($_REQUEST["codCliente_abono"]);
    $prestamo->setId_plan($_REQUEST["pj"]);
    if (repositorio_pago::insertar_pago(Conexion::obtener_conexion(), $pago) && repositorio_prestamo::actualizar_prestamo(Conexion::obtener_conexion(), $prestamo, $_REQUEST["id_prestamo_abono"])) {
        echo "<script type='text/javascript'>";
        echo 'swal({
                    title: "Exito",
                    text: "Pago registrado",
                    type: "success"},
                    function(){                    
                    }
                    ); ';
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo 'swal({
                    title: "Ooops",
                    text: "Prestamo no Registrado",
                    type: "error"},
                    function(){
                    }
                    );';
        echo "</script>";
    }
}
?>