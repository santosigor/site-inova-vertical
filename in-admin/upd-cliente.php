<?php
  require 'banco.php';

  $id = null;
  $logo = '';

  if (!empty($_GET['id'])) { $id = $_REQUEST['id']; }

  $pdo = Banco::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM cliente where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  $nome = $data['name'];
  $logo = $data['image'];
  Banco::desconectar();

  if (!empty($_POST)) {

    $nome = $_POST['nome'];
    $datem = date("Y-m-d H:i:s");

    define('DEST_DIR', __DIR__ . '/images/clientes');
     
    if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['name'])){

      // remove logo atual
      unlink('images/clientes/'.$logo);

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
    $sql = "UPDATE cliente  set name = ?, image = ?, modified = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nome,$logo,$datem,$id));
    Banco::desconectar();
    header("Location: panel.php?res=2");

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
          <h3 class="title-5 m-b-35">Atualizar Cliente</h3>
          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" id="res2" style="display:none">
            Cliente atualizado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="upd-cliente.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
            </div>
            <span onclick="updImage()" class="btn btn-primary text-white mt-2 mb-4 bt-upd-image">ATUALIZAR LOGO</span>
            <div class="form-group" id="updimage" style="display: none">
              <label>Logo</label>
              <input type="file" class="form-control" name="arquivo" required="" disabled>
            </div>
            <?php if ($id!=null) { ?>
            <div style="margin-bottom:25px;max-width: 140px;">
              <img src="images/clientes/<?php echo !empty($logo)?$logo: '';?>" alt="">
            </div>
            <?php } ?>
            <div class="clearfix"></div>
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
  function updImage() {
    $('#updimage input').removeAttr('disabled');
    $('#updimage').show();
    $('.bt-upd-image').hide();
  }
</script>

<?php include('footer.php'); ?>