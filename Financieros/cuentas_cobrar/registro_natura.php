<!DOCTYPE html>


<html lang="en">

<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
?>

<div id="content" align="center">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Registro</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                    
                   
     
 <body id="mimin" class="dashboard">

<div class="col-md-6" align="center">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading">
                      <h4>Persona Natural</h4>
                    </div>
                    <div class="col-md-15 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-15">            
 

<form action="" name="form_persona_natural" method="post" onsubmit="return confirmar_envio_perNatural()">
    <input type="hidden" name="pas" id="pass"  >
    <section class="content">
        

                                        
                                            <div class="col-md-6">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <span class="bar" id="validate_firstname">Nombre</span>
                                            <input type="text"  class="form-text" name="nombre_natural" placeholder="NOMBRE..." required="" aria-required="true">
                                        </div>
                                    </div>
                                 
                                
                                        <div class="col-md-6">
                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <span class="bar" id="basic-addon1">Apellido</span>
                                            <input type="text" class="form-text" name="apellido_natural" placeholder="APELLIDO..." required="">
                                        </div>
                                    </div>
                             
                            
                                    
                                        <div class="col-md-6">
                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <span class="bar" id="basic-addon1">Dui</span>
                                            <input type="text" class="form-text" name="dui_natural"  id="Dui_fia_per" placeholder="DUI..." required="">
                                        </div>
                                    </div>
                                 
                                
                                        <div class="col-md-6">
                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <span class="bar" id="basic-addon1">Nit</span>
                                            <input type="text" class="form-text" name="nit_natural" id="Nit_fia_per" placeholder="NIT..." required="">
                                        </div>
                                    </div>
                
                           
                            
                                    
                                        <div class="col-md-6">
                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <span class="bar" id="basic-addon1">Telefono</span>
                                            <input type="text" class="form-text" name="telefono_natural" id="ref_Telefono" placeholder="TELEFONO..." required="">
                                        </div>
                                    </div>
                                
                                
                                        <div class="col-md-6">
                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <span class="bar" id="basic-addon1">Dirección</span>
                                            <input type="text" class="form-text" name="direccion_natural" placeholder="DIRECCION..." required="">
                                        </div>
                                    </div>
                                
                        


<div class="col-md-12 panel-footer">
                            <div class="text-center">
                                <button type="submit" class="btn ripple-infinite btn-round btn-primary"><div>
                                      <span>Guardar</span>
                                    </div></button>
                                <button type="reset" class="btn ripple-infinite btn-round btn-primary">
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
