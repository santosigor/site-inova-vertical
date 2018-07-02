<?php
  require 'banco.php';
    
  if(!empty($_POST)) {

      //Acompanha os erros de validação
      $nomeErro = null;
      $descricaoErro = null;
      $performanceDateErro = null;
      
      $nome = $_POST['nome'];
      $descricao = $_POST['descricao'];
      $performanceDate = $_POST['realizadoem'];
      
      //Validaçao dos campos:
      $validacao = true;
      if(empty($nome))
      {
          $nomeErro = 'Por favor digite o seu nome!';
          $validacao = false;
      }
      
      if(empty($descricao))
      {
          $descricaoErro = 'Por favor digite a Descrição!';
          $validacao = false;
      }
      
      if(empty($performanceDate))
      {
          $imagesErro = 'Por favor digite o Descrição de performanceDate';
          $validacao = false;
      }
      
      //Inserindo no Banco:
      if($validacao)
      {
        // diretório de destino do arquivo
        define('DEST_DIR', __DIR__ . '/images/projetos/');

        $imagesArray = '';
         
        if (isset($_FILES['arquivos']) && !empty($_FILES['arquivos']['name'])) {
          // se o "name" estiver vazio, é porque nenhum arquivo foi enviado
           
          // cria uma variável para facilitar
          $arquivos = $_FILES['arquivos'];

          // total de arquivos enviados
          $total = count($arquivos['name']);

          for ($i = 0; $i < $total; $i++) {

            // podemos acessar os dados de cada arquivo desta forma:
            // - $arquivos['name'][$i]
            // - $arquivos['tmp_name'][$i]
            // - $arquivos['size'][$i]
            // - $arquivos['error'][$i]
            // - $arquivos['type'][$i]

            // pega a extensão do arquivo
            $ext = explode('.', $arquivos['name'][$i]);
            $ext = end($ext);
         
            // gera o novo nome
            $novoNome = uniqid() . '.' . $ext;

            $imagesArray .= $novoNome;
             
            if (!move_uploaded_file($arquivos['tmp_name'][$i], DEST_DIR . '/' . $novoNome)) {
              echo "Erro ao enviar o arquivo: " . $novoNome;
            }

            $imagesArray .= ',';

          }

          //echo "<br>Arquivos enviados com sucesso";
        }

        $images = $imagesArray;

        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO projeto (name, description, images, performance_date) VALUES(?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome,$descricao,$images,$performanceDate));
        Banco::desconectar();
        header("Location: cad-projetos.php?res=1");
      }
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
          <form action="cad-projetos.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
              <?php if(!empty($nomeErro)): ?>
                  <span class="form-text text-muted"><?php echo $nomeErro;?></span>
              <?php endif;?>
            </div>
            <div class="form-group">
              <label>Descrição</label>
              <textarea class="form-control" name="descricao" rows="6" required="" value="<?php echo !empty($descricao)?$descricao: '';?>"></textarea>
              <?php if(!empty($descricaoErro)): ?>
                <span class="form-text text-muted"><?php echo $descricaoErro;?></span>
              <?php endif;?>
            </div>
            <div class="form-group">
              <label>Imagens</label>
              <input type="file" class="form-control" required="" name="arquivos[]" multiple>
              <?php if(!empty($imagesErro)): ?>
                <span class="form-text text-muted"><?php echo $imagesErro;?></span>
              <?php endif;?>
            </div>
            <div class="form-group">
              <label>Realizado em</label>
              <input type="text" name="realizadoem" class="form-control" required="" value="<?php echo !empty($performanceDate)?$performanceDate: '';?>">
              <?php if(!empty($performanceDateErro)): ?>
                <span class="form-text text-muted"><?php echo $performanceDateErro;?></span>
              <?php endif;?>
            </div>
            <button type="submit" class="btn btn-success">Adicionar</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php include('copyright.php'); ?>

</div>

<?php include('footer.php'); ?>

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