<!DOCTYPE html>

<html lang="en">


   <?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../app/Conexion.php';
?>
   <!-- start: content -->
            <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Registro de Activos</h3>
                        <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Batavia,Indonesia</p>

                      
                    </div>
                  
                    </div>
                  </div>                    
                </div>   
     
 <body id="mimin" class="dashboard">

<div class="col-md-9" align="center">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      <h4>Registro de Activo Fijo</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">

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
                                                   <span class="input-group-addon" id="basic-addon1">Seleccione Tipo de  activo</span>
                                                    <select class="form-control success" name="select_tipo" placeholder="Cantidad" required="">
                                                        <option  value="" disabled="">Seleccione Tipo de  activo</option>
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
                                                   <span class="input-group-addon" id="basic-addon1">Seleccione Departamento</span>
                                                    <select class="form-control success" name="select_departamento"  required="">
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
                                                <input type="number" min="0" step="any" class="form-control success" name="cantidad" placeholder="Unidades" required="">

                                            </div>
                                            </div> 

                                             

                                              <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text"  name="descripcion" required="" aria-required="true">
                              <span class="bar"></span>
                              <label>Descripción</label>
                            </div>   

                            <div class="form-group form-animate-text">
                          <input type="text"  name="fecha" class="form-text mask-selectonfocus " required>
                          <span class="bar"></span>
                          <label><span class="fa fa-calendar"></span> Fecha de adquisición</label>

              
                        </div>
                                    
                                 
 

   </div> 

 <div class="col-md-5">

  <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                   <span class="input-group-addon" id="basic-addon1">Seleccione la institución</span>
                                                    <select class="form-control success" name="select_institucion" required="">
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
                                                   <span class="input-group-addon" id="basic-addon1">Seleccione Encargado</span>
                                                    <select class="form-control success" name="select_encargado" required="">
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
                                                <input type="number" min="0" step="any" class="form-control success" name="meses"  required="">

                                            </div>
                                            </div>
 

                                         <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text"  name="obsevaciones" required="" aria-required="true">
                              <span class="bar"></span>
                              <label>Observación </label>
                            </div>





                                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" name="precio" class="form-text mask-money" required="">
                        <span class="bar"></span>
                        <label>Precio ($)</label>
                      </div>

                         
 </div>


             <div class="col-md-12 panel-footer">
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

