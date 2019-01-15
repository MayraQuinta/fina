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
    
    ////////esto es para guardar  juridica
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

<div id="content" align="center">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Registro de Clientes</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                    
                   
     
 <section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Persona jurídica</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">   

<form action="registro_juridico.php" method="GET" autocomplete="off">
        <!--    INICIO DE DATOS-->
        <section class="content">
            <div class="container-fluid">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <a data-toggle="collapse"  href="#collapse-empresa">
                                    <h2 class="text-center">Registro Básico</h2>
                                </a>
                            </div>
                            <div id="collapse-empresa" class="panel-collapse collapse">
                                <div class="body">
                                    
                                            <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">

                                                    <input type="text" class="form-text" name="nameNombre" required="">
                                               <span class="bar"></span>
                              <label><span class="fa fa-institution"></span>   Nombre de la empresa</label>
                                                </div>
                                            </div>
                                        
                                        
                                          <div class="col-md-2">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                 
                                                    <input type="text" class="form-text" name="nameNumero" required="">
                                                <span class="bar"></span>
                              <label><span class="fa fa-list-ol"></span>   No. Empresa</label> 
                                                </div>
                                            </div>
                                     
                                     
                                            <div class="col-md-4">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                            <input type="text" class="form-text" name="nameDuiJuridico" id="Dui_fia_per"  required="">
                                            <span class="bar"></span>
                                            <label><span class="fa fa-credit-card"></span>   DUI(Encargado jurídico)</label> 
                                                </div>
                                            </div>
                                        
                                        
                                            <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    <input type="text" class="form-text" name="nameNitJuridico" id="Nit_fia_per"  required="">
                                                <span class="bar"></span>
                                            <label><span class="fa fa-credit-card"></span>   NIT(Encargado jurídico)</label> 

                                                </div>
                                            </div>
                                        
                                    </div>

                                </div>
                            </div>
                        
                    
               
            

            <!--    FIN DE DATOS-->

            <!--INICIO DE BALANCE-->

            <div class="container-fluid">
                <!-- Basic Validation -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-balance">
                                    <h2 class="text-center">Balance general (Al 31 de diciembre del 2018)</h2>
                                </a>
                            </div>
                            <div id="collapse-balance" class="panel-collapse collapse">
                                <div class="body">
                                    <div class="form-group">

                                  <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                   
                                                    <input type="number"   min="0" step="any" class="form-text" required="" name="nameEfectivo" >
                                                <span class="bar"></span>
                                            <label><span class="fa fa-dollar"></span>   Efectivo</label> 
                                                </div>
                                                </div>
                                            
                                        

                                        
                                            <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    <span class="bar" id="basic-addon1"></span>
                                                    <input type="number"  min="0" step="any"class="form-text" name="nameNegociable" required="">
                                                 <span class="bar"></span>
                                            <label><span class="fa fa-dollar"></span>   Valores negociables</label> 
                                                </div>
                                            </div>
                                     </div>

                                   
                                            <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;"> 
                                                    <input type="number"  min="0" step="any" class="form-text" name="NameCuentaXcobrar"  required="">
                                                <span class="bar"></span>
                                            <label><span class="fa fa-dollar"></span>  Cuentas por cobrar</label> 
                                                </div>
                                                </div>
                                            
                                        

                                        <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    <input type="number"  min="0" step="any" class="form-text" name="NameInventario"  required="">
                                                                           <span class="bar"></span>
                                            <label><span class="fa fa-dollar"></span>  Inventarios</label> 
                                                </div>
                                            </div>

                                           
                                    <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    <input type="number"  min="0" step="any" class="form-text" name="NameTerreno"  required="">
                                                <span class="bar"></span>
                                                <label><span class="fa fa-dollar"></span>  Terrenos</label> 
                                                </div>
                                                </div>
                                            
                                       
                                        <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    <input type="number"  min="0" step="any" class="form-text" name="NameEdificio"  required="">
                                                <span class="bar"></span>
                                                <label><span class="fa fa-dollar"></span>  Edificio y equipo</label> 
                                                </div>

                                                </div>
                                          
                               
                                    <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    <input type="number"  min="0" step="any" class="form-text" name="NameDepreciacion"  required="">
                                                <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Depreciación acumulada</label> 
                                                </div></div>
                                            
                                     
                                  <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    
                                                    <input type="number"  min="0" step="any" class="form-text" name="NameCuentaXpagar"  required="">
                                                 <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Cuentas por pagar</label>

                                                </div>
                                            </div>
                                    
                                        <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                               
                                                    <input type="number"  min="0" step="any" class="form-text" name="NameDocumentoXpagar"  required="">
                                               <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Documentos por pagar</label>

                                                </div>
                                            </div>
                                      
                                    <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    
                                                    <input type="number"  min="0" step="any" class="form-text" name="NameDeuda"  required="">
                                               <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Deuda a largo plazo</label>
                                                </div>
                                            </div>



                                            </div>

                                      
                                        <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    
                                                    <input type="number"  min="0" step="any" class="form-text" name="NameAcciones"  required="">
                                                <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Acciones comunes</label>
                                                </div>
                                            </div>
                                     
                                    <div class="col-md-3">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    <input type="number"  min="0" step="any" class="form-text" name="NameRetenidas"  required="">
                                               <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Ganancias retenidas</label>

                                                </div>
                                            </div>
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
                                    <h2 class="text-center">Estado de resultado (Al 31 de diciembre de 2018)</h2>
                                </a>
                            </div>
                            <div id="collapse-estado" class="panel-collapse collapse">
                                <div class="body">
                                    <div class="form-group">
                                        <div class="col-md-4">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                   
                                                    <input type="number" min="0" step="any" class="form-text" name="nameIngresoVenta"  required="">
                                                 <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Ingresos por venta</label>
                                                </div>
                                            </div>
                                        

                                       
                                        <div class="col-md-4">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                  
                                                    <input type="number"  min="0" step="any"class="form-text" name="nameCostoVenta"  required="">
                                                <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Costos de bienes vendidos</label>
                                                </div>
                                            </div>
                                        
                                        <div class="col-md-4">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                    
                                                    <input type="number"  min="0" step="any" class="form-text" name="nameGastoVenta"  required="">
                                                 <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Gasto de ventas</label>
                                                </div>
                                            </div>
                                        

                                         <div class="col-md-4">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                   
                                                    <input type="number"  min="0" step="any" class="form-text" name="nameGastoInteres"  required="">
                                                <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Gastos por interes</label>
                                                </div>
                                            </div>

                                       
                                        <div class="col-md-4">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                   
                                                    <input type="number"  min="0" step="any" class="form-text" name="nameGastoArrendamiento" required="">
                                                <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Gastos de arrendamiento</label>
                                                </div>
                                            </div>
                                       
                                        <div class="col-md-4">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                
                                                    <input type="number"  min="0" step="any" class="form-text" name="nameGastoDepreciacion" required="">
                                                <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Gastos por depreciación</label>
                                                </div>
                                                </div>
                                          <div class="col-md-4">

                                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                                   
                                                    <input type="number"  min="0" step="any" class="form-text" name="nameGastoAdmi"  required="">
                                                 <span class="bar"></span>
                                         <label><span class="fa fa-dollar"></span>  Gastos generales y Administración</label>
                                                </div>
                                            </div>
                                       
                                       
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>

                <div class="col-md-12 panel-footer">
                            <div class="text-center">
                                <button type="submit" class="btn ripple-infinite btn-round btn-primary" value="ok" name="nameEnviar"><div>
                                      <span>Guardar</span>
                                    </div></button>
                                <button type="reset" class="btn ripple-infinite btn-round btn-warning">
                                    <div>
                                      <span>Cancelar</span>
                                    </div>
                                </button>
                            </div>
                        </div>

            </div>

</div>
        </section>
        <!--FIN DE ESTADO DE RESULTADOS-->

    </form>
    <?php
}
include_once '../plantilla/pie.php';
?>