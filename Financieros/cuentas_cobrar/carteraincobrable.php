<!DOCTYPE html>
<html lang="en">

<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';

?>   
   
<body id="mimin" class="dashboard">

     <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Cuentas Incobrables</h3>
                        

                      
                    </div>
                  
                    </div>
                  </div>                    
     </div>   
     
      <div class="container-fluid mimin-wrapper">
  
      

          <!-- start: Contnt -->
          <div id="content">
             
            <div class="col-md-12 top-10 padding-0">
              <div class="col-md-12">
                <div class="panel">
                  <div class="panel-body">
                  <div class="col-md-12 padding-0" style="padding-bottom:20px;">
                    <div class="col-md-4" style="padding-left:10px;">
                        <input type="checkbox" class="icheck pull-left" name="checkbox1"/>
                        <select>
                            <option>Delete</option>
                            <option>Ignore</option>
                            <option>Cancel</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                         <div class="col-lg-12">
                            <div class="input-group">
                              <input type="text" class="form-control" aria-label="...">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buscar<span class="caret"></span></button>
                               
                              </div><!-- /btn-group -->
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                    </div>
                 </div>
                  <div class="responsive-table">
                      
                    <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th><input type="checkbox" class="icheck" name="checkbox1" /></th>
                        <th>Tipo Prestamo</th>
                        <th>Asesor</th>
                        <th>Solicitante</th>
                        <th>Monto adeudado($)</th>
                        <th>Tiempo(Mese)</th>
                        <th>Ver pagos</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                     
                    
                    
                      
                   
                      <tr>
                        <td><input type="checkbox" class="icheck" name="checkbox1" /></td>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>39</td>
                        <td>2009/09/15</td>
                        <td>$205,500</td>
                      </tr>
                      
                    </tbody>
                  </table>
                  </div>
                  <div class="col-md-6" style="padding-top:20px;">
                    <span>showing 0-10 of 30 items</span>
                  </div>
                  <div class="col-md-6">
                        <ul class="pagination pull-right">
                          <li>
                            <a href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>
                          <li class="active"><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li>
                            <a href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>
                        </ul>
                  </div>
                </div>
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
     $('input').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
      });
});
</script>
<!-- end: Javascript -->
</body>
</html>