<script type="text/javascript">
  $(document).ready(function(){

    $("#signupForm").validate({
      errorElement: "em",
      errorPlacement: function(error, element) {
        $(element.parent("div").addClass("form-animate-error"));
        error.appendTo(element.parent("div"));
      },
      success: function(label) {
        $(label.parent("div").removeClass("form-animate-error"));
      },
      rules: {
        validate_firstname: "required",
        validate_lastname: "required",
        validate_username: {
          required: true,
          minlength: 2
        },
        validate_password: {
          required: true,
          minlength: 5
        },
        validate_confirm_password: {
          required: true,
          minlength: 5,
          equalTo: "#validate_password"
        },
        validate_email: {
          required: true,
          email: true
        },
        validate_agree: "required"
      },
      messages: {
        validate_firstname: "Please enter your firstname",
        validate_lastname: "Please enter your lastname",
        validate_username: {
          required: "Please enter a username",
          minlength: "Your username must consist of at least 2 characters"
        },
        validate_password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        validate_confirm_password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long",
          equalTo: "Please enter the same password as above"
        },
        validate_email: "Please enter a valid email address",
        validate_agree: "Please accept our policy"
      }
    });

    // propose username by combining first- and lastname
    $("#username").focus(function() {
      var firstname = $("#firstname").val();
      var lastname = $("#lastname").val();
      if (firstname && lastname && !this.value) {
        this.value = firstname + "." + lastname;
      }
    });


    $('.mask-date').mask('00/00/0000');
    $('.mask-time').mask('00:00:00');
    $('.mask-date_time').mask('00/00/0000 00:00:00');
    $('.mask-cep').mask('00000-000');
    $('.mask-phone').mask('0000-0000');
    $('.mask-phone_with_ddd').mask('(00) 0000-0000');
    $('.mask-phone_us').mask('(000) 000-0000');
    $('.mask-mixed').mask('AAA 000-S0S');
    $('.mask-cpf').mask('000.000.000-00', {reverse: true});
    $('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
    $('.mask-money2').mask("#.##0,00", {reverse: true});
    $('.mask-ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/, optional: true
        }
      }
    });
    $('.mask-ip_address').mask('099.099.099.099');
    $('.mask-percent').mask('##0,00%', {reverse: true});
    $('.mask-clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.mask-placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.mask-fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/, 
          fallback: '/'
        }, 
        placeholder: "__/__/____"
      }
    });
    $('.mask-selectonfocus').mask("00/00/0000", {selectOnFocus: true});

    var options =  {onKeyPress: function(cep, e, field, options){
      var masks = ['00000-000', '0-00-00-00'];
      mask = (cep.length>7) ? masks[1] : masks[0];
      $('.mask-crazy_cep').mask(mask, options);
    }};

    $('.mask-crazy_cep').mask('00000-000', options);


    var options2 =  { 
      onComplete: function(cep) {
        alert('CEP Completed!:' + cep);
      },
      onKeyPress: function(cep, event, currentField, options){
        console.log('An key was pressed!:', cep, ' event: ', event, 
          'currentField: ', currentField, ' options: ', options);
      },
      onChange: function(cep){
        console.log('cep changed! ', cep);
      },
      onInvalid: function(val, e, f, invalid, options){
        var error = invalid[0];
        console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
      }
    };

    $('.mask-cep_with_callback').mask('00000-000', options2);

    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
    };

    $('.mask-sp_celphones').mask(SPMaskBehavior, spOptions);



    var slider = document.getElementById('noui-slider');
    noUiSlider.create(slider, {
      start: [20, 80],
      connect: true,
      range: {
        'min': 0,
        'max': 100
      }
    });

    var slider = document.getElementById('noui-range');
    noUiSlider.create(slider, {
                        start: [ 20, 80 ], // Handle start position
                        step: 10, // Slider moves in increments of '10'
                        margin: 20, // Handles must be more than '20' apart
                        connect: true, // Display a colored bar between the handles
                        direction: 'rtl', // Put '0' at the bottom of the slider
                        orientation: 'vertical', // Orient the slider vertically
                        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
                        range: { // Slider can select '0' to '100'
                        'min': 0,
                        'max': 100
                      },
                        pips: { // Show a scale with the slider
                          mode: 'steps',
                          density: 2
                        }
                      });



    $(".select2-A").select2({
      placeholder: "Select a state",
      allowClear: true
    });

    $(".select2-B").select2({
      tags: true
    });

    $("#range1").ionRangeSlider({
      type: "double",
      grid: true,
      min: -1000,
      max: 1000,
      from: -500,
      to: 500
    });

    $('.dateAnimate').bootstrapMaterialDatePicker({ weekStart : 0, time: false,animation:true});
    $('.date').bootstrapMaterialDatePicker({ weekStart : 0, time: false});
    $('.time').bootstrapMaterialDatePicker({ date: false,format:'HH:mm',animation:true});
    $('.datetime').bootstrapMaterialDatePicker({ format : 'dddd DD MMMM YYYY - HH:mm',animation:true});
    $('.date-fr').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', lang : 'fr', weekStart : 1, cancelText : 'ANNULER'});
    $('.min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });


    $(".dial").knob({
      height:80
    });

    $('.dial1').trigger(
     'configure',
     {
       "min":10,
       "width":80,
       "max":80,
       "fgColor":"#FF6656",
       "skin":"tron"
     }
     );

    $('.dial2').trigger(
     'configure',
     {

       "width":80,
       "fgColor":"#FF6656",
       "skin":"tron",
       "cursor":true
     }
     );

    $('.dial3').trigger(
     'configure',
     {

       "width":80,
       "fgColor":"#27C24C",
     }
     );
  });
</script>
<!-- end: Javascript -->
   
  <!-- end: Javascript -->
  </body>
</html>



