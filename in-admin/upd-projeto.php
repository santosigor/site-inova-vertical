<?php
  require 'banco.php';

  $id = null;
  $imagesbd = '';

  if (!empty($_GET['id'])) { $id = $_REQUEST['id']; }

  $pdo = Banco::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM projeto where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  $imagesbd = $data['images'];
  Banco::desconectar();

  if (!empty($_POST)) {

    $imagesdel = explode(",", $imagesbd);
    foreach($imagesdel as $img) {
      unlink('images/projetos/'.$img);
    }

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $performanceDate = $_POST['realizadoem'];
    $datem = date("Y-m-d H:i:s");
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
    $sql = "UPDATE projeto  set name = ?, description = ?, images = ?, performance_date = ?, modified = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nome,$descricao,$images,$performanceDate,$datem,$id));
    Banco::desconectar();
    header("Location: upd-projeto.php?res=2");

  } else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM projeto where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['name'];
    $descricao = $data['description'];
    $images = $data['images'];
    $realizadoem = $data['performance_date'];
    Banco::desconectar();
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
              <label>Logo</label>
              <?php 
              if ($id!=null) {
                $imageslst = explode(",", $images);
                foreach($imageslst as $img) {
                  echo '<div><img src="images/projetos/'. $img .'" alt=""></div>';
                }
              }
              ?>
              <input type="file" class="form-control" required="" name="arquivos[]" multiple>
            </div>
            <div class="form-group">
              <label>Realizado em</label>
              <input type="text" name="realizadoem" class="form-control" required="" value="<?php echo !empty($realizadoem)?$realizadoem: '';?>">
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
  }
</script>

<?php include('footer.php'); ?>