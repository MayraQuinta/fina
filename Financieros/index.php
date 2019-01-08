<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UES-FMP</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/icheck/skins/flat/aero.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/minerva.gif">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link href="css/sweetalert.css" rel="stylesheet">
        <script src="js/sweetalert.min.js"></script>
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper" >
      <?php
        if (isset($_REQUEST['nameEnviar'])) {
            include_once 'app/Conexion.php';
            include_once 'modelos/usuario.php';
            include_once 'repositorios/repositorio_usuario.php';


            $usuario = $_REQUEST['nameUsuario'];
            $pass = $_REQUEST['namePass'];
            Conexion::abrir_conexion();
            $respuesta = repositorio_usuario::verificar_pass(Conexion::obtener_conexion(), $pass, $usuario);
            session_start();    
            $_SESSION['user'] = $usuario;
            if ($respuesta == '1') {
                echo '<script>swal({
                    title: "Exito",
                     text: "Sesión iniciada correctamente",
                    type: "success",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="./home/home_usuario.php";
                    
                });</script>';
            } else if ($respuesta == '2') {

                echo '<script>swal({
                    title: "Exito!!!",
                     text: "Sesión iniciada correctamente",
                    type: "success",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="./home/home_administrador.php";
                    
                });</script>';
            } else {
                echo '<script>swal({
                    title: "Alerta!!!!",
                     text: "Datos incorrectos",
                    type: "error",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="index.php";
                    
                });</script>';
            }
        } else {
            ?>

      <div class="container">
<br><br><br>
        <form class="form-signin">
          <div class="panel periodic-login">
              <span class="atomic-number"></span>
              <div class="panel-body text-center">
                  <h1 class="atomic-mass"><strong>SISTEMA FINANCIERO</strong></h1>
                  <p class="atomic-mass" ></p>
                  <!--  <div class="col-sm-12 text-center">
                    <img src="../asset/img/imagenn.jpg" style="width: 100px;height:100px;">
                  </div>
                  

                  <i class="icons icon-arrow-down"></i>-->
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" name="nameUsuario" required autocomplete="off">
                    <span class="bar"></span>
                    <label ><strong>Usuario</strong></label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" class="form-text" name="namePass" required>
                    <span class="bar"></span>
                    <label><strong>Contraseña</strong></label>
                  </div>
                  <div class="col-xs-12">
                        <button class="btn btn-block bg-blue waves-effect" type="submit" name="nameEnviar" value="ok" style="background-color: #FF8E31;"><i class="fa fa-sign-in fa-lg fa-fw"></i><span><strong>Iniciar</strong></span>       
                      <div class="dot"></div>
                                </div>
              </div>
                
          </div>
        </form>

      </div>
       <?php
        }
        ?>

      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="asset/js/jquery.min.js"></script>
      <script src="asset/js/jquery.ui.min.js"></script>
      <script src="asset/js/bootstrap.min.js"></script>

      <script src="asset/js/plugins/moment.min.js"></script>
      <script src="asset/js/plugins/icheck.min.js"></script>

      <!-- custom -->
      <script src="asset/js/main.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html>

   <style >
:root {    --bg: #3C465C;
    --primary: #78FFCD;  
      --solid: #fff;   
       --btn-w: 12em;   
        --dot-w: calc(var(--btn-w)*.3);    
        --tr-X: calc(var(--btn-w) - var(--dot-w));}*
         {box-sizing: border-box;}*:before, *:after {box-sizing: border-box;}


         body {    height: 100vh;    display: flex;    justify-content: center;    align-items: center;    flex-flow: wrap;    background: var(--bg);    font-size: 15px;    font-family: 'Titillium Web', sans-serif;}
         h1 {    color: var(--solid);    font-size: 2rem;    margin-top: 2rem;   }
         .btn {    position: center;  
           margin: 0 auto;   
            width: var(--btn-w);   
             color: var(--primary);  
               border: .15em solid var(--primary); 
                  text-align: center;    font-size: 1.3em;    
                  line-height: 1em;    cursor: pointer;    }

         .dot {    content: '';    position: absolute;    top: 0;    width: var(--dot-w);    height: 100%;    border-radius: 100%;    transition: all 500ms ease;    display: none;}
         .dot:after {    content: '';    position: absolute;    left: calc(90% - .4em);    top: -.4em;    height: .8em;    width: .8em;    background: var(--primary);    border-radius: 1em;    border: .25em solid var(--solid);    box-shadow: 0 0 .7em var(--solid),                0 0 2em var(--primary);}
         .btn:hover .dot,.btn:focus .dot {    animation: atom 2s infinite linear;    display: block;}
         @keyframes atom {    0% {transform: translateX(0) rotate(0);}    30%{transform: translateX(var(--tr-X)) rotate(0);}    50% {transform: translateX(var(--tr-X)) rotate(180deg);}    80% {transform: translateX(0) rotate(180deg);}    100% {transform: translateX(0) rotate(360deg);}}

                          </style>