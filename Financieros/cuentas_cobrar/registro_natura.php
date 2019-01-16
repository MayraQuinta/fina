<!DOCTYPE html>


<html lang="en">

<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
        function selector_Cliente() {
        value = document.getElementById("selector").value;
            swal("Mensaje Simple!");
        </script>
<div id="content" >
                <div class="panel-default">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Registro de Clientes</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                    
                   
     <br>
 <section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Persona natural</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">          
 

<form action="" name="form_persona_natural" method="post" onsubmit="return confirmar_envio_perNatural()">
    <input type="hidden" name="pas" id="pass"  >
    <section class="content">
        

                                        
                                            <div class="col-md-6">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">    
                                            <input type="text"  class="form-text" name="nombre_natural" id required="" aria-required="true">
                                             <span class="bar"></span>
                                            <label><span class="fa fa-user"></span > Nombres</label>
                                        </div>
                                    </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <input type="text" class="form-text" name="apellido_natural"  required="" aria-required="true">
                                            <span class="bar"></span>
                                            <label><span class="fa fa-user"></span> Apellidos</label>
                                        </div>
                                    </div>
                             
                            
                                    
                                        <div class="col-md-6">
                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                             <input type="text" class="form-text" name="dui_natural"  id="Dui_fia_per"  required="">
                                           <span class="bar"></span>
                                            <label><span class="fa fa-credit-card"></span>   DUI</label>
                                        </div>
                                    </div>
                                 
                                
                                        <div class="col-md-6">
                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            
                                            <input type="text" class="form-text" name="nit_natural" id="Nit_fia_per" required="">
                                             <span class="bar"></span>
                                            <label><span class="fa fa-credit-card"></span>   NIT</label>
                                        </div>
                                    </div>
                
                           
                            
                                    
                                        <div class="col-md-6">
                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <input type="text" class="form-text" name="telefono_natural" id="ref_Telefono" required="">
                                             <span class="bar"></span>
                                            <label><span class="fa fa-phone"></span>   Teléfono</label>
                                        </div>
                                    </div>
                                
                                
                                        <div class="col-md-6">
                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <input type="text" class="form-text" name="direccion_natural" required="">
                                             <span class="bar"></span>
                                            <label><span class="fa fa-book"></span>   Dirección</label>
                                        </div>
                                    </div>
                                
                        


<div class="col-md-12 panel-footer">
                            <div class="text-center">
                                <button type="submit" class="btn ripple-infinite btn-round btn-primary"><div>
                                      <span>Guardar</span>
                                    </div></button>
                                <button type="reset" class="btn ripple-infinite btn-round btn-warning">
                                    <div>
                                      <span>Cancelar</span>
                                    </div>
                                </button>
                            </div>
                        </div>

            <!-- #END# Vertical Layout -->


        </div>
        </div>
        </div>
        </div>
        <!-- #END# Inline Layout -->

         
    </section>
</form>
 </body>
 </html>
<script>
    function confirmar_envio_perNatural() {
        var ok = false;
        var datos = "";
        datos = datos.concat("Nombre: " + document.getElementsByName('nombre_natural')[0].value + "\n ",
                "Apellido: " + document.getElementsByName('apellido_natural')[0].value + "\n ",
                "Dui:    " + document.getElementsByName('dui_natural')[0].value + "\n ",
                "Nit:    " + document.getElementsByName('nit_natural')[0].value + " \n",
                "Telefono: " + document.getElementsByName('telefono_natural')[0].value + " \n",
                "Direccion: " + document.getElementsByName('direccion_natural')[0].value + "\n ");
        //alert(datos);
        if (true) {
            swal({
                title: "¿Desea Registrar los siguentes datos?",
                text: "" + datos,
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
                    document.form_persona_natural.submit();//lo envio aqui porque retorna la vaiable antes y despues ejecuta el swal

                    });
        }
        return ok;
    }


</script>
<?php
include_once '../plantilla/pie.php';
if (isset($_REQUEST["pas"])) {

    include_once '../app/Conexion.php';
    include_once '../modelos/persona_natural.php';
    include_once '../repositorios/repositorio_expediente_natural.php'; //el expediente natural gestiona a la persona natural



    Conexion::abrir_conexion();
//echo '<script language="javascript">alert("juas");</script>'; 
    $persona = new persona_natural();
    $persona->setNombe($_REQUEST["nombre_natural"]);
    $persona->setApellido($_REQUEST["apellido_natural"]);
    $persona->setDui($_REQUEST["dui_natural"]);
    $persona->setNit($_REQUEST["nit_natural"]);
    $persona->setDireccion($_REQUEST["direccion_natural"]);
    $persona->setTelefono($_REQUEST["telefono_natural"]);
    // $persona->setCorreo($_REQUEST["nameEmail"]);
//    $cod= '250595'.repositorio_expediente_natural::obtenerU_ultimo_persona(Conexion::obtener_conexion());
//    $persona->setId_persona_natural($cod);
    repositorio_expediente_natural::insertar_persona_natural(Conexion::obtener_conexion(), $persona);

    //
    //Conexion::cerrar_conexion();
}
?>
