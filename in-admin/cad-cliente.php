<?php
  require 'banco.php';

  if (!empty($_POST)) {

    $nome = $_POST['nome'];
    $logo = '';
    $datec = date("Y-m-d H:i:s");

    define('DEST_DIR', __DIR__ . '/images/clientes');
     
    if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['name'])){
      // se o "name" estiver vazio, é porque nenhum arquivo foi enviado
       
      $arquivo = $_FILES['arquivo'];
   
      // pega a extensão do arquivo
      $ext = explode('.', $arquivo['name']);
      $ext = end($ext);
   
      // gera o novo nome
      $novoNome = uniqid() . '.' . $ext;

      $logo .= $novoNome;
   
      if (!move_uploaded_file($arquivo['tmp_name'], DEST_DIR . '/' . $novoNome)) {
        echo "Erro ao enviar arquivo";
      } else {
        //echo "Arquivo enviado com sucesso, com o nome:: " . $novoNome;    
      }
    }
    
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO cliente (name, image, created) VALUES(?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($nome,$logo,$datec));
    Banco::desconectar();
    header("Location: cad-cliente.php?res=1");

  }

  include('header.php');
  include('nav.php');
?>

<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

  <br>

  <!-- BREADCRUMB-->
  <section>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="au-breadcrumb-content">
                      <div class="au-breadcrumb-left">
                          <ul class="list-unstyled list-inline au-breadcrumb__list">
                              <li class="list-inline-item active">
                                  <a href="panel.php">Voltar</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- END BREADCRUMB-->

  <section class="p-t-20">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <h3 class="title-5 m-b-35">Add Cliente</h3>
          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" id="res1" style="display:none">
            Cliente cadastrado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="cad-cliente.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome" required="">
            </div>
            <div class="form-group">
              <label>Logo</label>
              <input type="file" class="form-control" required="" name="arquivo">
            </div>
            <button type="submit" class="btn btn-success">Adicionar</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php include('copyright.php'); ?>

</div>

<?php include('scripts-js.php'); ?>

<script>
  window.onload = function(){ 
    var url_string = window.location.href;
    var url = new URL(url_string);
    var res = url.searchParams.get("res");
    if(res == 1) {
      $('#res1').show();
    }
  }
</script>

<?php include('footer.php'); ?>
