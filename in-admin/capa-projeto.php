<?php
  require 'banco.php';

  $id = null;
  $image1 = '';
  $image2 = '';
  $image3 = '';

  if (!empty($_GET['id'])) { $id = $_REQUEST['id']; }

  $pdo = Banco::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM capa_projeto WHERE id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  $image1 = $data['image1'];
  $image2 = $data['image2'];
  $image3 = $data['image3'];
  Banco::desconectar();

  if (!empty($_POST)) {

    $datem = date("Y-m-d H:i:s");

    define('DEST_DIR', __DIR__ . '/images/capa-projeto');

    //image1
    if (isset($_FILES['image1']) && !empty($_FILES['image1']['name'])){
      //remove imagem atual
      unlink('images/capa-projeto/'.$image1);
      // se o "name" estiver vazio, é porque nenhum arquivo foi enviado
      $arquivo = $_FILES['image1'];
      // pega a extensão do arquivo
      $ext = explode('.', $arquivo['name']);
      $ext = end($ext);
      // gera o novo nome
      $novoNome = uniqid() . '.' . $ext;
      $image1 = $novoNome;
      if (!move_uploaded_file($arquivo['tmp_name'], DEST_DIR . '/' . $novoNome)) {
        echo "Erro ao enviar arquivo";
      } else {
        //echo "Arquivo enviado com sucesso, com o nome:: " . $novoNome;    
      }
    }
    //image2
    if (isset($_FILES['image2']) && !empty($_FILES['image2']['name'])){
      //remove imagem atual
      unlink('images/capa-projeto/'.$image2);
      // se o "name" estiver vazio, é porque nenhum arquivo foi enviado
      $arquivo = $_FILES['image2'];
      // pega a extensão do arquivo
      $ext = explode('.', $arquivo['name']);
      $ext = end($ext);
      // gera o novo nome
      $novoNome = uniqid() . '.' . $ext;
      $image2 = $novoNome;
      if (!move_uploaded_file($arquivo['tmp_name'], DEST_DIR . '/' . $novoNome)) {
        echo "Erro ao enviar arquivo";
      } else {
        //echo "Arquivo enviado com sucesso, com o nome:: " . $novoNome;    
      }
    }
    //image3
    if (isset($_FILES['image3']) && !empty($_FILES['image3']['name'])){
      //remove imagem atual
      unlink('images/capa-projeto/'.$image3);
      // se o "name" estiver vazio, é porque nenhum arquivo foi enviado
      $arquivo = $_FILES['image3'];
      // pega a extensão do arquivo
      $ext = explode('.', $arquivo['name']);
      $ext = end($ext);
      // gera o novo nome
      $novoNome = uniqid() . '.' . $ext;
      $image3 = $novoNome;
      if (!move_uploaded_file($arquivo['tmp_name'], DEST_DIR . '/' . $novoNome)) {
        echo "Erro ao enviar arquivo";
      } else {
        //echo "Arquivo enviado com sucesso, com o nome:: " . $novoNome;    
      }
    }

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE capa_projeto set image1 = ?, image2 = ?, image3 = ?, modified = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($image1,$image2,$image3,$datem,$id));
    Banco::desconectar();
    header("Location: capa-projeto.php?id=1&res=2");

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
        <div class="col-md-8 offset-md-2">
          <h3 class="title-5 m-b-35">Capa Projeto</h3>
          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" id="res2" style="display:none">
            Capa atualizada com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="capa-projeto.php?id=1" method="post" enctype="multipart/form-data">
            <style>
              .img-wp {-moz-column-count: 2;-webkit-column-count: 2;column-count: 2;-moz-column-gap: 4px;-webkit-column-gap: 4px;column-gap: 4px;margin-bottom:40px;}
              .img1, .img2, .img3 {position: relative;}
              .img-wp input{position: absolute;height:100%;width:100%;top:0;left:0;cursor:pointer;opacity:0;}
              .img-wp .tamanho{position: absolute;background:#fff;padding:3px 10px;bottom:2px;left:2px;}
            </style>
            <div class="img-wp clearfix">
              <div class="img1">
                <img src="images/capa-projeto/<?php echo $image1; ?>" alt="">
                <input type="file" class="form-control" name="image1" title="Clique para selecionar um nova imagem">
                <span class="tamanho">957 x 911</span>
              </div>
              <div class="img2" style="margin-bottom:4px;">
                <img src="images/capa-projeto/<?php echo $image2; ?>" alt="">
                <input type="file" class="form-control" name="image2" title="Clique para selecionar um nova imagem">
                <span class="tamanho">957 x 451</span>
              </div>
              <div class="img3">
                <img src="images/capa-projeto/<?php echo $image3; ?>" alt="">
                <input type="file" class="form-control" name="image3" title="Clique para selecionar um nova imagem">
                <span class="tamanho">957 x 451</span>
              </div>
              <input type="hidden" value="1" name="update">
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
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
    if(res == 2) { $('#res2').show(); }
  }
</script>

<?php include('footer.php'); ?>
