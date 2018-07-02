<?php 
	
	require 'banco.php';

	$id = null;

	if ( !empty($_GET['id'])) 
            {
		$id = $_REQUEST['id'];
            }
	
	if ( null==$id ) 
            {
		header("Location: panel.php");
            }
	
	if ( !empty($_POST)) 
            {

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM cliente where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $logo = $data['image'];
    Banco::desconectar();
		
		//Acompanha os erros de validação
    $nomeErro = null;
    
    $nome = $_POST['nome'];
		
		//Validação
		$validacao = true;
		if (empty($nome)) 
                {
                    $nomeErro = 'Por favor digite o nome!';
                    $validacao = false;
                }
		
		// update data
		if ($validacao) 
                {
                  
        if($logo!='') {
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

            $image .= $novoNome;
         
            if (!move_uploaded_file($arquivo['tmp_name'], DEST_DIR . '/' . $novoNome)) {
              echo "Erro ao enviar arquivo";
            } else {
              //echo "Arquivo enviado com sucesso, com o nome:: " . $novoNome;    
            }
          }

          $logo = $image;
        }

        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE cliente  set name = ?, image = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome,$logo,$id));
        Banco::desconectar();
        header("Location: update-cliente.php?res=1");
		}
	} 
        else 
            {
                $pdo = Banco::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM cliente where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$nome = $data['name'];
    $logo = $data['image'];
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
          <h3 class="title-5 m-b-35">Atualizar Cliente</h3>
          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" id="res1" style="display:none">
            Cliente atualizado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="update-cliente.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
              <?php if(!empty($nomeErro)): ?>
                  <span class="form-text text-muted"><?php echo $nomeErro;?></span>
              <?php endif;?>
            </div>
            <div class="form-group">
              <label>Logo</label>
              <div style="max-width:140px;margin-bottom:25px;"><img src="images/clientes/<?php echo !empty($logo)?$logo: '';?>" alt=""></div>
              <input type="file" class="form-control" name="arquivo">
              <?php if(!empty($imagesErro)): ?>
                <span class="form-text text-muted"><?php echo $imagesErro;?></span>
              <?php endif;?>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php include('copyright.php'); ?>

</div>

<?php include('footer.php'); ?>