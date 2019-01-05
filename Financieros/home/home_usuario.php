<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';

include_once '../plantilla/barra_lateral_usuario.php';

?>    
<section>
    <?php echo $_SESSION['user']; ?>
</section>

<div id="content">
          
            
           <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
              
              <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="carousel-example3" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example3" data-slide-to="0" class="active">
                      </li>
                      <li data-target="#carousel-example3" data-slide-to="1"></li>
                      <li data-target="#carousel-example3" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                      <!-- First slide -->
                      <div class="item active">
                        <img class="img-responsive" data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide" src="../asset/img/logo2.jpg">
                        <div class="carousel-caption">
                          
                     
                        </div>
                      </div><!-- /.item -->

                      <!-- Second slide -->
                      <div class="item">
                        <img class="img-responsive" data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide" src="../asset/img/logo8.jpg">
                        <div class="carousel-caption">
                          
                          
                        </div>
                      </div><!-- /.item -->

                      <!-- Third slide -->
                      <div class="item">
                        <img class="img-responsive" data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide" src="../asset/img/logo9.jpg">
                        <div class="carousel-caption">
                          
                          
                        </div>
                      </div><!-- /.item -->

                    </div><!-- /.carousel-inner -->

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example3"
                    role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example3"
                  role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>

              </div><!-- /.carousel -->
            </div>
              </div>
                </div>
              </div>

              </div>
<?php
//include_once '../plantilla/pie.php';
?>