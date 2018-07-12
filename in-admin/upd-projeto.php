<?php
  require 'banco.php';

  $id = null;
  $images = '';

  if (!empty($_GET['id'])) { $id = $_REQUEST['id']; }

  $pdo = Banco::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM projeto WHERE id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  $nome = $data['name'];
  $descricao = $data['description'];
  $images = $data['images'];
  $realizadoem = $data['performance_date'];
  Banco::desconectar();

  if (!empty($_POST)) {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $realizadoem = $_POST['realizadoem'];
    $datem = date("Y-m-d H:i:s");

    $imagesArray = '';

    // diretório de destino do arquivo
    define('DEST_DIR', __DIR__ . '/images/projetos/');

    if (!isset($_FILES['arquivos']['error']) && is_array($_FILES['arquivos']['error'])) {

    } else {
      // remove imagens atuais
      $imagesdel = explode(",", $images);
      foreach($imagesdel as $img) {
        unlink('images/projetos/'.$img);
      }

      $imagesArray = '';
       
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

      $images = $imagesArray;

    }

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE projeto  set name = ?, description = ?, images = ?, performance_date = ?, modified = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nome,$descricao,$images,$realizadoem,$datem,$id));
    Banco::desconectar();
    header("Location: upd-projeto.php?res=2");

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
          <h3 class="title-5 m-b-35">Atualizar projeto</h3>
          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" id="res2" style="display:none">
            Projeto atualizado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="upd-projeto.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
            </div>
            <div class="form-group">
              <label>Descrição</label>
              <textarea class="form-control" name="descricao" rows="6" required=""><?php echo !empty($descricao)?$descricao: '';?></textarea>
            </div>
            <div class="form-group">
              <label>Realizado em</label>
              <input type="text" name="realizadoem" class="form-control" required="" value="<?php echo !empty($realizadoem)?$realizadoem: '';?>">
            </div>
            <div class="form-group">
              <label>Imagens</label>
              <input type="file" class="form-control" name="arquivos[]" multiple>
            </div>
            <style>
              .img-wp {-moz-column-count: 2;-webkit-column-count: 2;column-count: 2;-moz-column-gap: 4px;-webkit-column-gap: 4px;column-gap: 4px;margin-bottom:40px;}
              .img-wp img{margin-bottom:4px;}
            </style>
            <div class="img-wp">
              <?php 
              if ($id!=null) {
                $imageslst = explode(",", $images);
                foreach($imageslst as $img) {
                  echo '<img src="images/projetos/'. $img .'" alt="">';
                }
              }
              ?>
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
    if(res == 2) {
      $('#res2').show();
    }
    alert('ajustar update projeto');
  }
</script>

<?php include('footer.php'); ?>