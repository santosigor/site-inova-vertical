<?php
  require 'banco.php';

  if (!empty($_POST)) {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $performanceDate = $_POST['realizadoem'];
    $datec = date("Y-m-d H:i:s");
    $imagesArray = '';

    // diretório de destino do arquivo
    define('DEST_DIR', __DIR__ . '/images/projetos/');
     
    if (isset($_FILES['arquivos']) && !empty($_FILES['arquivos']['name'])) {
      // se o "name" estiver vazio, é porque nenhum arquivo foi enviado
       
      // cria uma variável para facilitar
      $arquivos = $_FILES['arquivos'];

      // total de arquivos enviados
      $total = count($arquivos['name']);
      $ultsemvirg = $total-1;

      for ($i = 0; $i < $total; $i++) {

        // pega a extensão do arquivo
        $ext = explode('.', $arquivos['name'][$i]);
        $ext = end($ext);
     
        // gera o novo nome
        $novoNome = uniqid() . '.' . $ext;

        $imagesArray .= $novoNome;
         
        if (!move_uploaded_file($arquivos['tmp_name'][$i], DEST_DIR . '/' . $novoNome)) {
          echo "Erro ao enviar o arquivo: " . $novoNome;
        }

        if($i != $ultsemvirg) {
          $imagesArray .= ',';
        } else {
          $imagesArray .= '';
        }

      }

    }

    $images = $imagesArray;

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO projeto (name, description, images, performance_date, created) VALUES(?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($nome,$descricao,$images,$performanceDate,$datec));
    Banco::desconectar();
    header("Location: cad-projeto.php?res=1");

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
          <h3 class="title-5 m-b-35">Add Projeto</h3>
          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" id="res1" style="display:none">
            Projeto cadastrado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="cad-projeto.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome" required="">
            </div>
            <div class="form-group">
              <label>Descrição</label>
              <textarea class="form-control" name="descricao" rows="6" required=""></textarea>
            </div>
            <div class="form-group">
              <label>Imagens</label>
              <input type="file" class="form-control" required="" name="arquivos[]" multiple>
            </div>
            <div class="form-group">
              <label>Realizado em</label>
              <input type="text" name="realizadoem" class="form-control" required="">
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
