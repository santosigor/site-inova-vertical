<?php
	
	include('header.php');

  // diretório de destino do arquivo
	define('DEST_DIR', __DIR__ . '/images/clientes');
	 
	if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['name'])){
    // se o "name" estiver vazio, é porque nenhum arquivo foi enviado
     
    $arquivo = $_FILES['arquivo'];
 
    // pega a extensão do arquivo
    $ext = explode('.', $arquivo['name']);
    $ext = end($ext);
 
    // gera o novo nome
    $novoNome = uniqid() . '.' . $ext;
 
    if (!move_uploaded_file($arquivo['tmp_name'], DEST_DIR . '/' . $novoNome)) {
      echo "Erro ao enviar arquivo";
    } else {
      echo "Arquivo enviado com sucesso, com o nome:: " . $novoNome;    
    }
	}

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
          <h3 class="title-5 m-b-35">Cadastrar cliente</h3>
          <form action="upload.php" method="post" enctype="multipart/form-data">
          	<input type="file" name="arquivo">

						<input type="submit" value="Enviar">
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php include('copyright.php'); ?>

</div>

<?php include('footer.php'); ?>