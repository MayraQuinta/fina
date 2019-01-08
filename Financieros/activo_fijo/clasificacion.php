<!DOCTYPE html>
<html lang="en">

<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../app/Conexion.php';

if (isset($_REQUEST['nameEnviar'])) {
    
    include_once '../modelos/persona_juridica.php';
    include_once '../modelos/balance_general.php';
    include_once '../modelos/estado_resultado.php';

    include_once '../repositorios/repositorio_juridico.php';
    include_once '../repositorios/repositorio_balance.php';
    include_once '../repositorios/repositorio_estado_resultado.php';
    
    Conexion::abrir_conexion();
    
    //////esto es para guardarçç persona juridica
    $juridica = new persona_juridica();
    $juridica->setId_nombre($_REQUEST['nameNombre']);
    $juridica->setNumero($_REQUEST['nameNumero']);
    $juridica->setDui($_REQUEST['nameDuiJuridico']);
    $juridica->setNit($_REQUEST['nameNitJuridico']);
    
    if (repositorio_juridico::insertar_persona_juridica(Conexion::obtener_conexion(), $juridica)) {
        $numero = repositorio_juridico::ultima_persona_insertada(Conexion::obtener_conexion());
        
        foreach ($numero as $lista){
            $id_juridico = $lista->getId_persona_juridica();
    }
    ///////////esto es para guardar rel balance general            
        $balance = new balance_general();
        $balance->setId_persona($id_juridico);
        $balance->setPeriodo('2017');
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
        $estado->setPeriodo('2017');
        $estado->setIngreso_venta($_REQUEST['nameIngresoVenta']);
        $estado->setCosto_venta($_REQUEST['nameCostoVenta']);
        $estado->setGasto_venta($_REQUEST['nameGastoVenta']);
        $estado->setGasto_administrativo($_REQUEST['nameGastoAdmi']);
        $estado->setGasto_arrendamiento($_REQUEST['nameGastoArrendamiento']);
        $estado->setGasto_depreciacion($_REQUEST['nameGastoDepreciacion']);
        $estado->setGasto_interes($_REQUEST['nameGastoInteres']);
                
        repositorio_estado_resultado::insertar_estado_resultado(Conexion::obtener_conexion(), $estado);
         
        echo '<script>
    location.href="./registro_juridico.php";

</script>';
    }
    
} else {

    ?>

   <!-- start: content -->
            <div id="content" align="center">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">R</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                                       
                   
     
 <section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Clasificación</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">  
                        <form id="example1" action="#">
                            <h1>Cliente</h1>
                            <fieldset>
                                <legend>Seleccione cliente</legend>
                         <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control success">
                                                <option value="">SELECCIONE EL CLIENTE</option>
                                                <option value="10">JUAN PEREZ</option>
                                                <option value="20">CRISTIANO RONALDO</option>
                                                <option value="30">LEONEL MESSI</option>
                                                <option value="40">JOSE MARIA VILLAR</option>
                                                <option value="50">FLORENTINO PEREZ</option>
                                            </select>
                                        </div>
                                    </div>
                            </fieldset>
                         
                            <h1>Fiador</h1>
                            <fieldset>
                  
                                 <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_firstname" name="validate_firstname" >
                              <span class="bar"></span>
                              <label>Nombre</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_lastname" name="validate_lastname" >
                              <span class="bar"></span>
                              <label>Dirección </label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text mask-dui" id="validate_username" name="validate_username" >
                              <span class="bar"></span>
                              <label>DUI</label>
                            </div>

                              <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text mask-phone" >
                        <span class="bar"></span>
                        <label>Teléfono</label>
                      </div>

                            
                          </div>

                            <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="password" class="form-text" id="validate_password" name="validate_password" >
                              <span class="bar"></span>
                              <label>Apellido</label>
                            </div>


      
                              <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text mask-dui" id="validate_username" name="validate_username" >
                              <span class="bar"></span>
                              <label>Lugar de trabajo</label>
                            </div> 

                            
                        
                         <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text mask-dui" id="validate_username" name="validate_username" >
                              <span class="bar"></span>
                              <label>NIT</label>
                            </div>
                              

                              <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text mask-dui" id="validate_username" name="validate_username" >
                              <span class="bar"></span>
                              <label>Email</label>
                            </div>          
                       
                          </div>  
        
                            </fieldset>
                         
                            <h1>Referencia</h1>
                           <fieldset>
                                  
                                 <div class="col-md-5">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_firstname" name="validate_firstname" >
                              <span class="bar"></span>
                              <label>Nombre</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_lastname" name="validate_lastname" >
                              <span class="bar"></span>
                              <label>Dirección </label>
                            </div>

                            

                              
                          </div>

                            <div class="col-md-5">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="password" class="form-text" id="validate_password" name="validate_password" >
                              <span class="bar"></span>
                              <label>Apellido</label>
                            </div>


      
                           
                        
                         <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text mask-phone" id="validate_username" name="validate_username" >
                              <span class="bar"></span>
                              <label>Telefono</label>
                            </div>
                                      
                       
                          </div>  
        
                            </fieldset>
                            <h1>Hipoteca</h1>
                            <fieldset>
                         
                                <div class="col-md-5">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_firstname" name="validate_firstname" >
                              <span class="bar"></span>
                              <label>Numero de registro</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_lastname" name="validate_lastname" >
                              <span class="bar"></span>
                              <label>Ubicacion </label>
                            </div>

                             
                          </div>

                           <div class="col-md-5">

                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_lastname" name="validate_lastname" >
                              <span class="bar"></span>
                              <label>Ubicacion</label>
                            </div>

                           <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_lastname" name="validate_lastname" >
                              <span class="bar"></span>
                              <label>Dato extra</label>
                            </div>
                           </div>

                            </fieldset>

                            <h1>Credito</h1>
                            <fieldset>
                             
                          <div class="col-md-5">
                           
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_lastname" name="validate_lastname" >
                              <span class="bar"></span>
                              <label>Dirección </label>
                            </div>

                            

                              <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text mask-phone" >
                        <span class="bar"></span>
                        <label>Teléfono</label>
                      </div>

                            
                          </div>

                            <div class="col-md-7">
                           
      
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text mask-money" >
                        <span class="bar"></span>
                        <label>Monto($)</label>
                      </div>
                        
                         <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick">
                                                <option value="">Seleccione numero de meses</option>
                                                <option value="10">6  Meses</option>
                                                <option value="20">12 Meses</option>
                                                <option value="30">18 Meses</option>
                                                <option value="40">24 Meses</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

                       
                          </div>  
        
                            </fieldset>
                        </form>


                    </div>
                </div>
            </div>
          </div>
        <!-- end: content -->

      </div>


      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->


<script type="text/javascript">
  $(document).ready(function(){
var form = $("#example1").show();
     
    form.steps({
        headerTag: "h1",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex)
            {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18)
            {
                return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex)
            {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex)
        {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
            {
                form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3)
            {
                form.steps("previous");
            }
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert("Submitted!");
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password-2"
            }
        }
    });




  });
$('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
</script>


<!-- end: Javascript -->
</body>
</html>