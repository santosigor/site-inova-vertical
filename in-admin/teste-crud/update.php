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

        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE cliente  set nome = ?, logo = ? WHERE id = ?";
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
		$nome = $data['nome'];
    $logo = $data['logo'];
		Banco::desconectar();
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
        <div class="span10 offset1">
          <div class="row">
              <h3 class="well"> Atualizar Contato </h3>
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
              <img src="../images/clientes/<?php echo !empty($logo)?$logo: '';?>" alt="">
              <input type="file" class="form-control" required="" name="arquivo">
              <?php if(!empty($imagesErro)): ?>
                <span class="form-text text-muted"><?php echo $imagesErro;?></span>
              <?php endif;?>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
          </form>
      </div>                 
    </div> 
  </body>
</html>

