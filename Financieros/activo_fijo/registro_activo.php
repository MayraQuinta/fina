
<!DOCTYPE html>
<html lang="en">
<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
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
    $sql = "INSERT INTO activo (id_tipo, id_departamento, id_institucion, id_usuario, encargado_id_encargado, correlativo, fecha_adquisicion, descripcion, estado, observaciones,precio, tiempo_uso) "
                                   . "VALUES ( '$tipo_activo', '$departamento', '$institucion', '1', '$encargado', '$correlativo', '$fecha', '$descripcion', 'ACTIVO', '$observaciones','$precio',$meses);";
    $sentencia = $conexion->prepare($sql);
    $resultado = $sentencia->execute();
 }
    echo '<script>location.href ="registro_tipo_activo.php";</script>';
} else {
    $lista_clasificacion = repositorio_clasificacion::lista_clasificacion(Conexion::obtener_conexion());
    $lista_institucion = correlativos::lista_institucion(Conexion::obtener_conexion());
    $lista_depatamento = correlativos::lista_departamento(Conexion::obtener_conexion());
    $lista_tipo = correlativos::lista_tipo(Conexion::obtener_conexion());
    $lista_encargado = correlativos::lista_encargado(Conexion::obtener_conexion());
    ?>


<form action="registro_activo.php" method="GET" autocomplete="off">
        <section class="content">
            <!--INICIO DE FIADOR-->
            <div class="container-fluid">
                <!-- Basic Validation -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-center">REGISTRO  ACTIVO</h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                    <span class="input-group-addon" id="basic-addon1">SELECCIONE LA INSTITUCION</span>
                                                    <select class="form-control show-tick" name="select_institucion" required="">
                                                 
                                                        <?php foreach ($lista_institucion as $lista) { ?>

                                                        <option value="<?php echo $lista->getId_departamento(); ?>">
                                                       
                                                            <?php echo $lista->getCorrelativo() ."--". $lista->getNombre() ; ?>
                                                        </option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                    <span class="input-group-addon" id="basic-addon1">SELECCIONE EL DEPARTAMENTO</span>
                                                    <select class="form-control show-tick" name="select_departamento" required="">
                                                        <?php foreach ($lista_depatamento as $lista) { ?>

                                                        <option value="<?php echo $lista->getId_departamento(); ?>"><?php echo $lista->getCorrelativo()."--". $lista->getNombre(); ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                    <span class="input-group-addon" id="basic-addon1">SELECCIONE EL TIPO DE ACTIVO</span>
                                                    <select class="form-control show-tick" name="select_tipo" required="">
                                                        <option  value="" disabled="">SELECCIONE EL TIPO DE ACTIVO</option>
                                                        <?php foreach ($lista_tipo as $lista2) { ?>

                                                        <option value="<?php echo $lista2->getId_tipo(); ?>"><?php echo $lista2->getId_correlativo(). "--". $lista2->getId_nombre(); ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <div class="form-line">
                                                    <span class="input-group-addon" id="basic-addon1">SELECCIONE EL ENCARGADO</span>
                                                    <select class="form-control show-tick" name="select_encargado" required="">
                                                        <option  value="" disabled="">SELECCIONE ENCARGADO</option>
                                                        <?php foreach ($lista_encargado as $lista3) { ?>

                                                        <option value="<?php echo $lista3->getId_encargado(); ?>"><?php echo $lista3->getNombre() ." ". $lista3->getApellido(); ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span class="input-group-addon" id="basic-addon1">FECHA ADQUISICION</span>
                                                <input type="date"  class="form-control text-center" required="" name="fecha" placeholder="FECHA ADQUISICION">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span class="input-group-addon" id="basic-addon1">TIEMPO DE USO (MESES)</span>
                                                <input type="number"  min="0" step="any"class="form-control text-center" name="meses" placeholder="TIEMPO DE USO (MESES)" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span class="input-group-addon" id="basic-addon1">OBSERVACIONES</span>
                                                <input type="text"  class="form-control text-center" required="" name="obsevaciones" placeholder="OBSERVACIONES">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span class="input-group-addon" id="basic-addon1">CANTIDAD</span>
                                                <input type="number"  min="0" step="any"class="form-control text-center" name="cantidad" placeholder="UNIDADES" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span class="input-group-addon" id="basic-addon1">DESCRIPCION</span>
                                                <input type=""  class="form-control text-center" required="" name="descripcion" placeholder="DESCRIPCION">
                                            </div>
                                        </div>
                                    </div>
                                       <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span class="input-group-addon" id="basic-addon1">Precio</span>
                                                <input type=""   class="form-text mask-money2" required="" name="precio" placeholder="Precio">
                                            </div>
                                        </div>
                                    </div>

<div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text mask-money" required="">
                        <span class="bar"></span>
                        <label>Money</label>
                      </div>
                                 
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="nameEnviar" class="btn btn-primary m-t-15 waves-effect" value="ok">GUARDAR</button>
                                </div>




     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- Essential javascripts for application to work-->
<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>


<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/jquery.knob.js"></script>
<script src="asset/js/plugins/ion.rangeSlider.min.js"></script>
<script src="asset/js/plugins/bootstrap-material-datetimepicker.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>
<script src="asset/js/plugins/jquery.mask.min.js"></script>
<script src="asset/js/plugins/select2.full.min.js"></script>
<script src="asset/js/plugins/nouislider.min.js"></script>
<script src="asset/js/plugins/jquery.validate.min.js"></script>


<!-- custom -->
<script src="asset/js/main.js"></script>
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
    <?php


}
include_once '../plantilla/pie.php';
?>
</html>