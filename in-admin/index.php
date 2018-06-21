<?php
  session_start();
  require 'init.php';
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inova Vertical - Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
  </head>
  <body class="login">
    <div class="login-wrapper">
      <div class="text-center">
        <img src="images/logo-inovavertical.png" alt="">
      </div>
      <div class="login-content">
        <div class="alert alert-warning" role="alert" id="divcaps" style="display:none">O Caps Lock está ativado!</div>
        <div class="alert alert-warning" role="alert" id="esvazio" style="display:none">Informe seu e-mail e senha!</div>
        <div class="alert alert-danger" role="alert" id="esincorreto" style="display:none">E-mail ou senha incorretos!</div>
        <form action="login.php" method="post" name="form" id="form">
          <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" id="email" class="form-control" onkeypress="checar_caps_lock(event);">
          </div>
          <div class="form-group">
            <label>Senha</label>
            <input type="password" name="password" id="password" class="form-control" onkeypress="checar_caps_lock(event);">
          </div>
          <a href="javascript:logar()" class="btn btn-primary">Entrar</a>
        </form>
      </div>
      <a href="http://inovavertical.com.br/">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 476.213 476.213" style="enable-background:new 0 0 476.213 476.213;" xml:space="preserve"><polygon points="476.213,223.107 57.427,223.107 151.82,128.713 130.607,107.5 0,238.106 130.607,368.714 151.82,347.5 57.427,253.107 476.213,253.107 "/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg> Voltar ao site da Inova Vertical
      </a>
    </div>

    <script src="assets/js/jquery.min.js"></script>

    <script>

      window.onload = function(){ 
        var url_string = window.location.href;
        var url = new URL(url_string);
        var es = url.searchParams.get("es");
        
        if(es == 2) {
          $('#esvazio').hide();
          $('#esincorreto').show();
        }
      }

      $('#email, #password').click(function(){
          $('#esvazio, #esincorreto').hide();
      });

      function logar(){
        d = document.form;
        erro=false;
        if(d.email.value==""){
          erro=true;
        }
        if(d.password.value==""){
          erro=true;     
        }
        if(!erro){
          d.submit();
        }
        else{
          $('#esincorreto').hide();
          $('#esvazio').show();
        } 
      }        

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