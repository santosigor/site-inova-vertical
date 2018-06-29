<?php
  
  include('header.php');

  // diretório de destino do arquivo
  define('DEST_DIR', __DIR__ . '/images/clientes/');

  $images = array('');
   
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
       
      if (!move_uploaded_file($arquivos['tmp_name'][$i], DEST_DIR . '/' . $novoNome)) {
        echo "Erro ao enviar o arquivo: " . $novoNome;
      }

      array_unshift($images, $novoNome);

    }

    echo "<br>Arquivos enviados com sucesso";
  }

  echo "<br>";
  print_r($images);

  // gravar array
  // $gravandoArray = serialize($meuArray);

  // E para ler
  // $meuArray = unserialize ($arrayEmMysql);
  
  include('nav.php');

?>

<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

  <br>

  <?php include('welcome.php'); ?>

  <section class="p-t-20">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title-5 m-b-35">Cadastrar Projeto</h3>
          <form action="upload.php" method="post" enctype="multipart/form-data">
          	<input type="file" name="arquivos[]" multiple>

						<input type="submit" value="Enviar">
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php include('copyright.php'); ?>

</div>

<?php include('footer.php'); ?>