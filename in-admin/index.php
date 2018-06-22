<?php
  session_start();
  require 'init.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Inova Vertical - Admin</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/logo-inovavertical.png" alt="">
                            </a>
                        </div>
                        <div class="login-form">
                          <div class="alert alert-warning" role="alert" id="divcaps" style="display:none">
                            O Caps Lock está ativado!
                          </div>
                          <div class="sufee-alert alert with-close alert-secondary alert-dismissible fade show" id="esvazio" style="display:none">
                            Informe seu e-mail e senha!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="esincorreto" style="display:none">
                            E-mail ou senha incorretos!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                            <form action="login.php" method="post" name="form" id="form">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="au-input au-input--full" type="email" name="email" id="email"  onkeypress="checar_caps_lock(event);">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" id="password" onkeypress="checar_caps_lock(event);">
                                </div>
                                <button class="btn btn-secondary btn-lg btn-block m-t-25 m-b-20" type="submit">Entrar</button>
                            </form>
                            <div class="register-link">
                                <p>
                                   <a href="http://inovavertical.com.br/">Voltar ao site da Inova Vertical</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script>

      window.onload = function(){ 
        var url_string = window.location.href;
        var url = new URL(url_string);
        var es = url.searchParams.get("es");
        
        if(es == 1) {
          $('#esvazio').show();
        } else if(es == 2) {
          $('#esincorreto').show();
        }
      }

      $('#email, #password').click(function(){
          $('#esvazio, #esincorreto').hide();
      });       

      // Verificar se o caps lock esta ativo
      function checar_caps_lock(ev) {
        var e = ev || window.event;
        codigo_tecla = e.keyCode?e.keyCode:e.which;
        tecla_shift = e.shiftKey?e.shiftKey:((codigo_tecla == 16)?true:false);
        if(((codigo_tecla >= 65 && codigo_tecla <= 90) && !tecla_shift) || ((codigo_tecla >= 97 && codigo_tecla <= 122) && tecla_shift)) {
          $('#divcaps').show();       
        }
        else {
          $('#divcaps').hide();       
        }
      }
    
      document.getElementById('email').focus();
    </script>

</body>

</html>
<!-- end document-->